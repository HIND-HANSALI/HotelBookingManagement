<!DOCTYPE html>
<html>

<head>
    <title>Hotel Booking Website-Rooms</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- links section -->
    @include('links')


    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <style>
        :root {
            --teal: #F7D1C9;
            --teal_hover: #E9967A;
        }

        .custom-bg {
            background-color: var(--teal_hover);
            border: 1px solid var(--teal_hover);
        }

        .h-line {
            width: 150px;
            margin: 0 auto;
            height: 1.7px;
        }
    </style>

</head>

<body>

    <!-- navbar section -->
    @include('header')

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>

        <div class="h-line bg-dark"></div>

    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-0">

                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                                <label class="form-label">Check-in</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label">Check-in</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label">Members</label>
                                <input type="number" min="1" id="guests" oninput="guests_filter()" class=" form-control shadow-none">
                                <div class=" mb-lg-3 mt-4">
                                    <button type="submit" class="w-100 btn text-dark shadow-none custom-bg">Rechercher</button>
                                </div>
                            </div>
                            
                            <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="d-flex align-items-center justify-content-between mb-5" style="font-size: 18px;">
                                <span>FACILITIES</span>
                                
                                <button id="facilities_btn" onclick="facilities_clear()" class="btn shado-none btn-sm text-secondary d-none">Reset</button>
                            </h5>
                            @foreach ($rooms as $room)
                            @foreach ($room->facilities as $facilitie)
                                <div class="mb-2">
                                    <input type="checkbox" onclick="fetch_rooms()" name="facilities" value="{{ $facilitie->id}}" class="form-check-input shadow-none me-1" id="{{ $facilitie->id}}">
                                    <label class="form-check-label" for="{{ $facilitie->id}}">{{ $facilitie->name }}</label>
                                </div>
                            @endforeach  
                            @endforeach  
                                <!-- <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f2">TV</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f3">AC</label>
                                </div> -->
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="d-flex align-items-center justify-content-between mb-5" style="font-size: 18px;">
                                <span>GUESTS</span>
                                <button id="guests-button" onclick="guests_clear()" class="btn shado-none btn-sm text-secondary d-none">Reset</button>
                            </h5>

                                <div class="d-flex">
                                    <div class="me-2">
                                        <label class="form-label">Members</label>
                                        <input type="number" min="1" id="guests" oninput="guests_filter()" class="form-control shadow-none">
                                    </div>
                                    <!-- <div>
                                        <label class="form-label">Children</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
          

            <div class="col-lg-9 col-md-12 px-4">

            <!-- <div id="matching-rooms"> -->
                                <!-- Content  updated here -->
                            <!-- </div>        -->
                 <section id="matching-rooms">

                @foreach ($rooms as $room)
               

                <div class="card mb-4 border-0 shadow" >
                    <div class="row g-0 p-3 align-items-center">
                            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                               
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                
                                            <div class="carousel-inner">
                                            @foreach($room->chambreimages as $image)
                                            <div class="carousel-item active">
                                                <img src="{{asset('assets/upload/rooms/'. $image->picture) }}" class="d-block w-100" alt="...">
                                            </div>
                                            @endforeach
                                        
                                            </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                            </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">

                                <div class="d-flex align-items-center mb-2">
                                    <h5 class="mb-1 me-2">{{$room->nameR}}</h5>
                                    <div>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </div>

                                </div>

                                <div class="Facilities mb-3">
                                    <h6 class="mb-1">Facilities</h6>
                                    @foreach ($room->facilities as $facility)
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    {{ $facility->name }}
                                    </span>
                                    @endforeach
                                    <!-- <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Television
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        AC
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Room Heater
                                    </span> -->
                                </div>
                                <div class="guests">
                                    <h6 class="mb-1">Guests</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        {{$room->numberBed}} Adults
                                    </span>

                                </div>
                        </div>
                        <div class="col-md-2 ">
                            <a href="#!" class="text-dark ms-auto d-flex justify-content-end">
                                <i class="bi bi-heart"></i>
                            </a>

                            <h6 class="mb-4 text-center">{{$room->priceR}}  MAD per night </h6>
                            <div class="d-flex justify-content-lg-between">
                                <h6 class="text-striked text-muted mr-2">100 MAD</h6>
                                <h6 class="text-success">32% off</h6>
                            </div>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                            <a href="{{ route('roomss.show',$room->id ) }}" class="btn btn-sm w-100 btn-outline-dark shadow-none">Check details</a>
                        </div>
                   
                    </div>
                </div> 
                @endforeach
            </section>
                    <!-- print_r($_GET['facility_list']); -->
                <!-- <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/rooms/1.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Room Name</h5>

                            <div class="Facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Television
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    AC
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Room Heater
                                </span>
                            </div>
                            <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    5 Adults
                                </span>

                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <h6 class="mb-4">50 MAD per night </h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>
                        </div>
                    </div>
                </div> -->
            </div>


        </div>
    </div>



    <!-- Footer Section -->
    @include('footer')
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>