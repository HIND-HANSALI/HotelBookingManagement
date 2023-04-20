<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/adventure_logo_hostel.png">
    <title>Together Hostel</title>
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">

    <!-- links section -->
    @include('links')

    <!-- Styles -->
    <style>
       .custom-bg {
            background-color: var(--teal_hover);
            border: 1px solid var(--teal_hover);
        }
    </style>
</head>

<body class="antialiased">
   
    <!-- navbar section -->
    @include('header')
    <!-- Swiper images-->
    <div class="container-fluid banner-wrapper px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(https://images5.alphacoders.com/650/650970.jpg);">

                    <div class="slide-caption text-center">
                        <div>
                            <h1 class="fw-bold text-white">Welcome to Our Hostel</h1>
                            <p class="fs-4">We are excited to have you here and provide you with a comfortable and enjoyable stay.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image:url(https://images.alphacoders.com/439/439191.jpg);">

                    <div class="slide-caption text-center">
                        <div>
                            <h1 class="fw-bold text-white">Welcome to Our Hostel</h1>
                            <p class="fs-4">We are excited to have you here and provide you with a comfortable and enjoyable stay.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image:url(https://images7.alphacoders.com/362/362619.jpg);">

                    <div class="slide-caption text-center">
                        <div>
                            <h1 class="fw-bold text-white">Welcome to Our Hostel</h1>
                            <p class="fs-4">We are excited to have you here and provide you with a comfortable and enjoyable stay.</p>
                        </div>
                    </div>
                </div>

                <!-- <div class="swiper-slide">
          <img src="images/slider/4.png" class="w-100 d-block" />
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
                <form method="POST" action="{{route('checkAvailability')}}">
                    @csrf
                    <div class="row align-items-end">
                        <div class="col-lg-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" name="checkIn" class="form-control shadow-none @error('checkIn') is-invalid  @enderror" value="{{old('checkIn')}}">
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-Out</label>
                            <input type="date" name="checkOut" class="form-control shadow-none @error('checkOut') is-invalid  @enderror" value="{{old('checkOut')}}">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Members</label>
                            <input class="form-control @error('numberPerson') is-invalid  @enderror" type="number" name="numberPerson" id="numberPerson" value="{{old('numberPerson')}}" placeholder="" step="1" required>
                       
                        </div>
                       
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn shadow-none text-dark custom-bg">Submit</button>
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
            <!-- Loop over the rooms and generate a card for each one -->
            @foreach ($rooms as $room)
            <div class="col-lg-4 col-md-6 my-3">
            
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($room->chambreimages as $key => $image)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{asset('assets/upload/rooms/'. $image->picture) }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
            </div>
            </div>

                    <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-2WXoZxYxKA2lL4WKjC3dxD3Ybb_Y67yb5g&usqp=CAU" class="card-img-top" alt="..."> -->

                    <div class="card-body">
                        <h5 class="card-title">{{$room->nameR}}</h5>
                        <h6 class="mb-4">{{$room->priceR}}MAD Per Night </h6>

                        <div class="Facilities mb-4">
                            <h6 class="mb-1">Facilities</h6>
                            @foreach ($room->facilities as $facility)
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                            {{ $facility->name }}
                            </span>
                            @endforeach
                            
                        </div>

                        <div class="guests mb-2">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                            {{ $room->numberBedOriginal }}  Members
                            </span>

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
                            <a href="{{ route('roomss.show',$room->id ) }}" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                            <a href="{{route('confirmBooking',[$room->id])}}" class="btn btn-sm text-dark custom-bg shadow-none ms-2">Book Now</a>
                        </div>
                    </div>
                </div>
             
            </div>
             @endforeach 

        

            <div class="col-lg-12 text-center mt-5">
                <a href="{{ route('roomsFront')}}" class="btn btn-sm btn-outline-dark rounded-2 fw-bold shadow-none ">More Rooms</a>
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
                        <img src="assets/upload/activities/climbmon" class="img-fluid">
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
                        <img src="https://images4.alphacoders.com/199/199766.jpg" class="img-fluid rounded-2">
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
                        <img src="https://i.pinimg.com/564x/d4/fc/fa/d4fcfaf245187b50204f73a5f314d66c.jpg"  class="img-fluid">
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
                    <a href="{{ route('activitiesFront')}}" class="btn btn-sm btn-outline-dark rounded-2 fw-bold shadow-none">More Activities</a>
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
    <!-- Footer Section -->
    @include('footer')
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