@extends('layouts.adminDashboard')

@section('content')

<div class="row" style="margin-left: 250px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1>Gamma Alpha Chapter Directory</h1>
        </div>        
    </div>
</div>

<table class="table table-bordered" style="margin-left: 250px;" id="profileTable">
  <tr>
     <th width="50px">Image</th>
     <th width="500px">Information</th>
  </tr>

    @foreach ($profiles as $profile)

  <tr>
        <td><!-- Profile Image -->
            <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="No Profile Image Uploaded" style="width: 100px; height: 100px; object-fit: cover;" class="img-fluid rounded-circle"></td>
        <td>
            Name: {{ $profile->last_name }}, {{ $profile->first_name }}<br />
            Address: {{ $profile->address1 }}<br />
                    {{ $profile->city }}, {{ $profile->state}} {{ $profile->zip_code }}<br />            
            Email: {{ $profile->user->email }}
        </td>
    </tr>

    @endforeach

</table>

{!! $profiles->links('pagination::bootstrap-5') !!}

@endsection