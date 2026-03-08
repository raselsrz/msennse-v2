<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Srz_Cpt;
use App\Models\CustomFields;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{


    public function profile(){

        $user = Auth::user();
      return  view('frontend.feed',compact('user'));
    }


    //profileUpdate
    public function profileUpdate(Request $request){
        $user = Auth::user();

        return view('frontend.edit',compact('user'));
    }

    public function profileUpdateStore(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|numeric',
        ]);

        
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $phoneNumber = $request->phone;
        if($phoneNumber){
            update_field('phone', $phoneNumber, 'user' , $user->id);
        }



        return redirect()->route('profiles')->with('success','Profile updated successfully');
    }

    public function password(){
        $user = Auth::user();
        return view('frontend.feed',compact('user'));
    }

    public function passwordStore(Request $request)
    {
        $user = Auth::user();
    
        // Validate input fields, including password confirmation
        $request->validate([
            'oldPassword' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        // Check if the old password matches the current password
        if (!Hash::check($request->oldPassword, $user->password)) {
            return redirect()->back()->with('error', 'The old password is incorrect');
        }
    
        // Update the password
        $user->password = Hash::make($request->password);
        $user->save();
    
        return redirect()->route('profiles')->with('success', 'Password updated successfully');
    }
    

    //visaResult
    public function visaResult(){


        $visaResults = Srz_Cpt::where([
            'post_type' => 'apply',
            'post_author' => Auth::id(),
        ])->orderBy('id','desc')->get();


        return view('frontend.visa-result',compact('visaResults'));
    }

//visaView by id
public function visaView($post_title)
{
    // Validate ID to ensure it's not empty or invalid
    if (empty($post_title)) {
        return redirect()->route('visaResult')->with('error', 'Invalid visa ID.');
    }

    // Retrieve visa result based on the given criteria
    $visaResult = Srz_Cpt::where([
        'post_type' => 'apply',
        'post_author' => Auth::id(),
        'post_title' => $post_title,
    ])->orderBy('id', 'desc')->first();
    // Check if visa result exists
    if (!$visaResult) {
        return redirect()->route('visaResult')->with('error', 'Visa record not found.');
    }

    // Pass the result to the view
    return view('frontend.visa-view', compact('visaResult'));
}

//visaDelete
public function visaDelete($id)
{
    // Validate ID to ensure it's not empty or invalid
    if (empty($id)) {
        return redirect()->route('visaResult')->with('error', 'Invalid visa ID.');
    }

    // Retrieve visa result based on the given criteria
    $visaResult = Srz_Cpt::where([
        'post_type' => 'apply',
        'post_author' => Auth::id(),
        'id' => $id,
    ])->orderBy('id', 'desc')->first();
    // Check if visa result exists
    if (!$visaResult) {
        return redirect()->route('visaResult')->with('error', 'Visa record not found.');
    }

    // Delete the visa result
    $visaResult->delete();

   //delete update_field data by obj_id
    CustomFields::where('obj_id', $id)->delete();

    // Redirect back to the visa results page
    return redirect()->route('visaResult')->with('success', 'Visa record deleted successfully.');
}



}