@extends('frontend.home.index')
@section('content')

@include('frontend.partials.header')

<div class="about" id="about">
     <div class="container-fluid">
        <div class="row">
           <div class="col-md-5">
              <div class="titlepage">
                 <h2>About Us</h2>
                <p> Welcome to DriveNow, where we redefine your car rental experience. Established in 2015, we are dedicated to providing exceptional service and a diverse fleet of high-quality vehicles. Our mission is to ensure your journey is seamless, whether for business or leisure. With a focus on customer satisfaction, we strive to meet your unique needs with reliability and integrity. At DriveNow, we’re not just about rentals; we’re about creating lasting relationships with our valued customers.</p>             
                    
              </div>
           </div>
           <div class="col-md-7">
              <div class="about_img">
                 <figure><img src="{{ asset('frontend') }}/images/car2.jpeg" alt="#"/></figure>
              </div>
           </div>
        </div>
     </div>
  </div>
@include('frontend.partials.footer')

     
@endsection