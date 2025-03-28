<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $rolesCollection = $user->getRoleNames();
        $role = $rolesCollection->first();

        if ($role === 'Admin')
        {
            return view('admindash');
        } else {
            return view('home');
        }
        // dd($role[0]);
        
    }
}
