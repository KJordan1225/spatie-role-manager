@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @session('error')
                        <div class="alert alert-danger" role="alert" style="margin-left: 250px;"> 
                            {{ $value }}
                        </div>
                    @endsession
                    
                    <a href="{{ url('/') }}">Return to Home</a><br /><br />
                    

                    {{ __('You are logged in!') }} Non Admin User
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
