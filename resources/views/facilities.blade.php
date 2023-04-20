<!DOCTYPE html>
<html>

<head>
    <title>Hotel Booking Website</title>
    <!-- links section -->
    @include('links')



    
    <style>
        :root {
            --teal: #F7D1C9;
            --teal_hover: #E9967A;
        }

        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
        .h-line{
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
        <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>

        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
        Our Hostel offer a range of facilities to make guests feel comfortable during their stay and to provide a comfortable and convenient environment for guests, to enhance their experience and satisfaction, to meet their basic needs
        </p>
    </div>

    <div class="container">
        <div class="row">
        @foreach ($facilities as $facilitie)
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{asset('assets/upload/facilities/'.$facilitie-> iconF)}}" width="40px">
                        <h5 class="m-0 ms-3">{{$facilitie->name}}</h5>
                    </div>
                    <p>
                    {{$facilitie->description}}Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div>
        @endforeach
            <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="https://t4.ftcdn.net/jpg/03/51/59/77/360_F_351597767_fvCd54fUTCpqbNI6chT5AHS2BZBsf6GB.jpg" width="40px">
                        <h5 class="m-0 ms-3">TV</h5>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div> -->
            <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/114/114735.png" width="40px">
                        <h5 class="m-0 ms-3">AC</h5>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div> -->
            <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="images/facilities/Wifi.svg" width="40px">
                        <h5 class="m-0 ms-3">Room Heater</h5>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div> -->
            <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/709/709612.png" width="40px">
                        <h5 class="m-0 ms-3">Vue</h5>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div> -->
            <!-- <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="images/facilities/Wifi.svg" width="40px">
                        <h5 class="m-0 ms-3">Wifi</h5>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div> -->
        </div>
    </div>

    <!-- Footer Section -->
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>