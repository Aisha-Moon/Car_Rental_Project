@extends('admin.layouts.app1')

@section('content')
    <div class="pagetitle">
        <h1>{{ $header_title }}</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customer Details</h5>
                        <p>Name: {{ $customer->name }}</p>
                        <p>Email: {{ $customer->email }}</p>
                        <p>Phone: {{ $customer->phone_number }}</p>
                        <p>Address: {{ $customer->address }}</p>

                        <h5 class="mt-4">Rental History</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Car</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customer->rentals as $rental)
                                    <tr>
                                        <td>{{ $rental->car->name }}</td>
                                        <td>{{ $rental->start_date }}</td>
                                        <td>{{ $rental->end_date }}</td>
                                        <td>{{ ucfirst($rental->status) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
