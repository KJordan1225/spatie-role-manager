<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class MyUserProfileController extends Controller
{
    //Test
    public function index()
    {
     
        
    }

    // Display Edit My Profile form
    public function edit()
    {
     
        $user = Auth::user();
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $userProfile = UserProfile::where('user_id', $user->id)->first();
        $layout = $this->dynamicLayout();
    
        return view('manage.user_profiles.edit',compact('user','roles','userRole','userProfile','layout'));
        
    }

    public function dynamicLayout() 
    {
        $role = Auth::user()->getRoleNames()->first();

        switch ($role) {
            case 'Admin':
                return 'layouts.adminDashboard';
            case 'Manager':
                return 'layouts.managerDashboard';
            case 'Brother':
                return 'layouts.brotherDashboard';
            default:
                return 'layouts.brotherDashboard';
            }

    } 
}
