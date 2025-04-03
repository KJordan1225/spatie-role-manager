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
use Illuminate\Support\Facades\Storage;

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
    public function update(Request $request)
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
        $layout = $this->dynamicLayout(); 
        $profile = UserProfile::where('user_id', $user->id)->first();  
        
        return view('myProfile.index',compact('layout','profile'))
            ->with('message','User profile updated successfully');    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $layout = $this->dynamicLayout();

        return view('myProfile.create', compact('layout'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): View
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

        // Create a new user profile instance and set properties individually
        $userProfile = new UserProfile();
        $userProfile->first_name = $request->first_name;
        $userProfile->last_name = $request->last_name;
        $userProfile->address1 = $request->address1;
        $userProfile->city = $request->city;
        $userProfile->state = $request->state;
        $userProfile->zip_code = $request->zip_code;
        $userProfile->phone_number = $request->phone_number;
        $userProfile->phone_type = $request->phone_type;
        $userProfile->dob = $request->dob;
        $userProfile->queversary = $request->queversary;
        $userProfile->user_id = Auth::user()->id;
        $userProfile->save(); // Save the user profile to the database
        $profile = $userProfile;

        $layout = $this->dynamicLayout();
    
        return view('myProfile.index',compact('layout','profile'))
                        ->with('message','User profile created successfully');
    }

    /**
     * Upload user profile pic
     *
     */
    public function uploadPic(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user(); // or use User::find($id) if it's an admin updating a user's profile
        $userProfile = UserProfile::where('user_id', $user->id)->first();

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $filename = 'profile_' . $user->id . '.' . $image->getClientOriginalExtension();

            // Delete the old image if exists
            if ($userProfile->profile_image) {
                Storage::disk('public')->delete($userProfile->profile_image);
            }

            // Store the new image
            $path = $image->storeAs('profiles', $filename, 'public');
            $userProfile->profile_image = $path;
            $userProfile->save();
            $profile = $userProfile;
        }

        $layout = $this->dynamicLayout();
        return view('myProfile.index',compact('layout','profile'))
                        ->with('message','User profile image uploaded successfully');
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
