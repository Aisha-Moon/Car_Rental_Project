
@extends('admin.layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Car List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Cars</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('layouts._message') <!-- Include message display for success/error -->

                <div class="card">
                    <div class="card-body">
                         <div class="d-flex justify-content-between align-items-center mb-3">
                              <h5 class="card-title">Car List</h5>
                              <a href="{{ url('admin/car/add') }}" class="btn btn-primary">Add New Car</a>
                          </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Car Name</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>Car Type</th>
                                    <th>Daily Rent Price</th>
                                    <th>Availability Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($cars as $car)
                                    <tr>
                                        <td>{{ $car->id }}</td>
                                        <td>{{ $car->name }}</td>
                                        <td>{{ $car->brand }}</td>
                                        <td>{{ $car->model }}</td>
                                        <td>{{ $car->year }}</td>
                                        <td>{{ $car->car_type }}</td>
                                        <td>${{ number_format($car->daily_rent_price, 2) }}</td>
                                        <td>{{ $car->availability == 'available' ? 'Available' : 'Not Available' }}</td>
                                        <td>
                                            <a href="{{ url('admin/car/edit/'.$car->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                            <a onclick="return confirm('Are you sure you want to delete this car?')" href="{{ url('admin/car/delete/'.$car->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" style="text-align: center; color: red;">No Cars Found</td>
                                    </tr>
                                @endforelse --}}
                            </tbody>
                        </table>

                        {{-- {{ $cars->links() }} <!-- Pagination links --> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
