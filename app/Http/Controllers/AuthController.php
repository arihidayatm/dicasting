<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserAuthVerifyRequest;

class AuthController extends Controller
{
    public function index() : View
    {
        return view('pages.auth.auth-login');
    }

    public function verify(UserAuthVerifyRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        if(Auth::guard('super_admin')->attempt(['email'=>$data['email'], 'password'=>$data['password'],'role'=>'super_admin'])){
            $request->session()->regenerate();
            return redirect()->intended('/admin/home');
        }else if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password'],'role'=>'admin'])){
            $request->session()->regenerate();
            return redirect()->intended('/admin/home');
        }else if(Auth::guard('user')->attempt(['email'=>$data['email'], 'password'=>$data['password'],'role'=>'user'])){
            $request->session()->regenerate();
            return redirect()->intended('/user/home');
        }else{
            return redirect(route('login'))->with('msg','Email dan Password salah');
        }
    }

    public function logout(): RedirectResponse
    {
        if(Auth::guard('super_admin')->check()){
            Auth::guard('super_admin')->logout();
        }else if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }else if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
        return redirect(route('login'));
    }

}
