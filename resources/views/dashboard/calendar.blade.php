<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Hotel Dashboard All bookings</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="assets/css/style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>


<body>
	<div class="main-wrapper">
	    @include('dashboard.header')
		<!-- sidebar section -->
		@include('dashboard.sidebar')

        <div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">Calendar</h4>
								
							</div>
						</div>
					</div>
				</div>
				<div class="row">
                    <div class="col-sm-12">
                       
                    <div class="container mt-4" id='calendar'></div> 

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
<script>
 
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      headerToolbar:{
  start: 'prev', // will normally be on the left. if RTL, will be on the right
  center: 'title',
  end: 'today next listWeek dayGridMonth' // will normally be on the right. if RTL, will be on the left
},
events: [
  @foreach ($bookings as $booking)    
    {
      title: '{{$booking->user->name}} {{$booking->reservationdetails->phoneNum }} N°guest:{{$booking->reservationdetails->numberPerson}}',
      start: '{{ $booking->checkIn}}',
      end: '{{ $booking->checkOut}}',
      url:'url',
      className: '{{ $booking->statutBooking == "booked" ? "bg-success" : "bg-danger" }}',
    }, 
  @endforeach
  ],
    });
    calendar.render();
  });
</script>







                    </div>
                </div>
			</div>

		</div>
	</div>




</body>

</html>