@extends('frontend.home.index')

@section('content')
@include('frontend.partials.header')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card" style="width: 100%; max-width: 600px;">
        <div class="card-header">
            <h5>Profile Details</h5>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>
    </div>
</div>

@include('frontend.partials.footer')

@endsection
