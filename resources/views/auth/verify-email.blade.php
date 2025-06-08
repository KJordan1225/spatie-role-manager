@extends('layouts.guest')

@section('content')
    <h1 class="text-xl font-bold mb-4">Email Verification Required</h1>
    <p class="mb-4">Thanks for signing up! Please check your email to verify your address before continuing.</p>

    @if (session('status') == 'verification-link-sent')
        <div class="text-green-600">
            A new verification link has been sent to your email address.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary mt-4">Resend Verification Email</button>
    </form>
@endsection