<!DOCTYPE html>
<html>

<head>
    <title>Hotel Booking Website-Rooms - Historique Bookings</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- links section -->
    @include('links')
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->


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
                <h2 class="fw-bold h-font ">Historique Bookings</h2>
                <div style="font-size:14px;">
                    <a href="{{route('roomsWelcome')}}" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="{{ route('roomsFront')}}" class="text-secondary text-decoration-none">ROOMS</a>
                    <span class="text-secondary"> > </span>
                    <a href="index.php" class="text-secondary text-decoration-none">Historique Bookings</a>
                </div>




                <!-- <div class="col-md-4 mb-4 px-4">
                    <div class="bg-white p-3 rounded shadow-sm border card ">
                        <h5 class="fw-bold">name room</h5>
                        <p class="fs-6">Description goes here</p>
                        <p>
                            <b>checkin :</b>here <br>
                            <b>checkout :</b>here
                        </p>
                        <p>
                            <b>Amount :</b>total payment <br>
                            <b>Date :</b>here
                        </p>
                        <p>
                            <span class="badge bg-warning"> pending</span>
                        </p>
                        <button type="button" class="btn bg-danger  mr-2"><i class="bi bi-x-circle"></i> Cancel</button>
                    </div>
                </div> -->





                @foreach ($bookings as $booking)
                <div class="container  mt-5">
                    <form action="" method="">
                       




                        <div class="card mt-3">
                            <div class="row no-gutters">
                                <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">

                                    <h5 class="">Amount</h5>
                                    <h1 class="fw-bold">{{$booking->reservationdetails->total_payement}} MAD</h1>
                                    <h5 class="fs-6"><b>Guests </b> {{$booking->reservationdetails->numberPerson}}</h5>

                                </div>
                                <div class="col-md-4 ">
                                    <div class="card-body text-center">
                                        <h5 class="card-title fw-bold">{{$booking->chambre->nameR }}</h5>
                                        <p class="card-text fs-6"><b>From</b> {{ $booking->checkIn}}<b> To
                                            </b>{{ $booking->checkOut}}</p>

                                        @if($booking->statutBooking == 'pending')
                                        <span name="statutBooking" class="badge text-bg-warning"
                                            value="pending">Pending</span>
                                        @elseif($booking->statutBooking == 'booked')
                                        <span name="statutBooking" class="badge text-bg-success"
                                            value="booked">Booked</span>
                                        @elseif($booking->statutBooking == 'canceled')
                                        <span name="statutBooking" class="badge text-bg-danger"
                                            value="canceled">Canceled</span>
                                        @elseif($booking->statutBooking == 'completed')
                                        <span name="statutBooking" class="badge text-bg-info"
                                            value="completed">Completed</span>
                                        @endif

                                        
                                    </div>
                                </div>
                                <div
                                    class="col-md-4 card-body d-flex flex-column justify-content-center align-items-center">
      
                                    <button onclick="cancelBooking({{ $booking->id }})" class="btn btn-danger"><i class="bi bi-x-circle"></i>Cancel </button>
                                    <!-- <button     class="btn btn-sm btn-danger mr-2 shadow-none"><i class="bi bi-x-circle"></i>Cancel </button> -->
                                </div>
                            </div>
                        </div>
                        @endforeach






                    </form>

                </div>
            </div>
        </div>
</div>

            <!-- Footer Section -->
            @include('footer')
            <script src="assets/js/main.js"></script>
            <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
            <script src="https://code.jquery.com/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

 
</body>

</html>