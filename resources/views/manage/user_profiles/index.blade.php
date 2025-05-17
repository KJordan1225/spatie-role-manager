@extends($layout)

@section('content')
<div class="row" style="margin-left: 250px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>User Profile Management</h2>
        </div>        
    </div>
</div>


@session('success')
    <div class="alert alert-success" role="alert" style="margin-left: 250px;"> 
        {{ $value }}
    </div>
@endsession

<table class="table table-bordered" style="margin-left: 250px;" id="profileTable">
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
                <a class="btn btn-primary btn-sm" href="{{ route('manage.user_profiles.create',$user->id) }}"><i class="fa-solid fa-pen-to-square"></i>Create User Profile</a>
             @endif                
            <!-- @endcan -->
            @if($user->userProfile)
                @can('profile-delete')
                <form method="POST" action="{{ route('manage.user_profiles.destroy', $user->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" id="delete-{{$i}}" onclick="return confirmDelete(this);">Delete</button>
                </form>
                @endcan
            @endif
        </td>
    </tr>
    @endforeach

     {!! $users->links('pagination::bootstrap-5') !!}

</table>

<script>
    function confirmDelete(button) {
        // Confirm before submission
        return confirm("Are you sure you want to delete the pofile for this user?");
    }
</script>

@endsection
