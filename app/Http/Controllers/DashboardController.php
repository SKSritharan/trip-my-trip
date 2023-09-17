<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
//        $user_role = Auth::user()->role->slug;

        return view('dashboard');
//        if ($user_role === 'admin') {
//            return view('dashboard');
//        } elseif ($user_role === 'guide') {
//            return view('landing-page.welcome');
//        } elseif ($user_role === 'vehicle') {
//            return view('landing-page.welcome');
//        }else{
//            return view('dashboard');
//        }
    }
}
