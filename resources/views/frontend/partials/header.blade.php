<header>
     <!-- header inner -->
     <div class="header">
        <div class="container">
           <div class="row">
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                 <div class="full">
                    <div class="center-desk">
                       <div class="logo">
                          <a href="{{url('/')}}"><img src="{{ asset('frontend') }}/images/car.png" alt="#" /></a>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9"> 
               <nav class="navigation navbar navbar-expand-md navbar-dark">
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse" id="navbarsExample04">
                       <ul class="navbar-nav mr-auto">
                           <li class="nav-item active">
                               <a class="nav-link" href="{{ url('/') }}">Home</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="{{ url('/about') }}">About</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="{{ url('bookings') }}">Rentals</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                           </li>
           
                          
                           @if(Auth::check())
                             
                               <li class="nav-item">
                                   <a class="nav-link" href="{{ url('account') }}" style="display: flex; align-items: center;">
                                       <i class="fas fa-user" style="font-size: 20px; margin-right: 5px;"></i> Account
                                   </a>
                               </li>
                               <li class="nav-item">
                                   <a class="btn btn-danger" href="{{ url('logout') }}">Logout</a>
                               </li>
                           @else
                            
                               <li class="nav-item">
                                   <a class="btn btn-warning" href="{{ url('login') }}">Login</a>
                               </li>
                               <li class="nav-item mr-4">
                                   <a class="btn btn-secondary" href="{{ url('register') }}">Register</a>
                               </li>
                           @endif
                       </ul>
                   </div>
               </nav>
           </div>
           
           
           </div>
        </div>
     </div>
  </header>