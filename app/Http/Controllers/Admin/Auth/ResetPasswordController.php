<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;
use Auth;

class ResetPasswordController extends Controller
{
    //
    use ResetsPasswords;

    
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showResetForm(Request $request, $token = null) {
        return view('admin.auth.admin-reset')
            ->with(['token' => $token, 'email' => $request->email]
            );
    }


    //defining which guard to use in our case, it's the admin guard
    protected function guard()
    {
        return Auth::guard('admin');
    }

    //defining our password broker function
    protected function broker() {
        return Password::broker('admins');
    }
}
