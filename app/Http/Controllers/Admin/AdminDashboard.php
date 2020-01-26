<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function index()
    {
        ///Auth::guard('admin')->user();
        return view('admin.dashboard');
    }
}
