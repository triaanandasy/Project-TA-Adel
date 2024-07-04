@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    Welcome, {{ Auth::user()->name }}!
                </div>
                <div class="card-body">
                    <h5 class="card-title">Hello, {{ Auth::user()->name }}!</h5>
                    <p class="card-text">We are glad to see you again. Here's some useful information for you:</p>
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Additional content can go here -->
    </div>
    <div class="row">
        <!-- Additional content can go here -->
    </div>
@endsection
