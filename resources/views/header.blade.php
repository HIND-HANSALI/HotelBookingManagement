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
                        <a class="nav-link me-2" href="{{ route('roomsFront')}}">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route('facilitiesFront') }}">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="activities.php">Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route('contact') }}">Contact Us</a>
                    </li>


                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                </div>
            </div>
        </div>
    </nav>