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
use App\Models\ShareDocument;
use Illuminate\Support\Str;

class UserController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','show']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $users = User::orderBy('id', 'ASC')->paginate(10);
        $layout = $this->dynamicLayout();
        return view('manage.users.index',compact('users','layout')) 
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $roles = Role::pluck('name','name')->all();
        $layout = $this->dynamicLayout();

        return view('manage.users.create',compact('roles','layout'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'role' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('role'));
        $layout = $this->dynamicLayout();
    
        return redirect()->route('manage.users.index','layout')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $user = User::find($id);
        $userProfile = UserProfile::where('user_id', $user->id)->first();
        $layout = $this->dynamicLayout();

        return view('manage.users.show',compact('user','userProfile','layout'));
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
    
        return view('manage.users.edit',compact('user','roles','userRole','userProfile','layout'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'role' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('role'));
        $layout = $this->dynamicLayout();
    
        return redirect()->route('manage.users.index','layout')
                        ->with('success','User updated successfully');
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
        $firstRole = $user->getRoleNames()->first();

        //Do not delete if $id == 1 - Super Admin
        if ($id != 1) {
            $user->delete();
            $layout = $this->dynamicLayout();

            if ($firstRole === 'Admin') {
                return redirect()->route('welcome')
                            ->with('success','User deleted successfully');
            } else {
                return redirect()->route('manage.users.index','layout')
                            ->with('success','User deleted successfully');
            } 
        } 
        
        return redirect()->route('welcome')
                    ->with('danger','Cannot delete Super Admin user');
    }


    public function updateIsActive(Request $request)
    {
        $itemStatuses = $request->input('items', []);

        foreach ($itemStatuses as $itemId => $status) {
            User::where('id', $itemId)->update(['is_active' => (bool) $status]);
        }

        return back()->with('success', 'User active statuses updated successfully.');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listIsActive(Request $request): View
    {
        $users = User::all();
        $layout = $this->dynamicLayout();

        return view('manage.users.listIsActive',compact('users','layout'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        // Perform a database query to search for users by username or name
        $users = User::where('email', 'like', "%$query%")
            ->orWhere('name', 'like', "%$query%")
            ->get();

        $userList = [];

        foreach ($users as $key => $value) {
            $userList[] = ['name' => Str::studly($value->name), 'email' => $value->email, 'id' => $value->id];
        }
        return response()->json(['users' => $userList]);
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
