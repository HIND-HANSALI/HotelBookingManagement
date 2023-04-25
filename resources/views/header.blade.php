<nav class="navbar navbar-expand-lg bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('roomsWelcome')}}">
            <img src="{{asset('assets/img/adventure_logo_hostel.png')}}" style="width:5rem" alt="logo image">
        </a>
        <!-- <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="{{route('roomsWelcome')}}">Together Hotel</a> -->
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('roomsWelcome')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('roomsFront')}}">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('facilitiesFront') }}">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('activitiesFront') }}">Activities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('contacts.create') }}">Contact Us</a>
                </li>


            </ul>
            <div class="d-flex">
                @if (Route::has('login'))
                <!-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right"> -->
                @auth


                <!-- cc -->
                <div class="nav-item dropdown has-arrow me-3">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            {{ Auth::user()->name }}
                        </span>
                    </a>
                    <div class="dropdown-menu">

                    <div class="user-header d-flex align-items-center bg-light">
							<div class="avatar avatar-sm "> <img src="{{Auth::user()->profile_photo_url}}" alt="User Image" class="rounded-circle " style="width: 2rem; height: 2rem; object-fit: cover;"> </div>
							<div class="user-text">
								<h6>{{Auth::user()->name}}</h6>
								<!-- <p class="text-muted mb-0">Administrator</p> -->
							</div>
					</div>
                        <a class="dropdown-item" href="{{ route('profile.show') }}">My Profile</a>
                        <a class="dropdown-item" href="{{ route('historique-Bookings') }}">Historique Bookings</a>
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                        @if(Auth::user()->usertype == 1)
                        <a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>
                        @endif
                    </div>
                </div>

                <!-- cc -->
                <!-- <a href="{{route('dashboard')}}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> -->
                @else
                <a href="{{ route('login') }}" class="btn btn-outline-dark shadow-none me-lg-3 me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-dark shadow-none">Register</a>
                <!-- <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button> -->
                <!-- <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button> -->
            </div>

            <!-- hii -->


            <!-- hii -->


            @endauth
            @endif
        </div>
    </div>
</nav>