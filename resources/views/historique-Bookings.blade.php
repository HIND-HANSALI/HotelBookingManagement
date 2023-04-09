<!DOCTYPE html>
<html>

<head>
    <title>Hotel Booking Website-Rooms - Historique Bookings</title>
    <!-- links section -->
    @include('links')
    <script src="https://cdn.tailwindcss.com"></script>


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
        /* #pay_now{
            display: none;
        } */
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
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="index.php" class="text-secondary text-decoration-none">ROOMS</a>
                    <span class="text-secondary"> > </span>
                    <a href="index.php" class="text-secondary text-decoration-none">Historique Bookings</a>
                </div>
                <div class="col-12 px-4">
                <div class="fw-bold alert alert-success alert-dismissible d-flex align-items-center fade show">
                    <i class="bi-check-circle-fill"></i>
                    <strong class="mx-2">Payment! Booking successfull.</strong> 
                    
                    <a href="">Go to Bookings </a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                </div>


                <div class="col-md-4 mb-4 px-4">
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
                            <span class="badge"> pending</span>
                        </p>
                        <button type="button" class="btn bg-danger  mr-2"><i class="bi bi-x-circle"></i> Cancel</button>
                    </div>
                </div>


                
                <!-- <div class="col-12 px-4 py-4">
                <div class="row border bg-white shadow-sm rounded">
                    <div class="col-md-4">
                    <h5 class="fw-bold">Time</h5>
                    <h2 class="fw-bold">Rs.2.1 Lakh</h2>
                    <h5 class="fs-6">Per Month</h5>
                    </div>
                    <div class="col-md-4">
                    <div class="card-body">
                    <h2 class="fw-bold">Name Room</h2>
                    <p class="fs-6">Description goes here</p>
                    <button type="button" class="btn btn-danger btn-block fw-bold">Get Started</button>
                    </div>
                    </div>
                    <div class="col-md-4 card-body ">
                    <button type="button" class="btn btn-danger btn-block fw-bold">Get Started</button>
                    </div>
                </div>
                </div> -->


    <div class="container bcontent">
                
                <div class="card" >
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="fw-bold">Time</h5>
                            <h1 class="fw-bold">Price 225</h1>
                            <h5 class="fs-6">Per Month</h5>
                                <!-- <img class="card-img" src="hii" alt="Suresh Dasari Card"> -->
                        </div>
                        <div class="col-md-4 ">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">Name Room</h5>
                                <p class="card-text fs-6">Suresh Dasari is a founder and technical lead developer in tutlane.</p>
                                <a href="#" class="btn btn-primary">View Profile</a>
                            </div>
                        </div>
                        <div class="col-md-4 card-body d-flex flex-column justify-content-center align-items-center">
                            <!-- <button type="button" class="btn btn-danger btn-block fw-bold">Get Started</button> -->
                            <a href="#" class="btn btn-danger">Cancel Booking</a>
                        </div>
                    </div>
                </div>
    </div>

     



             
        
    </div>



    <!-- Footer Section -->
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

        
</body>

</html>