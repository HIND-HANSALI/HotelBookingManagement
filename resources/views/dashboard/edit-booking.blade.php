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
							<h3 class="page-title mt-5">Edit Booking</h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form method="POST" action="{{route('bookings.update',$booking->id)}}" enctype="multipart/form-data">
							@csrf
							@method('PUT')
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
										<option value="{{ $user->id }}"{{$user->id== $booking->user_id ? 'selected' : ''}}>{{$user->name}}</option>
									@endforeach
								
								</select>
								</div>
								</div>

								
								<div class="col-md-4">
								<div class="form-group">
									<label for="chambre_id">Room</label>
									<select class="form-control @error('chambre_id') is-invalid  @enderror" id="chambre_id" name="chambre_id">
										@foreach ($rooms as $room)
										<option value="{{ $room->id }}" {{ $room->id == $booking->chambre_id ? 'selected' : '' }}>
										{{ $room->nameR }}
												
										</option>

										@endforeach
									</select>
								</div>
								</div>

								
								<input type="hidden" name="reservationdetail_id" value="{{ $booking->reservationdetails->id }}">
								<div class="col-md-4">
									<div class="form-group">
										<label>Arrival Date</label>
										<input type="date" class="form-control datetimepicker @error('checkIn') is-invalid  @enderror" name="checkIn" value="{{old ('checkIn',$booking->checkIn)}}"> 
									</div>
									
								</div>

								
								<div class="col-md-4">
									<div class="form-group">
										<label>Depature Date</label>
										<input type="date" class="form-control datetimepicker @error('checkOut') is-invalid  @enderror" name="checkOut" value="{{old ('checkOut',$booking->checkOut)}}"> 
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label>Total Payement</label>
										<input type="number" class="form-control @error('total_payement') is-invalid  @enderror" id="totalPrice" name="total_payement" value="{{old ('total_payement',$booking->reservationdetails->total_payement)}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Number Person</label>
										<input type="number" class="form-control @error('numberPerson') is-invalid  @enderror" id="numberPerson" name="numberPerson" value="{{old ('numberPerson',$booking->reservationdetails->numberPerson)}}">
									</div>
								</div>
								
								
								
							
							</div>
						
					</div>
				</div>
				<button type="submit" class="btn btn-primary buttonedit">Update</button>
			</div>
			</form>
		</div>

	</div>


	<script src="assets/js/jquery-3.5.1.min.js"></script>

	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	<script src="assets/js/script.js"></script>
	<script>
		$(function () {
			$('#datetimepicker3').datetimepicker({
				format: 'LT'

			});
		});
	</script>
</body>

</html>