<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::user(); 
        return view('dashboard', compact('admin'));
    }
}
