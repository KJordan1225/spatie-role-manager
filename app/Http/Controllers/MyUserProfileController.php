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
        $layout = $this->dynamicLayout();

       return view ('myProfile.index',compact('layout'));
        
    }

    // Display Edit My Profile form
    public function edit()
    {
     
        $user = Auth::user();
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $userProfile = UserProfile::where('user_id', $user->id)->first();
        $layout = $this->dynamicLayout();
    
        return view('myProfile.edit',compact('user','roles','userRole','userProfile','layout'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request): RedirectResponse
    {
        
        // Validate form request
        $this->validate($request, [
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'address1' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'zip_code' => 'nullable',
            'phone_number' => 'nullable',
            'phone_type' => 'required|in:mobile,landline',
            'dob' => 'nullable|date_format:Y-m-d',
            'queversary' => 'nullable|date_format:Y-m-d',            
        ]);

        $user = Auth::user();
        $userProfile = UserProfile::where('user_id', $user->id)->first();
        $input = $request->all();    
        $userProfile->update($input); 
        $profile = UserProfile::where('user_id', $user->id)->first(); 
        $layout = $this->dynamicLayout();      
    
        return redirect()->route('my_profile.view','layout')
                        ->with('success','User profile updated successfully');
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
