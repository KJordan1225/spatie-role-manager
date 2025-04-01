@extends('layouts.adminDashboard')

@section('content')
<div class="row" style="margin-left: 250px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>User Management</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('manage.users.create') }}"><i class="fa fa-plus"></i> Create New User</a>
        @endcan
        </div>
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
     <th width="100px">Name</th>
     <th width="150px">Email</th>
	 <th width="100px">Active</th>
	 <th width="280px">Action</th>
  </tr>
    @foreach ($users as $key => $user)    
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>
            <input type="checkbox" name="is_active" id="active" value="1" {{ $user->is_active ? 'checked' : '' }}>
        </td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('manage.users.show',$user->id) }}"><i class="fa-solid fa-list"></i> Show</a>
            @can('user-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('manage.users.edit',$user->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
            @endcan

             @can('user-delete')
            <form method="POST" action="{{ route('manage.users.destroy', $user->id) }}" style="display:inline">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete(this);">Delete</button>
            </form>
            @endcan
        </td>
    </tr>
    @endforeach

    {!! $users->links('pagination::bootstrap-5') !!}

</table>

<script>
    function confirmDelete(button) {
        // Confirm before submission
        return confirm("Are you sure you want to delete this user?");    }
</script>
@endsection
