<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- links section -->
    @include('links')

    <style>
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
    <div class="my-2 px-4">
        <h2 class="fw-bold h-font text-center">OUR ACTIVITIES</h2>

        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
        The hostel encourages interaction among guests by organizing activities such as group tours, game nights, and other events that promote socializing and meeting new people. It also provides a friendly and welcoming atmosphere where guests can feel comfortable to express themselves and make friends with people from different cultures and backgrounds.
        </p>
    </div>
    <div class="container px-4 py-5" id="custom-cards">
        <div class="row row-cols-3 row-cols-lg-3 align-items-stretch g-4 py-5">
          <div class="col">
            <div class=" card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('https://media-cdn.tripadvisor.com/media/photo-s/07/01/c2/33/widiane-suites-spa.jpg');">
              <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Kayake<br>Rafting dans la rivière </h2>
                <p class="card-text">Explorez le lac sur un kayak de surf. Insubmersible et sûr, même pour les plus inexpérimentés. Il est une merveilleuse façon de voir la faune et explorer le lac..</p>
                <ul class="d-flex justify-content-end list-unstyled mt-auto">
                  
                  <li class="d-flex align-items-center me-3">
                    <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                    <small>la rivière</small>
                  </li>
                 
                </ul>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('https://i.pinimg.com/564x/e5/77/5e/e5775ea64b133e2ec39b23c7ee13e11e.jpg');">
              <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Quad </h2>
                <p>Pour explorer et découvrir bin el ouidan, le tour en Quad est une excellente alternative, lancez-vous dans une randonnée en pleine nature qui vous donnera le plein de sensations et d’adrénaline.</p>
                <ul class="d-flex justify-content-end list-unstyled mt-auto">
                 
                  <li class="d-flex align-items-center me-3">
                    <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                    <small>rivière et lac</small>
                  </li>
                  
                </ul>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('https://p1.storage.canalblog.com/26/64/278285/106063332.jpg');">
              <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Wakeboard</h2>
                <p class="card-text">Êtes-vous de ceux qui aiment la vitesse et de l'action? Nous avons eu le champion du monde wakeboard dans la rivière Ahansal. Serez-vous la prochaine?</p>
                <ul class="d-flex justify-content-end list-unstyled mt-auto">
                  
                  <li class="d-flex align-items-center me-3">
                    <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                    <small>Lac</small>
                  </li>
                  
                </ul>
              </div>
            </div>
          </div>
          
        </div>
        <div class="row row-cols-3 row-cols-lg-3 align-items-stretch g-4 py-5">
            <div class="col">
              <div class=" card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('https://i.pinimg.com/564x/d4/fc/fa/d4fcfaf245187b50204f73a5f314d66c.jpg');">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                  <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">climb the mountain</h2>
                  <p>“Let’s get going. There is a short hike before we get to the base of the mountain.”</p>
                  <ul class="d-flex justify-content-end list-unstyled mt-auto">
                    <!-- <li class="me-auto">
                      <img src="http://frontendfreecode.com/img/bootstrap-logo.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                    </li> -->
                    <li class="d-flex align-items-center me-3">
                      <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                      <small>Mountain</small>
                    </li>
                  
                  </ul>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('https://i.pinimg.com/564x/97/e1/25/97e125e228f6705c0495467c1a067bfa.jpg');">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                  <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Jet-ski  </h2>
                  <p class="card-text">It is pretty cool to see other people out on the water. And, the close encounters with other boats and jet skiers were amazing. It is really fun to live this experience</p>
                  <ul class="d-flex justify-content-end list-unstyled mt-auto">
                    
                    <li class="d-flex align-items-center me-3">
                      <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                      <small>Lac</small>
                    </li>
                   
                  </ul>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('https://i.pinimg.com/564x/48/65/2a/48652a144669c357866fbb75299e95ce.jpg');">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                  <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Travel Planning</h2>
                  <p>Have you ever been on a trip and had an amazing experience that you just had to share with others? Or maybe you're planning a trip and want to get some tips from seasoned travelers. Start your adventures.</p>
                  <ul class="d-flex justify-content-end list-unstyled mt-auto">
                    
                    <li class="d-flex align-items-center me-3">
                      <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                      <small>Forest</small>
                    </li>
                   
                  </ul>
                </div>
              </div>
            </div>
            
          </div>
      </div>

<!-- Footer Section -->
@include('footer')
</body>
</html>