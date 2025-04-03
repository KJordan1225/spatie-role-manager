@extends('layouts.adminDashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Test View') }}</div>

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
                    
                    @unless (Auth::check() && Auth::user()->id === 1000)
                        <a href="{{ url('/') }}">Return to Home</a>
                    @endunless

                    @if (Auth::check())
                        {{ __('You are logged in! Test Dashboard') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection