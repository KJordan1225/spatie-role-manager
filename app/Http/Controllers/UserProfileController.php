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

class UserProfileController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:profile-list|profile-create|profile-edit|profile-delete', ['only' => ['index','store']]);
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
        return view('manage.user_profiles.index',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    
        return view('manage.user_profiles.edit',compact('user','roles','userRole','userProfile'));
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
    
        return redirect()->route('manage.user_profiles.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
