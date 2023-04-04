<!DOCTYPE html>
<html>

<head>
    <title>Hotel Booking Website-Rooms -Room details</title>
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



    <div class="container">
        <div class="row">
            <div class="col-12 my-5 px-4 mb-4">
                <h2 class="fw-bold h-font ">{{$room->nameR}}</h2>
                <div style="font-size:14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="index.php" class="text-secondary text-decoration-none">ROOMS</a>
                </div>

            </div>

            <div class="col-lg-7 col-md-12 px-4 ">
                <div id="roomCarousel" class="carousel slide carousel-fade">
                    <div class="carousel-inner">
                        <!-- get images foreach-->

                        <div class="carousel-item active">
                            <img src="https://nomadsworld.com/wp-content/uploads/2018/11/nomads-brisbane-hostel-dorm.jpg" class="d-block w-100 rounded" alt="...">
                        </div>
                        <!-- end foreach -->
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100 " alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 px-4 ">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <h6 class="mb-4">50 MAD per night </h6>
                        <div class="Facilities mb-3">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap me-1 mb-1">
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
                            <span class="badge rounded-pill bg-light text-dark text-wrap mb-2">
                                5 Members
                            </span>

                        </div>
                        <a href="#" class="btn  w-100 text-white custom-bg shadow-none my-4 mb-1">Book Now</a>


                    </div>
                </div>
            </div>

            <div class="col-12 mt-4 px-4">
                <div class="card mb-4 border-0 ">
                    
                    <h5 class="mb-2">Description</h5>
                    <p>hiiiiiiiiiiiiiii</p>
                
                </div>
            </div>

            <div class="col-12 px-4">
                <h5 class="mb-3">Reviews & Ratings</h5>
                <div>


                </div>

            </div>


        </div>
    </div>



    <!-- Footer Section -->
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>