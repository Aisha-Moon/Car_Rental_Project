@extends('admin.layouts.app1')

@section('content')
    <div class="pagetitle">
        <h1>Add Rental</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.rental.index') }}">Rentals</a></li>
                <li class="breadcrumb-item active">Add Rental</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Rental</h5>
                        <form action="{{ route('admin.rental.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="user_id" class="col-sm-2 col-form-label">Customer Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select id="user_id" name="user_id" class="form-control" required>
                                        <option value="">Select Customer</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span style="color:red;">{{ $errors->first('user_id') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="car_id" class="col-sm-2 col-form-label">Car Details <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select id="car_id" name="car_id" class="form-control" required>
                                        <option value="">Select Car</option>
                                        @foreach ($cars as $car)
                                            <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>
                                                {{ $car->name }} ({{ $car->brand }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <span style="color:red;">{{ $errors->first('car_id') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="start_date" class="col-sm-2 col-form-label">Start Date <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="start_date" name="start_date" class="form-control" required value="{{ old('start_date') }}">
                                    <span style="color:red;">{{ $errors->first('start_date') }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="end_date" class="col-sm-2 col-form-label">End Date <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="end_date" name="end_date" class="form-control" required value="{{ old('end_date') }}">
                                    <span style="color:red;">{{ $errors->first('end_date') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="total_cost" class="col-sm-2 col-form-label">Total Cost <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" id="total_cost" name="total_cost" class="form-control" required value="{{ old('total_cost') }}" step="0.01">
                                    <span style="color:red;">{{ $errors->first('total_cost') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                              <label for="status" class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                              <div class="col-sm-10">
                                  <select id="status" name="status" class="form-control" required>
                                      <option value="">Select Status</option>
                                      <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                      <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                      <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                      <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Canceled</option>
                                  </select>
                                  <span style="color:red;">{{ $errors->first('status') }}</span>
                              </div>
                          </div>

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
{{-- <script>
    $(function() {   
      
       var unavailableDates = @json($unavailableDates);
      function disableDates (date) {

            var today = new Date();
            today.setHours(0, 0, 0, 0);
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);

            if (date < today || unavailableDates.indexOf(string) != -1){
               return [false]
            }
            else {
               return [true]
            }
        }
        $("#start_date, #end_date").datepicker({
            dateFormat: 'yy-mm-dd',
            beforeShowDay: disableDates
        });
    });
</script> --}}
