<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Hotel Dashboard Template</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/feathericon.min.css') }}">
	<link rel="stylesheet" href="{{ asset('https://cdn.oesmith.co.uk/morris-0.5.1.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
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
							<h3 class="page-title mt-5">Add Booking</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form method="POST" action="{{route('bookings.store')}}" enctype="multipart/form-data">
							@csrf
							<div class="row formtype">
							@php
							$users = \App\Models\User::all();
							@endphp
								<div class="col-md-4">
								<div class="form-group">
								<label for="user_id">User</label>
								<select class="form-control @error('user_id') is-invalid  @enderror" id="user_id" name="user_id">
									<option disabled selected>Open this select menu</option>
									@foreach ($users as $user)
										<option value="{{ $user->id }}">{{ $user->name }}</option>
									@endforeach
								</select>
								</div>
								</div>
								@php
								$rooms = \App\Models\Chambre::all();
								@endphp
								<div class="col-md-4">
								<div class="form-group">
									<label for="chambre_id">Room</label>
									<select class="form-control @error('chambre_id') is-invalid  @enderror" id="chambre_id" name="chambre_id">
										@foreach ($rooms as $room)
											<option value="{{ $room->id }}">{{ $room->nameR }}</option>
										@endforeach
									</select>
								</div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label>Booking Type</label>
										<select class="form-control @error('typeBooking') is-invalid  @enderror" id="sel1" name="typeBooking">
										<option disabled selected>Open this select menu</option>
										<option value="All-Inclusive Booking">All-Inclusive Booking</option>
										<option value="Package Booking">Package Booking</option>
										<option value="Group Booking">Group Booking</option>
										<option value="Half-Board Booking">Half-Board Booking</option>	
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Arrival Date</label>
										<input type="date" class="form-control datetimepicker @error('checkIn') is-invalid  @enderror" name="checkIn" value="{{old ('checkIn')}}"> 
									</div>
									
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label>Depature Date</label>
										<input type="date" class="form-control datetimepicker @error('checkOut') is-invalid  @enderror" name="checkOut" value="{{old ('checkOut')}}"> 
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Price Total</label>
										<input type="number" class="form-control @error('totalPrice') is-invalid  @enderror" id="totalPrice" name="totalPrice" value="{{old ('totalPrice')}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Number Person</label>
										<input type="number" class="form-control @error('numberPerson') is-invalid  @enderror" id="numberPerson" name="numberPerson" value="{{old ('numberPerson')}}">
									</div>
								</div>
								
						

								<!-- <div class="col-md-4">
									<div class="form-group">
										<label>Statut Room</label>
										<select class="form-control @error('statutBooking') is-invalid  @enderror" id="sel2" name="statutBooking">
										<option disabled selected>Open this select menu</option>
											<option>Accepte</option>
											<option>Refuse</option>
										</select>
									</div>
								</div> -->
								
								
								
								
								
								
							</div>
						
					</div>
				</div>
				<button type="submit" class="btn btn-primary buttonedit1">Create Booking</button>
			</div>
			</form>
		</div>
	</div>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/js/script.js"></script>
	<script>
	$(function() {
		$('#datetimepicker3').datetimepicker({
			format: 'LT'
		});
	});
	</script>
</body>

</html>