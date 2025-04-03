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

        switch ($role) {
            case 'Admin':
                return view('admindash');
            case 'Manager':
                return view('managerdash');
            case 'Brother':
                return view('brotherdash',compact('role'));
            default:
                abort(403, 'Unauthorized action.');
        }
        
    }
}
