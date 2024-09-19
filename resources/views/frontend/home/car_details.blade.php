@extends('frontend.home.index')

@section('content')
@include('frontend.partials.header')

<div class="our_room">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>{{ $car->name }}</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div id="serv_hover" class="room">
                    <div class="room_img" style="padding: 20px;">
                        <figure>
                            <img style="height:300px;width:750px;" src="{{ asset('images/cars/' . $car->image) }}" alt="{{ $car->name }}"/>
                        </figure>
                    </div>
                    <div class="bed_room">
                        <span><strong>Brand:</strong> {{ $car->brand }}</span><br>
                        <span><strong>Car Type:</strong> {{ $car->car_type }}</span><br>
                        <span><strong>Price per Day:</strong> ${{ $car->daily_rent_price }}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h1 style="font-size: 25px;" class="fw-bold">Book This Car</h1>
                @include('layouts._message')

                <form action="{{ url('add_booking', $car->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <input type="hidden" name="total_cost" value="{{ $car->total_cost }}">
                    <div>
                        <label for="start_date">Start Date</label>
                        <input type="text" name="start_date" value="{{ old('start_date') }}" id="start_date" class="form-control">
                        <span style="color:red;">{{ $errors->first('start_date') }}</span>
                    </div>
                    <div>
                        <label for="end_date">End Date</label>
                        <input type="text" name="end_date" id="end_date" class="form-control">
                        <span style="color:red;">{{ $errors->first('end_date') }}</span>
                    </div>
                    <div style="padding: 10px;">
                        <input type="submit" class="btn btn-dark" value="Book Car">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
    $(function() {   
       var unavailableDates = @json($unavailableDates);
       
       function disableDates (date) {
            var today = new Date();
            today.setHours(0, 0, 0, 0);
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            
            if (date < today || unavailableDates.indexOf(string) != -1){
               return [false];
            } else {
               return [true];
            }
        }

        $("#start_date, #end_date").datepicker({
            dateFormat: 'yy-mm-dd',
            beforeShowDay: disableDates
        });
    });
</script>

@endsection
