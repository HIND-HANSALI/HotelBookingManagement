<!DOCTYPE html>
<html>
<head>
	<title>Hotel Booking Website-Contuct Us</title>
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
</style>

</head>
<body>

 <!-- navbar section -->
 @include('header')

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">CONTACT US</h2>

  <div class="h-line bg-dark"></div>
  <p class="text-center mt-3">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat.
  </p>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4">
       
          <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3433.0450626310585!2d-6.463368571340776!3d32.10828139295283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda4817b2a443c81%3A0x5c5787cfb96eef7e!2sBin%20El-Ouidane!5e0!3m2!1sfr!2sma!4v1679409307067!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <h5>Address</h5>
        <a href="https://www.google.com/maps/place/Bin+El-Ouidane/@32.1082345,-6.464148,17.07z/data=!4m6!3m5!1s0xda4817b2a443c81:0x5c5787cfb96eef7e!8m2!3d32.1085649!4d-6.4616658!16s%2Fm%2F0k0q97q" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
          <i class="bi bi-geo-alt-fill"></i> 22202,MAROC, Bin el Ouidane.
        </a>
        <h5 class="mt-4">Call us</h5>
        <a href="tel: +212 656457890" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +212 656457890</a>
        <br>
        <a href="tel: +212 656457890" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +212 656457890</a>
        <h5 class="mt-4">Email</h5>
        <a href="mailto: dineshslweb@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-envelope-fill"></i> togetherhotel@gmail.com</a>

        <h5 class="mt-4">Follow us</h5>
        <a href="#" class="d-inline-block text-dark fs-5 me-2">
            <i class="bi bi-twitter me-1"></i>
        </a>
        
        <a href="#" class="d-inline-block text-dark fs-5 me-2">
            <i class="bi bi-facebook me-1"></i>
        </a>
        
        <a href="#" class="d-inline-block text-dark fs-5">
          <i class="bi bi-instagram me-1"></i>
          
        </a>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4">
        <form>
          <h5>Send a message</h5>
          <div class="mb-3">
          <label class="form-label" style="font-weight: 500;">Name</label>
          <input type="text" class="form-control shadow-none">
          </div>
          <div class="mb-3">
          <label class="form-label" style="font-weight: 500;">Email</label>
          <input type="email" class="form-control shadow-none">
          </div>
          <div class="mb-3">
          <label class="form-label" style="font-weight: 500;">Subject</label>
          <input type="text" class="form-control shadow-none">
          </div>
          <div class="mb-3">
          <label class="form-label" style="font-weight: 500;">Message</label>
          <textarea class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
          </div>
          <button type="submit" class="btn text-white custom-bg mt-3">Send</button>
        </form>
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