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

      /* Create two unequal columns that floats next to each other */
       
         
         
         /* Add a card effect for articles */
         .card {
         background-color: white;
         padding: 20px;
         margin-top: 20px;
         }
         
         .avatar {
         vertical-align: middle;
         width: 50px;
         height: 50px;
         border-radius: 50%;
         }
         .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }
         /* End */
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
                    <a href="{{route('roomsWelcome')}}" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="{{ route('roomsFront')}}" class="text-secondary text-decoration-none">ROOMS</a>
                </div>

            </div>

            <div class="col-lg-7 col-md-12 px-4 ">
                <div id="roomCarousel" class="carousel slide carousel-fade">
                    <div class="carousel-inner">
                        <!-- get images foreach-->
                        @foreach($room->chambreimages as $image)
                        <div class="carousel-item active">
                            <img src="{{asset('assets/upload/rooms/'. $image->picture) }}" class="d-block w-90 rounded"
                                alt="...">
                        </div>
                        @endforeach
                        
                        <!-- end foreach -->

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 px-4 ">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <h6 class="mb-4">{{$room->priceR}} MAD per night </h6>
                        <div class="Facilities mb-3">
                            <h6 class="mb-1">Facilities</h6>
                            @foreach ($room->facilities as $facility)
                            <span class="badge rounded-pill bg-light text-dark text-wrap me-1 mb-1">
                                {{ $facility->name }}
                            </span>
                            @endforeach

                        </div>
                        <div class="guests mb-3">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap mb-2">
                           {{ $room->numberBedOriginal }}  Members
                            </span>

                        </div>
                        <div class="card mb-4 border-0 ">

                            <h5 class="mb-2">Description</h5>
                            <p>{{$room->descriptionR}}</p>

                        </div>
                        <a href="{{route('confirmBooking',[$room->id])}}"
                            class="btn  w-100 text-white custom-bg shadow-none my-4 mb-1">Book Now</a>


                    </div>
                </div>
            </div>

            <div class="col-12 mt-4 px-4">
                <div class="card mb-4 border-0 ">

                    <h5 class="mb-2">Description</h5>
                    <p>{{$room->descriptionR}}</p>

                </div>
            </div>

            <div class="col-12 px-4">
                <h5 class="mb-3">Reviews & Ratings</h5>
                <div>
                <!-- reviews test -->
                <div class="row">
         
            <div class="card">
               
               <!-- Display review section start -->
               <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
                  <div>
                     <div class="row mt-5">
                        <h4>Comment Section :</h4>
                        <div class="col-sm-12 mt-5">
                            
                           @foreach($room->ReviewData as $review)
                           <div class=" review-content">
                              <!-- <img src="https://www.w3schools.com/howto/img_avatar.png" class="avatar "> -->
                              <span class="font-weight-bold ml-2">{{$review->name}}</span>
                              <p class="mt-1">
                                 @for($i=1; $i<=$review->star_rating; $i++) 
                                 <span><i class="bi bi-star text-warning"></i></span>
                                 @endfor
                                 <span class="font ml-2">{{$review->email}}</span>
                              </p>
                              <p class="description ">
                                 {{$review->comments}}
                              </p>
                           </div>
                           <hr>
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Review store Section -->
               <div class="container">
                  <div class="row">
                     <div class="col-sm-10 mt-4 ">
                        <form class="py-2 px-4" action="{{route('review.store')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                           @csrf
                           <input type="hidden" name="chambre_id" value="{{$room->id}}">
                           <div class="row justify-content-end mb-1">
                              <div class="col-sm-8 float-right">
                                 @if(Session::has('flash_msg_success'))
                                 <div class="alert alert-success alert-dismissible p-2">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Success!</strong> {!! session('flash_msg_success')!!}.
                                 </div>
                                 @endif
                              </div>
                           </div>
                           <p class="font-weight-bold ">Review</p>
                           <div class="form-group row">
                              <div class=" col-sm-6">
                                 <input class="form-control" type="text" name="name" placeholder="Name" maxlength="40" required/>
                              </div>
                              <div class="col-sm-6">
                                 <input class="form-control" type="email" name="email" placeholder="Email" maxlength="80" required/>
                              </div>
                           </div>
                           <div class="form-group row mt-3">
                              <div class="col-sm-6">
                                 <input class="form-control" type="text" name="phone" placeholder="Phone" maxlength="40" required/>
                              </div>
                              <div class="col-sm-6">
                                 <div class="rate">
                                    <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" class="rate" name="rating" value="2">
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                    <label for="star1" title="text">1 star</label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row mt-4">
                              <div class="col-sm-12 ">
                                 <textarea class="form-control" name="comment" rows="6 " placeholder="Comment" maxlength="200"></textarea>
                              </div>
                           </div>
                           <div class="mt-3 ">
                              <button class="btn btn-sm py-2 px-3 btn-success">Submit
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         
         
      </div>
      <!-- reviews fin -->
                </div>

            </div>


        </div>
    </div>



    <!-- Footer Section -->
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>