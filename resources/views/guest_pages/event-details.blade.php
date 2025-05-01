@extends('layouts.guest')

@section('content')    

    @include('components.guest-header')
    @include('components.hero-carousel')

    <style>
        .my-custom-container {
            width: 800px;
        }
    </style>

    <div class="d-flex justify-content-center">
        <div class="my-custom-container bg-light p-4 shadow rounded"> 

{!! $event->content !!}

        </div>
    </div>

@endsection