@extends('layouts.adminDashboard')

@section('content')
<div class="row" style="margin-left: 250px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('admin.roles.create') }}"><i class="fa fa-plus"></i> Create New Role</a>
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
     <th width="300px">Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)    
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('admin.roles.show',$role->id) }}"><i class="fa-solid fa-list"></i> Show</a>
            @can('role-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit',$role->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
            @endcan

             @can('role-delete')
            <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}" style="display:inline">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete(this);">Delete</button>
            </form>
            @endcan
        </td>
    </tr>
    @endforeach

    {!! $roles->links('pagination::bootstrap-5') !!}
    
</table>

<script>
    function confirmDelete(button) {
        // Confirm before submission
        return confirm("Are you sure you want to delete this role?");    }
</script>

@endsection
