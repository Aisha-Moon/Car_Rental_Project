@extends('frontend.home.index')

@section('content')
@include('frontend.partials.header')



<style>
   
    body {
        background-color: #f8f9fa;
    }

    .manage-bookings-container {
        background-color: #ffffff; /* White background for content container */
        color: #333333; /* Dark text for readability */
        border-radius: 10px;
        padding: 20px;
        margin: 50px auto; /* Center the container */
        max-width: 1200px; /* Limit width for better readability */
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Add subtle shadow for effect */
    }

    h2, h3 {
        color: #333333; /* Dark color for headings */
    }

    .booking-details {
        background-color: #f8f9fa; /* Light grey for booking details */
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        border: 1px solid #dddddd; /* Light border around details */
    }

    .btn-danger {
        background-color: #e60000; /* Bright red button */
        border-color: #e60000;
    }

    .btn-danger:hover {
        background-color: #cc0000; /* Darker red on hover */
        border-color: #cc0000;
    }

    hr {
        border: 1px solid #dddddd;
    }

    .no-bookings {
        color: #999999;
        font-size: 18px;
    }
</style>

<div class="container-fluid manage-bookings-container">
    <h2 class="text-center">Manage Your Bookings</h2>

 
    <div class="current-bookings">
        <h3>Current Bookings</h3>
        @forelse ($currentBookings as $booking)
            <div class="booking-details">
                <div class="row">
                    <div class="col-md-8">
                        <strong>Car:</strong> {{ $booking->car->name }} <br>
                        <strong>From:</strong> {{ $booking->start_date }} <br>
                        <strong>To:</strong> {{ $booking->end_date }} <br>
                        <strong>Status:</strong> {{ ucfirst($booking->status) }} <br>
                    </div>
                    <div class="col-md-4 text-end">
                        @if($booking->start_date > now() && $booking->status != 'cancelled')
                        
                            <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Cancel Booking</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
        @empty
            <p class="no-bookings">No current bookings.</p>
        @endforelse
    </div>

  
    <div class="past-bookings">
        <h3>Past Bookings</h3>
        @forelse ($pastBookings as $booking)
            <div class="booking-details">
                <div class="row">
                    <div class="col-md-8">
                        <strong>Car:</strong> {{ $booking->car->name }} <br>
                        <strong>From:</strong> {{ $booking->start_date }} <br>
                        <strong>To:</strong> {{ $booking->end_date }} <br>
                        <strong>Status:</strong> {{ ucfirst($booking->status) }} <br>
                    </div>
                </div>
            </div>
            <hr>
        @empty
            <p class="no-bookings">No past bookings.</p>
        @endforelse
    </div>
</div>
@endsection
