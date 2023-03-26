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

		<div class="header">

			<div class="header-left">
				<a href="index.html" class="logo">
					<img src="assets/img/hotel_logo.png" width="50" height="70" alt="logo">
					<span class="logoclass">HOTEL</span>
				</a>
				<a href="index.html" class="logo logo-small">
					<img src="assets/img/hotel_logo.png" alt="Logo" width="30" height="30">
				</a>
			</div>

			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fe fe-text-align-left"></i>
			</a>

			<a class="mobile_btn" id="mobile_btn">
				<i class="fas fa-bars"></i>
			</a>


			<ul class="nav user-menu">

				<li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
					</a>
					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Notifications</span>
							<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
						</div>
						<div class="noti-content">
							<ul class="notification-list">
								<li class="notification-message">
									<a href="#">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image"
													src="assets/img/profiles/avatar-02.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Carlson Tech</span> has
													approved <span class="noti-title">your estimate</span></p>
												<p class="noti-time"><span class="notification-time">4 mins ago</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="#">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image"
													src="assets/img/profiles/avatar-11.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">International Software
														Inc</span> has sent you a invoice in the amount of <span
														class="noti-title">$218</span></p>
												<p class="noti-time"><span class="notification-time">6 mins ago</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="#">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image"
													src="assets/img/profiles/avatar-17.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">John Hendry</span> sent
													a cancellation request <span class="noti-title">Apple iPhone
														XR</span></p>
												<p class="noti-time"><span class="notification-time">8 mins ago</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="#">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image"
													src="assets/img/profiles/avatar-13.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Mercury Software
														Inc</span> added a new product <span class="noti-title">Apple
														MacBook Pro</span></p>
												<p class="noti-time"><span class="notification-time">12 mins ago</span>
												</p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="#">View all Notifications</a>
						</div>
					</div>
				</li>


				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg"
								width="31" alt="Soeng Souy"></span>
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="assets/img/profiles/avatar-01.jpg" alt="User Image"
									class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<h6>Soeng Souy</h6>
								<p class="text-muted mb-0">Administrator</p>
							</div>
						</div>
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="settings.html">Account Settings</a>
						<a class="dropdown-item" href="login.html">Logout</a>
					</div>
				</li>

			</ul>

		</div>

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
								
							<div class="col-md-4">
									<div class="form-group">
										<label>User</label>
										<select class="form-control @error('user_id') is-invalid  @enderror" id="sel1" name="user_id">
										<option disabled selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
											
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Room</label>
										<select class="form-control @error('room_id') is-invalid  @enderror" id="sel1" name="room_id">
										<option disabled selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
											
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Booking Type</label>
										<select class="form-control @error('typeBooking') is-invalid  @enderror" id="sel1" name="typeBooking">
										<option disabled selected>Open this select menu</option>
                                        <option value="SemiPrix">SemiPrix</option>
                                        <option value="Pris en Charge">Pris en Charge</option>
                                        <option value="ToutPrix">ToutPrix</option>
											
										</select>
									</div>
								</div>
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
										<label>Price Total</label>
										<input type="number" class="form-control @error('totalPrice') is-invalid  @enderror" id="totalPrice" name="totalPrice" value="{{old ('totalPrice',$booking->totalPrice)}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Number Person</label>
										<input type="number" class="form-control @error('numberPerson') is-invalid  @enderror" id="numberPerson" name="numberPerson" value="{{old ('numberPerson',$booking->numberPerson)}}">
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label>Statut Room</label>
										<select class="form-control @error('statutBooking') is-invalid  @enderror" id="sel2" name="statutBooking">
										<option disabled selected>Open this select menu</option>
											<option value="Accepte">Accepte</option>
											<option value="Refuse">Refuse</option>
										</select>
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