@extends('layouts.guest')

@section('content') 

    <style>
        .my-custom-container {
            width: 900px;
        }
    </style>

    <div class="d-flex justify-content-center">
        <div class="my-custom-container bg-light p-4 shadow rounded"> 

{!! $event->content !!}

        </div>
    </div>

@endsection