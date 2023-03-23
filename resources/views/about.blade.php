<!DOCTYPE html>
<html>

<head>
    <title>Hotel Booking Website - About Us</title>
    <!-- links section -->
    @include('links')


    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <style>
        :root {
            --teal: #F7D1C9;
            --teal_hover: #E9967A;
        }

        .box {
            border-top-color: var(--teal) !important;
        }
    </style>

</head>

<body>

    <!-- navbar section -->
    @include('header')

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">ABOUT US</h2>

        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3">Lorem Ipsum doler sit</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="https://static-blog.eurecia.com/sites/default/files/styles/article_920x513/public/manager-qualites-6.png.jpg?itok=4h934Olz" class="w-100">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="https://as2.ftcdn.net/v2/jpg/02/72/34/03/1000_F_272340374_WLlKdquYXd4Stwjg1DsMHaM4whSSqqeC.jpg" width="70px">
                    <h4 class="mt-3">50+ ROOMS</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="https://img.freepik.com/premium-vector/customer-service-icon-vector-full-customer-care-service-hand-with-persons-vector-illustration_399089-2810.jpg?w=2000" width="70px">
                    <h4 class="mt-3">100+ CUSTOMERS</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVi4JE55IiKG_5woBQTP8DAPvIZSdvf-gkeQ&usqp=CAU" width="70px">
                    <h4 class="mt-3">200+ STAFFS</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="https://static.thenounproject.com/png/1328979-200.png" width="70px">
                    <h4 class="mt-3">150+ REVIEWS</h4>
                </div>
            </div>



        </div>
    </div>

    <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="https://www.finance-investissement.com/wp-content/uploads/sites/2/2019/03/kantver_123rf_54161188_custom.jpg" class="w-100">
                    <h5 class="mt-2">Name</h5>
                </div>

                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="https://thumbs.dreamstime.com/b/belle-femme-de-sourire-d-affaires-travaillant-%C3%A0-son-bureau-avec-des-documents-89749576.jpg" class="w-100">
                    <h5 class="mt-2"> Name</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="https://media.istockphoto.com/id/1163294201/fr/photo/femme-daffaires-confiante-de-sourire-posant-avec-des-bras-pli%C3%A9s.jpg?s=612x612&w=0&k=20&c=mS7gnRXKrl6dRhJx3g4qwMr9UVcffa5vp5lCsnF0YKc=" class="w-100">
                    <h5 class="mt-2"> Name</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/about.jpg" class="w-100">
                    <h5 class="mt-2"> Name</h5>
                </div>

                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="https://us.123rf.com/450wm/mangostar/mangostar1910/mangostar191002214/133031171-professionnel-s%C3%A9rieux-et-r%C3%A9ussi-qui-pose-en-studio-jeune-femme-d-affaires-afro-am%C3%A9ricaine-avec-les.jpg?ver=6" class="w-100">
                    <h5 class="mt-2"> Name</h5>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- Footer Section -->
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 40,
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </script>
</body>

</html>