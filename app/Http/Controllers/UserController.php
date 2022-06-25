<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegisterValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view('users.login');
    }
    public function loginPost(LoginValidation $request){
        if(Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            if(Auth::user()->role=='user'){
                return redirect()->route('account')->with(['success' => 'true']);
            }
            else{
                return redirect()->route('admin')->with(['success'=>'true']);
            }
        }
        return back()->withErrors(['auth' => 'Логин или Пароль не верный!']);
    }

    public function register(){
        return view('users.register');
    }

    public function registerPost(RegisterValidation $request){
        $requests = $request ->validated();
        $requests['password'] = Hash::make($request['password']);
        User::create($requests);
        return redirect()->route('login')->with(['register' => 'true']);
    }

    public function account()
    {
        return view('users.account');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
