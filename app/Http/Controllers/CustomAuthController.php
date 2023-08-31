<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CustomAuthController extends Controller
{
    use AuthorizesRequests ;

    public function login()
    {
        if(Auth::check()){

        }
        return view('auth.login',['isLogin'=>true]);
    }
    public function register()
    {
        if(Auth::check()){

        }
        return view('auth.login',['isLogin'=>false]);

    }

    public function loginpost(Request $request)
    {

        $request->validate([
            'email' => 'required|unique:students|max:100',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(url('/student/welcome'));
        } else {
            return back()->withErrors([
                'error' => 'The provided credentials do not match our records.',
            ]);
        }
    }


    public function registerpost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required |email|unique:users|max:100',
            'password' => 'required|min:8',

        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $User = User::create($data);


        if (!$User) {
            return redirect((route('register')))->with("error", "please regisation");
        } else {

            return redirect(route('login'))->with("success", "registertion succesfull now you can login");
        }
    }

    public function logout()
    {
 
        Session::flush();

        Auth::logout();

        return redirect(route('login'))->with('success', "You are Logout");
    }
    public function forgotPassword()
    {
        return view('auth.forgotpass');
    }

    ///Forgot password...


    public function  forgotPasswordPost(Request $request)
    {

        $request->validate([
            'email' => "required |email|exists:users",
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);


        Mail::send("email.forgotpass", ['token' => $token], function ($messagge) use ($request) {
            $messagge->to($request->email);
            $messagge->subject("Reset Password");
        });

        return redirect()->to(route('forgotpassword'))->with("success", "we have send an email to reset password");
    }
    public function resetPassword($token)
    {

        return view('auth.restepass', compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {

        $request->validate([
            "email" => "required|email|exists:users",
            "password" => "required|min:8|confirmed",
            "password_confirmation" => "required",
        ]);

        $updatePassword =  DB::table('password_resets')->where([

            "email" => $request->email,
            "token" => $request->token,
        ])->first();

        if (!$updatePassword) {
            return redirect()->to(route('resetpassword'))->with("error", "invaid Password");
        }

        User::where("email", $request->email)->update(["password" => Hash::make($request->password)]);
        DB::table('password_resets')->where(["email" => $request->email])->delete();
        return redirect()->to(route('login'))->with("success", "password reset success");
    }
}
