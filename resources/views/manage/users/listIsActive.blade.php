@extends($layout)

@section('content')
<div class="row" style="margin-left: 250px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Update User Active Status</h2>
        </div>        
    </div>
</div>

@session('success')
    <div class="alert alert-success" role="alert" style="margin-left: 250px;"> 
        {{ $value }}
    </div>
@endsession

<form action="{{ route('manage.users.updateIsActive') }}" method="POST" id="formA">
    @csrf

<table class="table table-bordered" style="margin-left: 250px; width: 80%;">
  <tr>
     <th width="25px">No</th>
     <th width="50px">Name</th>
     <th width="100px">Email</th>
	 <th width="50px"><input type="checkbox" id="selectAll">&nbsp;&nbsp;Active</th>
  </tr>
    @foreach ($users as $key => $user)    
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>           
            <!-- Hidden input for unchecked state, checkbox for checked state -->
            <input type="hidden" name="items[{{ $user->id }}]" value="0">
            <input type="checkbox" name="items[{{ $user->id }}]" value="1" class="itemCheckbox" {{ $user->is_active ? 'checked' : '' }}>

        </td>       
    </tr>    
    @endforeach    

</table>

<input type="hidden" name="new_status" value="1">

<div class="row" style="margin-left: 250px;">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3">Update Active</button>
    </div>
</div>

</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('selectAll').addEventListener('change', function (event) {
            var checkboxes = document.querySelectorAll('.itemCheckbox');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = event.target.checked;
            });
        });
    });

</script>

@endsection
