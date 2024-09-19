@extends('admin.layouts.app1')

@section('content')
    <div class="pagetitle">
        <h1>Add Cars</h1>
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
                        <h5 class="card-title">Add New Car</h5>
                        <form action="{{ url('admin/car/add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Car Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                                    <span style="color:red;">{{ $errors->first('name') }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Brand <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="brand" class="form-control" required value="{{ old('brand') }}">
                                    <span style="color:red;">{{ $errors->first('brand') }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Model <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="model" class="form-control" required value="{{ old('model') }}">
                                    <span style="color:red;">{{ $errors->first('model') }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Year of Manufacture <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="year" class="form-control" required value="{{ old('year') }}" min="1900" max="{{ date('Y') }}">
                                    <span style="color:red;">{{ $errors->first('year') }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="car_type" class="col-sm-2 col-form-label">Car Type <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="car_type" id="car_type" class="form-control" required value="{{ old('car_type') }}">
                                    <span style="color:red;">{{ $errors->first('car_type') }}</span>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Daily Rent Price <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="daily_rent_price" class="form-control" required value="{{ old('daily_rent_price') }}" min="0" step="0.01">
                                    <span style="color:red;">{{ $errors->first('daily_rent_price') }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Availability Status <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="availability" class="form-control" required>
                                        <option value="1" {{ old('availability') == '1' ? 'selected' : '' }}>Available</option>
                                        <option value="0" {{ old('availability') == '0' ? 'selected' : '' }}>Not Available</option>
                                    </select>
                                    <span style="color:red;">{{ $errors->first('availability') }}</span>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Car Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" class="form-control">
                                    <span style="color:red;">{{ $errors->first('image') }}</span>
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
