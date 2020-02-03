<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function showAdminLoginForm()
    {
        return view('admin.auth.login', ['url' => 'admin']);
    }

    public function adminLogin(LoginRequest $request)
    {
      
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'))->with('message', 'Email/Password Incorrect!');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
      
    }
}
