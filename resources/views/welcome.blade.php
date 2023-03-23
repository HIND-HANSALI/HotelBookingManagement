<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,200&family=Poppins:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Nunito:ital,wght@1,200&family=Poppins:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500&display=swap" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Styles -->
    <style>
        * {
            /* font-family: 'Poppins', sans-serif; */
            font-family: 'Roboto', sans-serif;

        }

        .h-font {
            font-family: 'Merienda' cursive;
        }

        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35px;
            }

        }

        .activities_wrapper .activitie-items {
            position: relative;
            overflow: hidden;
        }

        .activities_wrapper .activitie-items img {
            width: 100%;
            -webkit-transition: all 400ms ease-in 0s;
            transition: all 400ms ease-in 0s;
        }

        .activities_wrapper .activitie-items:hover img {
            -webkit-transform: scale3d(1.05, 1.05, 1.05);
            transform: scale3d(1.05, 1.05, 1.05);
        }

        .activities_wrapper .activitie-item-wrap {
            position: absolute;
            left: 1.875rem;
            right: 1.875rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
        }

        .activities_wrapper .activitie-items .activitie-content {
            border: .125rem solid var(--bg-white);
            padding: 5rem 1.875rem;
            -webkit-transform: scale3d(1.2, 1.2, 1.2);
            transform: scale3d(1.2, 1.2, 1.2);
            transition: all 500ms ease-in 0s;
            opacity: 0;
        }

        .activities_wrapper .activitie-items:hover .activitie-content {
            border: .125rem solid white;

            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);

            opacity: 1;
        }

        .activitie-items .activitie-content {
            padding: 2rem 1.875rem;
        }

        .activitie-items .activitie-content h5 {
            font-size: 1.2rem;
        }

        .activitie-items .activitie-content p {
            font-size: 0.75rem;
        }
    </style>
</head>

<body class="antialiased">
    <!-- @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif -->
    <nav class="navbar navbar-expand-lg bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="welcome.php">Together Hotel</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="rooms.php">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="facilities.php">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="activities.php">Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="contact.php">Contact Us</a>
                    </li>


                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Swiper images-->


    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="https://img.freepik.com/premium-photo/abstract-blur-luxury-hotel-lobby-background_1339-98452.jpg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="https://png.pngtree.com/thumb_back/fh260/background/20210909/pngtree-wedding-daytime-wedding-hall-hall-hotel-interior-empty-mirror-photography-map-image_837460.jpg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="https://png.pngtree.com/thumb_back/fh260/background/20220311/pngtree-bedroom-guest-room-five-star-hotel-image_990205.jpg" class="w-100 d-block" />
                </div>
                <!-- <div class="swiper-slide">
          <img src="images/sectionImage/4.png" class="w-100 d-block" />
        </div>
         -->

            </div>

        </div>
    </div>

    <!-- check availability form-->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="col-lg-3">Check Availability</h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Members</label>
                            <select class="form-select shadow-none">

                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <!-- <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500;">Children</label>
                            <select class="form-select shadow-none">

                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div> -->
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-white shadow-none btn-primary">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Our Rooms -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Rooms</h2>
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">

                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-2WXoZxYxKA2lL4WKjC3dxD3Ybb_Y67yb5g&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Room Name</h5>
                        <h6 class="mb-4">50 MAD Per Night </h6>

                        <div class="Facilities mb-4">
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

                        <div class="guests mb-2">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                5
                            </span>

                        </div>

                        <div class="d-flex justify-content-end mb-2">
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                            <a href="#" class="btn btn-sm text-white btn-primary shadow-none ms-2">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <!-- <img src="images/rooms/1.jpg" class="card-img-top" alt="..."> -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-2WXoZxYxKA2lL4WKjC3dxD3Ybb_Y67yb5g&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Room Name</h5>
                        <h6 class="mb-4">50 MAD Per Night </h6>

                        <div class="Facilities mb-4">
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

                        <div class="guests mb-2">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                5
                            </span>
                            <!-- <span class="badge rounded-pill bg-light text-dark text-wrap">
			    		4 Children
    				</span> -->
                        </div>
                        <!-- <div class="rating mb-4">

    					<h6 class="mb-1">Rating</h6>
    					<span class="badge rounded-pill bg-light">
    						<i class="bi bi-star-fill text-warning"></i>
    						<i class="bi bi-star-fill text-warning"></i>
    						<i class="bi bi-star-fill text-warning"></i>
    						<i class="bi bi-star-fill text-warning"></i>
    					</span>
    				</div> -->

                        <div class="d-flex justify-content-end mb-2">
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                            <a href="#" class="btn btn-sm text-white btn-primary shadow-none ms-2">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <!-- <img src="images/rooms/1.jpg" class="card-img-top" alt="..."> -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-2WXoZxYxKA2lL4WKjC3dxD3Ybb_Y67yb5g&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Room Name</h5>
                        <h6 class="mb-4">50 MAD Per Night </h6>

                        <div class="Facilities mb-4">
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

                        <div class="guests mb-2">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                5
                            </span>
                            <!-- <span class="badge rounded-pill bg-light text-dark text-wrap">
			    		4 Children
    				</span> -->
                        </div>
                        <!-- <div class="rating mb-4">

    					<h6 class="mb-1">Rating</h6>
    					<span class="badge rounded-pill bg-light">
    						<i class="bi bi-star-fill text-warning"></i>
    						<i class="bi bi-star-fill text-warning"></i>
    						<i class="bi bi-star-fill text-warning"></i>
    						<i class="bi bi-star-fill text-warning"></i>
    					</span>
    				</div> -->
                        <div class="d-flex justify-content-end  mb-2">
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                            <a href="#" class="btn btn-sm text-white btn-primary shadow-none ms-2">Book Now<a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms</a>
            </div>
        </div>
    </div>
    <!-- Our Activities -->
    <section id="activities" class="activities_wrapper mt-5 ">
        <div class="container_fluid">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>All you need</h6>
                    <h3>Our Awesome Activites</h3>
                </div>
            </div>

            <div class="row m-0">
                <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="activitie-items">
                        <img src="https://media.sport-decouverte.com/images/disciplinecard/t1080x600/167/0/randonnee-quad-buggy.jpg?v=a3b0c" class="img-fluid">
                        <div class="activitie-item-wrap">
                            <div class="activitie-content">
                                <h5 class="text-white mb-lg-5 text-decoration-underline ">Acivity Name</h5>
                                <p class="text-white ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore sed harum deleniti cum quaerat deserunt perferendis ullam mollitia quas voluptates?</p>
                                <a class="main-btn border-white text-white mt-lg-5" href=""></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="activitie-items">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStZK49-CTTHLhMjranm1fZi2hnYN8gfc7qjJ7ZMUxuoJhXoXa1HsXvgUi3xr73vh0mRKo&usqp=CAU" class="img-fluid">
                        <div class="activitie-item-wrap">
                            <div class="activitie-content">
                                <h5 class="text-dark mb-lg-5 text-decoration-underline ">Acivity Name</h5>
                                <p class="text-dark ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore sed harum deleniti cum quaerat deserunt perferendis ullam mollitia quas voluptates?</p>
                                <a class="main-btn border-white text-white mt-lg-5" href=""></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="activitie-items">
                        <img src="" class="img-fluid">
                        <div class="activitie-item-wrap">
                            <div class="activitie-content">
                                <h5 class="text-dark mb-lg-5 text-decoration-underline ">Acivity Name</h5>
                                <p class="text-dark ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore sed harum deleniti cum quaerat deserunt perferendis ullam mollitia quas voluptates?</p>
                                <a class="main-btn border-white text-white mt-lg-5" href=""></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-12 text-center mt-5">
                    <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Activities</a>
                </div>
            </div>

        </div>
    </section>

    <!-- Reach us-->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Reach Us</h2>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3433.0450626310585!2d-6.463368571340776!3d32.10828139295283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda4817b2a443c81%3A0x5c5787cfb96eef7e!2sBin%20El-Ouidane!5e0!3m2!1sfr!2sma!4v1679409307067!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4 ">
                <div class="bg-white p-4 rounded">
                    <h5>Call us</h5>
                    <a href="tel: +212 656457890" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +212 656457890</a>
                    <br>
                    <a href="tel: +212 656457890" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +212 656457890</a>
                </div>
                <div class="bg-white p-4 rounded">
                    <h5>Follow us</h5>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-twitter me-1"></i>Twitter
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i>Facebook
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i>Instagram
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>