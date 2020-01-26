<?php

namespace App\Http\Controllers\Admin\Auth;

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

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
      
    }
}
