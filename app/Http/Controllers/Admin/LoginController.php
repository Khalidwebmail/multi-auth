<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $r)
    {
        $this->validate($r, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt(['email' => $r->email, 'password' => $r->password], $r->remember)) {
            return redirect()->intended(route('admin.home'));
        }

        else {
            return redirect()->back()->withInput($r->only('email'));
        }
    }
}
