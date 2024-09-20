

<div class="our_room" id="cars">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Available Cars</h2>
               <p>Experience Easy and Affordable Car Rentals – Book Your Ride Today</p>
            </div>
         </div>
      </div>

    <!-- Filter Section -->
<div class="row mb-4">
   <div class="col-md-12">
      <form action="{{ url('cars/filter') }}" method="GET" class="form-inline" style="background-color: #343a40; padding: 20px; border-radius: 10px; color: white;">
         <div class="form-group mr-3">
            <label for="car_type" class="mr-2">Car Type</label>
            <select name="car_type" id="car_type" class="form-control">
               <option value="">All</option>
               @foreach($carTypes as $type)
                  <option value="{{ $type }}" {{ request('car_type') == $type ? 'selected' : '' }}>
                     {{ ucfirst($type) }}
                  </option>
               @endforeach
            </select>
         </div>

         <!-- Brand Filter -->
         <div class="form-group mr-3">
            <label for="brand" class="mr-2">Brand</label>
            <select name="brand" id="brand" class="form-control">
               <option value="">All</option>
               @foreach($brands as $brand)
                  <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                     {{ ucfirst($brand) }}
                  </option>
               @endforeach
            </select>
         </div>

         <!-- Price Filter -->
         <div class="form-group mr-3">
            <label for="price_max" class="mr-2">Max Price (per day)</label>
            <input type="number" name="price_max" id="price_max" class="form-control" value="{{ request('price_max') }}" min="0">
         </div>

         <!-- Submit Button -->
         <div class="form-group">
            <button type="submit" class="btn btn-light">Filter</button>
         </div>
      </form>
   </div>
</div>


      <!-- Car Listings Section -->
      <div class="row">
         @foreach($cars as $c)
         <div class="col-md-4 col-sm-6">
            <div id="serv_hover" class="room">
               <div class="room_img">
                  <a href="{{ url('car-details/' . $c->id) }}">
                     <figure><img src="{{ asset('images/cars/' . $c->image) }}" alt="{{ $c->name }}"/></figure>
                  </a>
               </div>
               <div class="bed_room">
                  <a href="{{ url('car-details/' . $c->id) }}">
                     <h3>{{ $c->name }}</h3>
                  </a>
                  <a href="{{ url('car-details/' . $c->id) }}" class="btn btn-dark">Click to Add Booking</a>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      
      <!-- Pagination if needed -->
      <div class="mt-4">
         {{-- {{ $cars->links() }} --}}
      </div>
   </div>
</div>


