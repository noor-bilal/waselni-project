<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function index(){
        $title="Welcome to ".env('APP_NAME');
        return view('user.welcome',compact('title'));
    }


    public function login(){
        $title="Welcome to ".env('APP_NAME');
        return view('user.auth.login',compact('title'));
    }



    public function do_login(){
        $remember_me = request()->has('remember_me') ? true : false;

        if (\auth()->attempt(['national_number' => request('national_number'), 'password' => request('password')], $remember_me)) {
            return redirect('appointment');
        } else {
            return back()->withErrors(['error_login' => 'معلومات الدخول غير صحيحة']);
        }
    }




    public function register(){
        $title="Welcome to ".env('APP_NAME');
        return view('user.auth.register',compact('title'));
    }




    public function do_register(){
        $data=$this->validate(\request(),[
           'name'=>'required',
           'mobile'=>'required',
           'password'=>'required|min:4',
           'national_number'=>'required|min:10',
           'email'=>'required|unique:users,email',
        ]);

        $data['password']=bcrypt(\request('password'));
        $data['is_active']=0;

        $user=User::create($data);
        Auth::loginUsingId($user->id);
        alert(__('lang.success'),__('lang.success_register'),'success');
        return redirect('appointment');
    }



    public function logout(){
        auth()->logout();
        session()->flush();
        return redirect('/');
    }

}
