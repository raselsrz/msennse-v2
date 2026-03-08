<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {

        return View::make('auth.login');
    }

public function postlogin(Request $request)
{ 
    $request->validate([
        'username' => ['required', 'string'],
        'password' => ['required', 'min:6'],
    ]);

    $credentials = [
        'username' => $request->username,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Check if user is verified
        if (!$user->is_verified) {
            Auth::logout(); // Logout the user immediately
            return redirect('/login')->with('error', 'Your account is not verified. Please register again or check your email for verification.');
        }

        $request->session()->regenerate(); // security
        return redirect('/dashboard');
    }

    return redirect('/login')->with('error', 'Invalid login credentials');
}



    public function register(Request $request)
    {

        return view('auth.register');
    }

    //signupStore
    public function signupStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@(gmail\.com|yahoo\.com|hotmail\.com)$/'
            ],
            'phone' => [
                'required',
                'regex:/^(017|013|015|016|018|019)[0-9]{8}$/'
            ],
            'password' => 'required|min:6',
        ], [
            'email.regex' => 'Please enter valid email address.',
            'phone.regex' => 'Enter a valid phone number',
        ]);



        //email check
        $email = User::where('email', $request->email)->first();
        if ($email) {
            return redirect()->back()->with('error', 'Email already exists');
        }

        //phone check
        $phone = User::where('phone', $request->phone)->first();
        if ($phone) {
            return redirect()->back()->with('error', 'Phone already exists');
        }

        //username check
        $username = User::where('username', $request->username)->first();
        if ($username) {
            return redirect()->back()->with('error', 'Username already exists');
        }
    
        $verificationCode = rand(100000, 999999);
        $randomImage = rand(1, 10) . '.jpg';
        $profilePath = asset('images/profile/' . $randomImage);
    
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->profile_image = $profilePath;
        $user->password = bcrypt($request->password);
        $user->verification_code = $verificationCode;
        $user->is_verified = false;
        
    
        if ($request->referrer_id) {
            $user->referrer_id = $request->referrer_id;
        }
    
        $user->save();
    
        if ($request->has('referrer_id')) {
            // Increment referral count for referrer
            $referrer = User::find($request->referrer_id);
            if ($referrer) {
                $referrer->increment('referral_count');
            }
    
        }
    
        Mail::to($user->email)->send(new VerificationEmail($user));
    
        return redirect()->route('verify-email')->with('email', $user->email);
    }
    

    

    //logout 
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function forgot()
    {
        return view('forgot');
    }
    public function reset()
    {
        return view('reset');
    }

}
