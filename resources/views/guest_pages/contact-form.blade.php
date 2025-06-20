@extends('layouts.guest')

@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
            @endsession
            <h1>Contact Us</h1>
            <p>If you have any questions or comments, please fill out the form below:</p>
            <form action="{{ route('contact.sendEnquiry') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                    @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                    @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="messageContent" name="messageContent" rows="4" placeholder="Your Message"></textarea>
                    @error('messageContent')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}  
                    </div>
                    @enderror    
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection('content')