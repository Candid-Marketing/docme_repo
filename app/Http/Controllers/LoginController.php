<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\StripeConfigurations;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Homepage;


class LoginController extends Controller
{
    // Show the login form
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            // Redirect the user to their dashboard based on their role
            switch ($user->user_status) {
                case 1: // Super Admin
                    return redirect()->route('superadmin.dashboard');
                case 2: // Admin
                    return redirect()->route('admin.dashboard');
                case 3: // Regular User
                    return redirect()->route('user.dashboard');
                default:
                    return redirect()->route('home'); // Default fallback
            }
        }
        return view('authentication.login');
    }

    // Handle the login authentication
    public function authenticate(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Check if the user exists in the database
        $user = User::where('email', $request->email)->first();

        // If user is found and password matches
        if ($user && Hash::check($request->password, $user->password)) {

            // Check if the user is verified
            if ($user->is_verified == 0 || $user->is_verified == null) {
                // Redirect the user if they are not verified
                return redirect()->route('send-otp', ['email' => $request->email]);
            }
            if($user->status == 0 || $user->status == null){
              return redirect()->route('stripe.payment');
            }
            // Log the user in
            Auth::login($user);

            switch ($user->user_status) {
                case 1: // Super Admin
                    return redirect()->route('superadmin.dashboard');
                case 2: // Admin
                    return redirect()->route('admin.dashboard');
                case 3: // User
                    return redirect()->route('user.dashboard');
                default:
                    return redirect()->route('home');
            }
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect()->route('login.show');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'pass' => 'required|string|min:6',
            'cpass' => 'required|string|same:pass',
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email cannot exceed 255 characters.',
            'email.unique' => 'This email is already taken. Please choose another.',

            'pass.required' => 'Password is required.',
            'pass.string' => 'Password must be a valid string.',
            'pass.min' => 'Password must be at least 6 characters.',

            'cpass.required' => 'Confirm Password is required.',
            'cpass.same' => 'Password and Confirm Password did not match.',
        ]);

        $user = User::insert([
            'first_name' => $validatedData['fname'],
            'last_name' => $validatedData['lname'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['pass']),
            'user_status'=> 2,
        ]);

        return redirect()->route('send-otp', ['email' => $validatedData['email']]);
    }

    public function sendotp(Request $request)
    {

        $otp = rand(100000, 999999);


        $email = $request->input('email');

        Mail::send('emails.otp', ['otp' => $otp], function ($message) use ($email) {
            $message->to($email)
                    ->subject('Your OTP Code');
        });

        // Optionally store the OTP in the session or database
        Session::put('otp', $otp);

        // Return the verification view
        return redirect()->route('show-otp',['email' => $email]);
    }

    public function showotp(Request $request)
    {
        $email = $request->input('email');
        return view('authentication.verify-otp', compact('email'));
    }

    public function verifyotp(Request $request)
    {

        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ]);


        $storedOtp = Session::get('otp');
        $otpExpiry = Session::get('otp_expiry');

        // Check if OTP is expired
        if (now()->greaterThan($otpExpiry)) {
            return back()->withErrors(['otp' => 'The OTP has expired. Please request a new one.']);
        }


        if ($storedOtp == $request->input('otp')) {
            $user = User::where('email', $request->input('email'))->first();
            $user->is_verified = 1;
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route('login.show');
        } else {
            // OTP is incorrect
            return back()->withErrors(['otp' => 'The OTP you entered is incorrect.']);
        }
    }

    public function proceedToPayment(Request $request)
    {
            $stripe = StripeConfigurations::latest()->first();

            try {
                Stripe::setApiKey($stripe->stripe_secret);

                $paymentIntent = PaymentIntent::create([
                    'amount' => 5000,
                    'currency' => 'usd',
                    'metadata' => ['integration_check' => 'accept_a_payment'],
                ]);

                return response()->json([
                    'clientSecret' => $paymentIntent->client_secret,
                ]);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 400);
            }
    }

    public function showStripePaymentPage()
    {
        return view('superadmin.pages.stripe.stripe-payment');
    }

    public function landing()
    {
        $homepage = Homepage::all();
        return view('landing', compact('homepage'));
    }
}
