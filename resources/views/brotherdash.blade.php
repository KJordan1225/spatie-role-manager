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
                        <div class="alert alert-danger" role="alert" style="margin-left: 250px;"> 
                            {{ $value }}
                        </div>
                    @endsession

                    {{ __('You are logged in! Brother Dashboard') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection