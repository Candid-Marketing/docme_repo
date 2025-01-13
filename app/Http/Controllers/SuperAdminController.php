<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superadmin.pages.index');
    }
    public function finance()
    {
        return view('superadmin.pages.stripe.index');
    }
    public function email()
    {
        return view('superadmin.pages.email.index');
    }
    public function homepage()
    {
        return view('superadmin.pages.homepage.index');
    }

}
