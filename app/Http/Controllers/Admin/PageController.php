<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        ///Auth::guard('admin')->user();
        return view('admin.pages.index');
    }
    public function addPage(Request $request)
    {
        ///Auth::guard('admin')->user();
        return view('admin.pages.add');
    }
}
