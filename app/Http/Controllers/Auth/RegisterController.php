<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:20',
            'username' => 'required|string|max:255|unique:users,username',
        ]);
    }

    protected function create(array $data)
    {
        // Generate a 6-digit verification code
        $verificationCode = rand(100000, 999999);

            $randomImage = rand(1, 10) . '.jpg';
            $profilePath = 'images/profile/' . $randomImage; // Assuming public/profile_images/1.jpg etc

    
        // Create the user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'username' => $data['username'],
            'verification_code' => $verificationCode, // Store verification code
            'is_verified' => false, // Default to unverified
            'profile_image' =>  $profilePath,
        ]);

        // Send verification email
        Mail::to($user->email)->send(new VerificationEmail($user));



    
        // Redirect to the verification page with the email
        return redirect()->route('verify-email')->with('email', $user->email);
    }
}
