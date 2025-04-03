@extends($layout)

@section('content')
<div class="row" style="margin-left: 250px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create User Profile</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('manage.user_profiles.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger" style="margin-left: 250px;">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
         @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
         @endforeach
      </ul>
    </div>
@endif
<br />
<br />

<form method="POST" action="{{ route('manage.user_profiles.store',$user->id) }}">
    @csrf

    <div class="row" style="margin-left: 250px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="first_name" placeholder="FirstName" class="form-control" value="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                <input type="text" name="last_name" placeholder="LastName" class="form-control" value="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address ln 1:</strong>
                <input type="text" name="address1" placeholder="Address1" class="form-control" value="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address ln 2:</strong>
                <input type="text" name="address2" placeholder="Address2" class="form-control" value="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City:</strong>
                <input type="text" name="city" placeholder="City" class="form-control" value="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>State:</strong>
                <input type="text" name="state" placeholder="State" class="form-control" value="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Zip Code:</strong>
                <input type="text" name="zip_code" placeholder="ZipCode" class="form-control" value="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Number:</strong>
                <input type="text" name="phone_number" placeholder="Phoneumber" class="form-control" value="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Type:</strong>
                <select name="phone_type" id="status">
                    <option value="mobile">Mobile</option>
                    <option value="landline">Landline</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>BirthDate:</strong>
                <input type="text" name="dob" placeholder="YYYY-MM-DD" class="form-control" value="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Queversary:</strong>
                <input type="text" name="queversary" placeholder="YYYY-MM-DD" class="form-control" value="">
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
    </div>    
</form>


@endsection