@extends($layout)

@section('content')
<div class="row" style="margin-left: 250px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit User Profile</h2>
        </div>
        <!-- <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('my_profile.view') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div> -->
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

<form method="POST" action="{{ route('my_profile.update') }}">
    @csrf
    @method('PUT')

    <style>
        .required-asterisk {
            color: red;
        }
    </style>
    
    <div class="row" style="margin-left: 250px;">
        <span class="required-asterisk">* required field</span>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:<span class="required-asterisk">*</span></strong>
                <input type="text" name="first_name" placeholder="FirstName" class="form-control" value="{{ $userProfile->first_name }}" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:<span class="required-asterisk">*</span></strong>
                <input type="text" name="last_name" placeholder="LastName" class="form-control" value="{{ $userProfile->last_name }}" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address ln 1:</strong>
                <input type="text" name="address1" placeholder="Address1" class="form-control" value="{{ $userProfile->address1 }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address ln 2:</strong>
                <input type="text" name="address2" placeholder="Address2" class="form-control" value="{{ $userProfile->address2 }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City:</strong>
                <input type="text" name="city" placeholder="City" class="form-control" value="{{ $userProfile->city }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>State:</strong>
                <input type="text" name="state" placeholder="State" class="form-control" value="{{ $userProfile->state }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Zip Code:</strong>
                <input type="text" name="zip_code" placeholder="ZipCode" class="form-control" value="{{ $userProfile->zip_code }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Number:</strong>
                <input type="text" name="phone_number" placeholder="Phoneumber" class="form-control" value="{{ $userProfile->phone_number }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Type:</strong>
                <select name="phone_type" id="status">
                    <option value="mobile" {{ $userProfile->phone_type == 'mobile' ? 'selected' : '' }}>Mobile</option>
                    <option value="landline" {{ $userProfile->phone_type == 'landline' ? 'selected' : '' }}>Landline</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>BirthDate:</strong>
                <input type="text" name="dob" placeholder="YYYY-MM-DD" class="form-control" value="{{ $userProfile->dob }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Queversary:</strong>
                <input type="text" name="queversary" placeholder="YYYY-MM-DD" class="form-control" value="{{ $userProfile->queversary }}">
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
    </div>    
</form>
<br />
<br />
@if($userProfile->profile_image)   
    <div class="row" style="margin-left: 250px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <img src="{{ asset('storage/' . $userProfile->profile_image) }}" alt="Profile Image" style="width: 150px; height: 150px; border: 1px solid #000; padding: 5px; margin: 10px;">
            </div>
        </div>
    </div>
@endif
<br />
UPLOAD PROFILE PICTURE
<hr />
<form action="{{ route('my_profile.upload_pics') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row" style="margin-left: 250px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="file" name="profile_image" id="profile_image">
                <button type="submit">Upload Profile Picture</button>
            </div>
        </div>
    </div>
</form>
<br />
<hr />

@endsection
