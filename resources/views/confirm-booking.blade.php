<!DOCTYPE html>
<html>

<head>
    <title>Hotel Booking Website-Rooms -Confirm Booking</title>
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
                <h2 class="fw-bold h-font ">Confirm Booking</h2>
                <div style="font-size:14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="index.php" class="text-secondary text-decoration-none">ROOMS</a>
                    <span class="text-secondary"> > </span>
                    <a href="index.php" class="text-secondary text-decoration-none">CONFIRM</a>
                </div>

            </div>
            <!-- just One pic -->
            <div class="col-lg-7 col-md-12 px-4 ">
            <!-- get images foreach-->
            @if ($room->chambreimages->count() > 0)
                <img src="{{ asset('assets/upload/rooms/'. $room->chambreimages->first()->picture) }}" class="img-fluid">
            @else
                <p>No image available</p>
            @endif
                       
                        
                        <!-- <div class="carousel-item active">
                            <img src="" class="d-block w-90 img-fluid rounded" alt="...">
                        </div> -->
                        <h5>{{$room->nameR}}</h5>
                        <h6 class="room-price" data-room-price="{{ $room->priceR }}">{{$room->priceR}} per night </h6>
                        <!-- end foreach -->
                        
                   
                    
          
            </div>

            <div class="col-lg-5 col-md-12 px-4 ">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <form method="POST" action="{{route('detailsbook.store')}}" id="booking_form">
                        @csrf
                        <input type="hidden" name="price" value="{{ $room->priceR }}">
                        <input type="hidden" name="chambre_id" value="{{ $room->id }}">
                        <input type="hidden" name="roomName" value="{{ $room->nameR }}">
                        <input type="hidden" id="totalpayement" name="total_payement" value="">

                        <h6 class="mb-3">Booking Details</h6>
                        <div class="row">
                            <div class="col-md-6  mb-3">
                            <label for="form-label " >Name</label>
                            <input type="text" class="form-control shadow-none" value="{{ $user->name }}" name="userName" >
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                            <label for="form-label " >Phone Number</label>
                            <input type="text" class="form-control shadow-none" value="{{ $user->phone }}" name="phoneNum" >
                            </div>

                            <div class="col-md-12 ps-0 mb-3 ms-3">
                            <label for="form-label ">Address</label>
                            <textarea class="form-control shadow-none" rows="3" value="" id="address" name="address">{{ $user->address }}</textarea>
                            </div>
                            <div class="col-md-12 ps-0 mb-3 ms-3">
                            <label for="form-label ">Number Guests</label>
                            <input type="number" min="1" onchange="check()" class="form-control shadow-none " id="numberPerson" value="" name="numberPerson" >
                            
                            </div>
                            <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" onchange="check()" name="checkIn" class="form-control shadow-none">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-Out</label>
                            <input type="date" onchange="check()" name="checkOut" class="form-control shadow-none">
                        </div>
                        </div>
                       

                  
                        <div class="col-12">
                            <h6 class="text-danger" id="pay_info"></h6>
                        <!-- <a href="" onclick ="senddata()" id="pay_now" name="pay_now" class="btn  w-100 text-white custom-bg shadow-none my-4 mb-1">Pay Now</a> -->
                      
                        <button type="submit"  id="pay_now" name="pay_now" class="btn w-100 text-dark custom-bg shadow-none my-4 mb-1" disabled>Pay Now</button>
                       
                    </div>
                    </form>
                    </div>
                </div>
            </div>

            

           

        </div>
    </div>



    <!-- Footer Section -->
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let booking_form=document.getElementById('booking_form');
        let pay_info=document.getElementById('pay_info');

        function check(){
            // console.log('hi')
           let numberPerson =  parseInt(booking_form.elements['numberPerson'].value);
           console.log(numberPerson);
            let checkIn_val=booking_form.elements['checkIn'].value;
            let totalpayement=booking_form.elements['totalpayement'];
            let checkOut_val=booking_form.elements['checkOut'].value;
            let roomPrice = parseFloat(document.querySelector('.room-price').getAttribute('data-room-price'));
                console.log(roomPrice);
                let currentDate = new Date().toJSON().slice(0, 10);
                console.log(currentDate);
                console.log(checkIn_val);
            if(checkIn_val != '' && checkOut_val != '' && checkIn_val < checkOut_val &&  Date.parse(checkIn_val) >= Date.parse(currentDate) ){

                
                
                let timeDiff = Math.abs(new Date(checkOut_val).getTime() - new Date(checkIn_val).getTime());
                let CountDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
               
                let payment=CountDays*roomPrice*numberPerson;

                totalpayement.value = payment ;

                document.getElementById('pay_now').removeAttribute('disabled');

                // document.getElementById('pay_now').style.display='block';
            pay_info.innerHTML = "N° of Days :"+CountDays+"<br> Total Amount to pay : "+payment+"  MAD"; 
            pay_info.classList.add('text-dark');
                
                    
            }else{
                
                document.getElementById('pay_now').setAttribute('disabled', true);
                pay_info.classList.add('text-danger');
                pay_info.textContent = 'Please provide a valid check-in and check-out date.';
            }
        }
        

        // function check_availability(){
        //     let checkIn_val=booking_form.elements['checkIn'].value;
        //     let checkOut_val=booking_form.elements['checkOut'].value;
        //     booking_form.elements['pay_now'].setAttribute('disabled',true );

        //     if(checkIn_val!="" && checkOut_val!="" ){
        //         let data=new FormData();
        //         data.append('check_availability','');
        //         data.append('check_in',checkIn_val);
        //         data.append('check_out',checkOut_val);

        //         let xhr=new XMLHttpRequest();
        //         xhr.open("POST","/confirmBooking/{id}",true);
        //         xhr.onload=function(){
        //             let data=JSON.parse(this.responseText);
        //         }
        //         xhr.send(data);
        //     }
        // }
//         function senddata() {
//             console.log('hi');
//   let checkIn_val = booking_form.elements['checkIn'].value;
//   let checkOut_val = booking_form.elements['checkOut'].value;
//   booking_form.elements['pay_now'].setAttribute('disabled', true);

  


    </script>    
</body>

</html>