<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\SendEmailAfterRegist;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPorifile;

class LoginRegisterFeController extends Controller
{
    public function index()
    {
        return view('login-user');
    }

    public function register()
    {

        return view('register-user');
    }

    public function registerStore(Request $request)
    {

        $user = User::create([
            'name'     => $request->fname .' '. $request->lname,
            'email'   => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $userId =   $user->id;

        $userP = UserPorifile::insert([
            'uid' => $userId,
            'userGroup' => NULL,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'bod' => NULL,
            'gender' => '',
            'phoneNumber' => '',
            'mobileNumber' => $request->tlp,
            'address' => $request->alamat,
            'province' => '',
            'city' => '',
            'subDistrict' => '',
            'ward' => '',
            'rt' => '',
            'rw' => '',
            'postal' => $request->kodepos,
            'createdTime' => date('Y-m-d H:i:s'),
            'updatedTime' => date('Y-m-d H:i:s'),
            'status' => 1
        ]);


        // Mail::to($request->email)->send(new SendEmailAfterRegist($request->email,$request->password, $request->name));
        return redirect('login-user')->with('message', 'Successfully  Register, Check Your Email To See Credential Login');
    }

    public function loginUser(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $data = $request->all();
            $user = User::where('email', $data['email'])->first();
            $fname = explode(' ', $user->name)[0];
            $request->session()->put('userId', $user->id);
            $request->session()->put('name', $fname);
            $request->session()->put('email', $user->email);
            return redirect('/')->with('message', 'Successfully Login');
        }else{
            return redirect('/')->with('error-login', 'Login Failed');
        }
    }

    public function logout()
    {
        if (session()->has('email')) {
            session()->pull('name');
            session()->pull('email');
            session()->pull('userId');
        }
        Auth::logout();
        return redirect('/')->with('message', 'Success Logout!');
    }
}
