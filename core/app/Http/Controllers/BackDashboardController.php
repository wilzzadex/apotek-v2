<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackDashboardController extends Controller
{
    public function index()
    {
        return view('back.pages.dashboard.dashboard');
    }
}
