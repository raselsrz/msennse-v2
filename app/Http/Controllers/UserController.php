<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $name = "Users";
        $page= request()->get('page',1);
        $page= max(1,$page);
        $limit= env('PAGINATION_PER_PAGE',10);
        $offset= ($page-1)*$limit;
        $total_users= User::count();
        $total_pages= ceil($total_users/$limit);
        // not the current user id
        $users= User::orderBy('id','desc') 
        // ->whereNot('id',auth()->user()->id)
        ->paginate(
            $limit,
            ['*'],
            'page',
            $page
        );

       
        return view('admin.pages.users.index', compact('users','total_users','total_pages','name'));
    }
         
    // edit user
    public function edit($id)
    {
        $name = "Edit User";
        $user = User::find($id);
        $roles = Role::all();
        $user->role = $user->getRole();

        return view('admin.pages.users.edit-user', compact('user', 'name' ,'roles'));
    }

    //add user
    public function add()
    {
        $name = "Add User";
        $roles = Role::all();
        return view('admin.pages.users.add-user', compact('roles', 'name')); 
    }
    // store user
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required',
        ]);
        // encrypt password
        $request['password'] = bcrypt($request->password);
        $user = User::create($request->all());
        //set role
        $user->assignRole($request->role);

        // error or success redirect
        if ($user) {
            // redirect to edit
            return redirect()->route('admin.users.edit', $user->id)->with('success', 'User added successfully'); 
        }
        return redirect()->back()->with('error', 'User not added');
    }

    public function search(Request $request)
    { 

        $search = $request->input('q');
        $users = User::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->orWhere('role', 'LIKE', '%' . $search . '%')
            ->orWhere('status', 'LIKE', '%' . $search . '%')
            ->get();
        return view('admin.pages.users.index', compact('users'));

    }

    //update user
    public function update(Request $request, $id)
    {

    //     'name', 'username', 'email', 'phone', 'password', 'verification_code', 
    // 'is_verified', 'wallet_balance', 'total_earned', 'total_withdrawn', 
    // 'current_plan_id', 'plan_expires_at', 'referrer_id', 'referral_count', 
    // 'referral_earnings', 'status', 'two_factor_secret', 'two_factor_recovery_codes',
    // 'email_verified_at', 'profile_image', 'dob', 'address', 'nid', 'task_cat'

        // validate request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required',
            'password' => 'nullable',
            'phone' => 'required|numeric',
            // 'nid' => 'required|numeric',
        ]);

        $user = User::find($id);
        if($request->has('password')){
            $request['password'] = bcrypt($request->password);
        }else{
            unset($request->password);
        }
        // update user
        $user->update($request->all());
        // error or success redirect
        if ($user) {
            return redirect()->back()->with('success', 'User updated successfully');
        }
        return redirect()->back()->with('error', 'User not updated');
          
    }


    // view user
    public function view($id)
    {
        $user = User::find($id);
        return view('user.view', compact('user'));
         
    }
    //soft delete user
    public function delete($id)
    {
        $user = User::find($id);
        // soft delete user
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }





    //profile
    public function profile()
    {
        $name = "Profile";
        $user = auth()->user();
        return view('dashboard.profile', compact('user', 'name'));
    }


    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
    
        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'nullable|min:6|confirmed', // Only validate password if it's being updated
        ]);
    
        // Update user profile fields
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->nid = $request->nid;
        $user->address = $request->address;
        $user->dob = $request->dob;
    
        // Update password if provided
        if ($request->password) {

            //check if the old password is correct
            if (!Hash::check($request->password, $user->password)) {
                return redirect()->back()->with('error', 'Old password is incorrect');
            }
            $user->password = bcrypt($request->password);

        }
    
        // Handle profile image upload
        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('/uploads');
            $image->move($imagePath, $imageName);
    
            // Create public URL for the uploaded image
            $publicImageUrl = asset('uploads/' . $imageName);
    
            // Save the image URL in the user's profile
            $user->profile_image = $publicImageUrl;
        }
    
        // Save the updated user
        $user->save();
    
        // Return success message
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    //referral
    public function referral()
    {
        $name = "Referrals";
        $user = auth()->user();
    
        // Get all referrals
        $referrals = User::where('referrer_id', $user->id)->get();
    
        // Last 30 days referrals
        $last30DaysReferrals = User::where('referrer_id', $user->id)
            ->where('created_at', '>=', now()->subDays(30))
            ->get();
    
        // Calculate Total Earnings from referrals
        $totalEarnings = $user->referral_earnings ?? 0;
    
        // Calculate Earnings in the Last 30 Days
        // $earningsLast30Days = $last30DaysReferrals->count() > 0 ? 
        //     ($last30DaysReferrals->count() > 2 ? 40 + (($last30DaysReferrals->count() - 2) * 20) : ($last30DaysReferrals->count() * 20)) 
        //     : 0;
    
        return view('dashboard.referrals', compact('referrals', 'name', 'totalEarnings'));
    }
    

    //referral link
    public function referralLink()
    {
        $user = auth()->user();
        $referralLink = url('/register?ref=' . $user->id);

        return response()->json([
            'referral_link' => $referralLink,
            'message' => 'Referral link generated successfully!'
        ]);
    }

    



    


}