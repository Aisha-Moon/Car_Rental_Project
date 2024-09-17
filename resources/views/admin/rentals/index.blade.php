@extends('admin.layouts.app1')

@section('content')
    <div class="pagetitle">
        <h1>Rentals List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.rental.index') }}">Rentals</a></li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
               @include('layouts._message')

                <div class="card">
                    <div class="card-body">
                         <div class="d-flex justify-content-between align-items-center mb-3">
                              <h5 class="card-title">Rental List</h5>
                              <a href="{{ route('admin.rental.create') }}" class="btn btn-primary mb-3">Add Rental</a>
                         </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Rental ID</th>
                                    <th>Customer Name</th>
                                    <th>Car Details</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Cost</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                    <th>Update Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rentals as $rental)
                                    <tr>
                                        <td>{{ $rental->id }}</td>
                                        <td>{{ $rental->user->name }}</td>
                                        <td>{{ $rental->car->name }} ({{ $rental->car->brand }})</td>
                                        <td>{{ $rental->start_date->format('Y-m-d') }}</td>
                                        <td>{{ $rental->end_date->format('Y-m-d') }}</td>
                                        <td>${{ $rental->total_cost }}</td>
                                        <td>
                                             @if ($rental->status == 'ongoing')
                                                 <span class="badge bg-warning text-dark">Ongoing</span>
                                             @elseif ($rental->status == 'completed')
                                                 <span class="badge bg-success">Completed</span>
                                             @elseif ($rental->status == 'cancelled')
                                                 <span class="badge bg-danger">Canceled</span>
                                             @endif
                                         </td>
                                          <td style="width:200px">
                                             <a href="{{ route('admin.rental.edit', $rental) }}" class="btn btn-success d-inline"><i class="bi bi-pencil-square"></i></a>
                                             <a onclick="return confirm('Are you sure  want to delete this Data?')" href="{{ route('admin.rental.destroy', $rental) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>

                                             {{-- <form action="{{ route('admin.rental.destroy', $rental) }}" method="POST" class="d-inline" onsubmit="return confirmDeletion();">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                              </form> --}}
                                              
                                              <script>
                                                  function confirmDeletion() {
                                                      return confirm("Are you sure you want to delete this rental?");
                                                  }
                                              </script>
                                              
                                         </td>
                                         
                                        <td style="width:300px">
                                             <a href="{{ url('rental/ongoing', $rental->id) }}" class="btn btn-warning">Ongoing</a>
                                             <a href="{{ url('rental/completed', $rental->id) }}" class="btn btn-success">Completed</a>
                                             <a href="{{ url('rental/cancelled', $rental->id) }}" class="btn btn-danger">Cancelled</a>
                                             
                                        </td>
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
