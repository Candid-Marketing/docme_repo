<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function manage()
    {
        return view('admin.pages.user.index');
    }
}
