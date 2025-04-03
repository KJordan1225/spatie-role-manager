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


class UserProfileController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:profile-list|profile-create|profile-edit|profile-delete|show-my-profile', ['only' => ['index','show']]);
         $this->middleware('permission:profile-create', ['only' => ['create','store']]);
         $this->middleware('permission:profile-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:profile-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $users = User::orderBy('id', 'ASC')->paginate(5);
        $layout = $this->dynamicLayout();

        return view('manage.user_profiles.index',compact('users','layout'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id): View
    {
        $user = User::find($id);
        $layout = $this->dynamicLayout();

        return view('manage.user_profiles.create', compact('user','layout'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id): RedirectResponse
    {
        // Validate form request
        $this->validate($request, [
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'address1' => 'nullable',
            'address2' => 'nullable',
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
        $userProfile->address2 = $request->address2;
        $userProfile->city = $request->city;
        $userProfile->state = $request->state;
        $userProfile->zip_code = $request->zip_code;
        $userProfile->phone_number = $request->phone_number;
        $userProfile->phone_type = $request->phone_type;
        $userProfile->dob = $request->dob;
        $userProfile->queversary = $request->queversary;
        $userProfile->user_id = $id;
        $userProfile->save(); // Save the user profile to the database

        $layout = $this->dynamicLayout();
    
        return redirect()->route('manage.user_profiles.index','layout')
                        ->with('success','User profile created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $userProfile = UserProfile::where('user_id', $user->id)->first();
        $layout = $this->dynamicLayout();
    
        return view('manage.user_profiles.edit',compact('user','roles','userRole','userProfile','layout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Validate form request
        $this->validate($request, [
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'address1' => 'nullable',
            'address2' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'zip_code' => 'nullable',
            'phone_number' => 'nullable',
            'phone_type' => 'required|in:mobile,landline',
            'dob' => 'nullable|date_format:Y-m-d',
            'queversary' => 'nullable|date_format:Y-m-d',            
        ]);

        $user = User::find($id);
        $userProfile = UserProfile::where('user_id', $user->id)->first();
        $input = $request->all();    
        $userProfile->update($input);  
        $layout = $this->dynamicLayout();      
    
        return redirect()->route('manage.user_profiles.index','layout')
                        ->with('success','User profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $user = User::find($id);
        UserProfile::where('user_id',$user->id)->delete();
        $layout = $this->dynamicLayout();

        return redirect()->route('manage.user_profiles.index','layout')
                        ->with('success','User profile deleted successfully');
    }


    /**
     * Upload user profile pic
     *
     */
    public function uploadPic(Request $request, $id)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find($id); // or use User::find($id) if it's an admin updating a user's profile
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
        }
        

        return redirect()->back()->with('success', 'Profile image updated successfully!');
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
