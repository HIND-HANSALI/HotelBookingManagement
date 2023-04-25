<!DOCTYPE html>
<html>

<head>
    <title>Hotel Booking Website-Rooms - Booking Status</title>
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
                <h2 class="fw-bold h-font ">Payment Status</h2>
                <div style="font-size:14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="index.php" class="text-secondary text-decoration-none">ROOMS</a>
                    <span class="text-secondary"> > </span>
                    <a href="index.php" class="text-secondary text-decoration-none">STATUT</a>
                </div>
                <div class="col-12 px-4">
                <div class="fw-bold alert alert-success alert-dismissible d-flex align-items-center fade show mt-4">
                    <i class="bi-check-circle-fill"></i>
                    <strong class="mx-2">Payment! Booking successfull.</strong> 
                    
                    <a href="{{route('historique-Bookings')}}">Go to Bookings </a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
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