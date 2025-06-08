@extends('layouts.brotherDashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Brother Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @session('error')
                        <div class="alert alert-danger" role="alert"> 
                            {{ $value }}
                        </div>
                    @endsession

                    @if ($profile === null)
                    @else
                    <table class="table table-bordered" id="profileTable">                        
                        <tr>
                            <td width="100px">                                
                                <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="No Profile Image Uploaded" style="width: 100px; height: 100px; object-fit: cover;" class="img-fluid rounded-circle">
                            </td>
                            <td width="300px">
                                Name: {{ $profile->last_name }}, {{ $profile->first_name }}<br />
                                Address: {{ $profile->address1 }}<br />
                                        {{ $profile->city }}, {{ $profile->state}} {{ $profile->zip_code }}<br />            
                                Email: {{ $profile->user->email }}<br />
                                Phone: {{ $profile->phone_number }}&nbsp;-&nbsp;{{ $profile->phone_type }}<br />
                            </td>
                        </tr>
                    </table>
                    @endif

                    {{ __('You are logged in! Brother Dashboard') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection