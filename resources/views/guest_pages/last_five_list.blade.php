@extends('layouts.guest')

@section('content') 

    <style>
        .my-custom-container {
            width: 800px;
        }
    </style>

    <div class="d-flex justify-content-center">
        <div class="my-custom-container bg-light p-4 shadow rounded"> 

            <div class="container">
                <h1 class="text-center">Upcoming Events</h1>
            </div>

            @foreach ($events as $event)
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <h5 class="card-text">Start Date: {{ \Carbon\Carbon::parse($event->start_date)->format('F d, Y h:i A') }}</h5>
                        <h5 class="card-text">End Date: {{ \Carbon\Carbon::parse($event->end_date)->format('F d, Y h:i A') }}</h5>
                        <h5 class="card-text">Location: {{ $event->location }}</h5>
                        <a href="{{ route('event.public-details', $event->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection