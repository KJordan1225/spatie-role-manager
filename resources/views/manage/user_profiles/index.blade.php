@extends('layouts.adminDashboard')

@section('content')
<div class="row" style="margin-left: 250px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>User Profile Management</h2>
        </div>
        <!-- <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('manage.users.create') }}"><i class="fa fa-plus"></i> Create New User</a>
        @endcan
        </div> -->
    </div>
</div>

@session('success')
    <div class="alert alert-success" role="alert" style="margin-left: 250px;"> 
        {{ $value }}
    </div>
@endsession

<table class="table table-bordered" style="margin-left: 250px;">
  <tr>
     <th width="100px">No</th>
     <th width="100px">Username</th>
     <th width="150px">Full Name</th>
	 <th width="100px">Profile Status</th>
	 <th width="280px">Action</th>
  </tr>
    @foreach ($users as $key => $user)    
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>
            @if($user->userProfile)
                {{ $user->userProfile->first_name }} {{ $user->userProfile->last_name }} 
            @else
                No profile
            @endif
        </td>
        <td>
            @if($user->userProfile)
                Profile 
            @else
                No profile
            @endif
        </td>
        <td>
            <!-- <a class="btn btn-info btn-sm" href="{{ route('manage.users.show',$user->id) }}"><i class="fa-solid fa-list"></i> Show</a> -->
            <!-- @can('user-edit') -->
             @if($user->userProfile)
                <a class="btn btn-primary btn-sm" href="{{ route('manage.user_profiles.edit',$user->id) }}"><i class="fa-solid fa-pen-to-square"></i>Edit User Profile  </a>
             @else
                <a class="btn btn-primary btn-sm" href="#"><i class="fa-solid fa-pen-to-square"></i>Create User Profile</a>
             @endif                
            <!-- @endcan -->

             <!-- @can('user-delete')
            <form method="POST" action="{{ route('manage.users.destroy', $user->id) }}" style="display:inline">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
            @endcan -->
        </td>
    </tr>
    @endforeach
</table>


@endsection
