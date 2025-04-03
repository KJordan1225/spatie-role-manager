@extends($layout)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Test View') }}</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    @if (isset($message))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    @endif

                    @session('success')
                        <div class="alert alert-success" role="alert"> 
                            {{ $value }}                            
                        </div>
                    @endsession

                    @session('error')
                        <div class="alert alert-danger" role="alert"> 
                            {{ $value }}                            
                        </div>
                    @endsession

                    <table class="table table-bordered" id="profileTable">                        
                        <tr>
                            <td width="100px"><!-- Profile Image -->
                                <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="No Profile Image Uploaded" style="width: 100px; height: 100px; object-fit: cover;" class="img-fluid rounded-circle"></td>
                            <td width="300px">
                                Name: {{ $profile->last_name }}, {{ $profile->first_name }}<br />
                                Address: {{ $profile->address1 }}<br />
                                        {{ $profile->city }}, {{ $profile->state}} {{ $profile->zip_code }}<br />            
                                Email: {{ $profile->user->email }} <br />
                                Phone: {{ $profile->phone_number }} {{ $profile->phone_type}}
                            </td>
                        </tr>
                    </table>
                    
                    <br /><br />

                    @if (Auth::check())
                        {{ __('You are logged in! Brother Dashboard') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection