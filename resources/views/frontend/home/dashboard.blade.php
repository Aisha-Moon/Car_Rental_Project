@extends('frontend.home.index')
@section('content')
@include('frontend.partials.header')
     
<!-- banner -->
@include('frontend.partials.banner')

<!-- end banner -->
<!-- about -->
@include('frontend.partials.about')

@include('frontend.partials.cars')


<!-- end our_room -->
<!-- gallery -->

<!-- end gallery -->

<!--  contact -->
@include('frontend.partials.contact')
<!-- end contact -->
<!--  footer -->
@include('frontend.partials.footer')
@endsection