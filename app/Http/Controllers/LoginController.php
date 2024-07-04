<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/dashboard'); // Redirect to dashboard if already logged in
        }

        return response()
            ->view('login') // Show login form if not logged in
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

    public function prosesLogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $data = $request->all();
            $user = User::where('email', $data['email'])->first();

            $request->session()->put('id', $user->id);
            $request->session()->put('email', $user->email);

            return redirect('/dashboard')->with('message', 'Successfully Login');
        }else{
            return redirect('/login')->with('error', 'Please Check Email Or Password');
        }
    }

    public function logout()
    {
        if (session()->has('user_email')) {
            session()->pull('user_email');
            session()->pull('user_id');
        }
        Auth::logout();
        return redirect('/login')->with('message', 'Success Logout!');
    }

}
