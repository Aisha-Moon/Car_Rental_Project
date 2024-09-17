@extends('admin.layouts.app1')

@section('content')
    <div class="pagetitle">
        <h1>Update Cars</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active">Cars</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Car</h5>
                        <!-- Update form -->
                        <form action="{{ url('admin/car/edit', $getCar->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') 
                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Car Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" required value="{{ old('name', $getCar->name) }}">
                                    <span style="color:red;">{{ $errors->first('name') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Brand <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="brand" class="form-control" required value="{{ old('brand', $getCar->brand) }}">
                                    <span style="color:red;">{{ $errors->first('brand') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Model <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="model" class="form-control" required value="{{ old('model', $getCar->model) }}">
                                    <span style="color:red;">{{ $errors->first('model') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Year of Manufacture <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="year" class="form-control" required value="{{ old('year', $getCar->year) }}" min="1900" max="{{ date('Y') }}">
                                    <span style="color:red;">{{ $errors->first('year') }}</span>
                                </div>
                            </div>

                            <!-- Car Type -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Car Type <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="car_type" class="form-control" required>
                                        <option value="">Select Car Type</option>
                                        <option value="SUV" {{ old('car_type', $getCar->car_type) == 'SUV' ? 'selected' : '' }}>SUV</option>
                                        <option value="Sedan" {{ old('car_type', $getCar->car_type) == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                                    </select>
                                    <span style="color:red;">{{ $errors->first('car_type') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Daily Rent Price <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="daily_rent_price" class="form-control" required value="{{ old('daily_rent_price', $getCar->daily_rent_price) }}" min="0" step="0.01">
                                    <span style="color:red;">{{ $errors->first('daily_rent_price') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Availability Status <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="availability" class="form-control" required>
                                        <option value="1" {{ old('availability', $getCar->availability) == 1 ? 'selected' : '' }}>Available</option>
                                        <option value="0" {{ old('availability', $getCar->availability) == 0 ? 'selected' : '' }}>Not Available</option>
                                    </select>
                                    <span style="color:red;">{{ $errors->first('availability') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Car Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="car_image" class="form-control">
                                    <span style="color:red;">{{ $errors->first('image') }}</span>
                                    @if($getCar->image)
                                        <img src="{{ asset('images/cars/'.$getCar->image) }}" alt="{{ $getCar->name }}" width="100">
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
