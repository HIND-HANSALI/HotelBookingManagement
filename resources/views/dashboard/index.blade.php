
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Hotel Dashboard </title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/adventure_logo_hostel.png">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylesheet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>
	
	

<body>
	<div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="{{route('roomsWelcome')}}" class="logo"> <img src="{{asset('assets/img/adventure_logo_hostel.png')}}" style="width:4rem" alt="logo"> </a>
				<!-- <a href="index.html" class="logo logo-small"> <img src="assets/img/hotel_logo.png" alt="Logo" width="30" height="30"> </a> -->
			</div>
			<a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
			<a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
			<ul class="nav user-menu">
				<li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span> </a>
					<!-- <div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header"> <span class="notification-title">Notifications</span> <a href="javascript:void(0)" class="clear-noti"> Clear All </a> </div>
						
						<div class="topnav-dropdown-footer"> <a href="#">View all Notifications</a> </div>
					</div> -->
				</li>
				<li class="nav-item dropdown has-arrow me-3">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img">{{Auth::user()->name}}</span> </a>
					
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm"> <img src="{{Auth::user()->profile_photo_url}}" alt="User Image" class="avatar-img rounded-circle"> </div>
							<div class="user-text">
								<h6>{{Auth::user()->name}}</h6>
								<p class="text-muted mb-0">Administrator</p>
							</div>
						</div> <a class="dropdown-item" href="{{route('profile.show')}}">My Profile</a>  
					
						<form method="post" action="{{route('logout')}}">
							@csrf
						<button type="submit" class="dropdown-item">Logout</button>
						</form>
					</div>
				</li>
			</ul>
			<div class="top-nav-search">
				<form>
					<input type="text" class="form-control" placeholder="Search here">
					<button class="btn" type="submit"><i class="fas fa-search"></i></button>
				</form>
			</div>
		</div>
		<!-- sidebar section -->
		@include('dashboard.sidebar')
		
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<h3 class="page-title mt-3">Good Morning {{Auth::user()->name}}</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Dashboard</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header">{{$countRoomsReserved}}</h3>
										<h6 class="text-muted">Booked Rooms</h6> </div>
										
										<div class="ml-auto mt-md-3 mt-lg-0">
										<span class="opacity-7 text-muted">
										<i class="fas fa-check-circle fs-6"></i>
										</span>
										</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header">{{$countRoomsNotReserved}}</h3>
										<h6 class="text-muted">Available Rooms</h6> </div>
										<div class="ml-auto mt-md-3 mt-lg-0">
										<span class="opacity-7 text-muted">
										<i class="fas fa-bed fs-6"></i>
										</span>
										</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header">{{$categories}}</h3>
										<h6 class="text-muted">Categories</h6> </div>
										
										<div class="ml-auto mt-md-3 mt-lg-0">
										<span class="opacity-7 text-muted">
										<i class="fas fa-tools fs-6"></i>
										</span>
										</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header">{{$rooms}}</h3>
										<h6 class="text-muted"> Rooms</h6> </div>
										<div class="ml-auto mt-md-3 mt-lg-0">
										<span class="opacity-7 text-muted">
										<i class="fas fa-home fs-6"></i>
										</span>
										</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header">{{$facilities}}</h3>
										<h6 class="text-muted">Facilities</h6> </div>
										
										<div class="ml-auto mt-md-3 mt-lg-0">
										<span class="opacity-7 text-muted">
										<i class="fas fa-tasks fs-6"></i>
										</span>
										</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header">{{$userClient}}</h3>
										<h6 class="text-muted">Clients</h6> </div>
										<div class="ml-auto mt-md-3 mt-lg-0">
										<span class="opacity-7 text-muted">
										<i class="fas fa-user-friends fs-6"></i>
										</span>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12 d-flex">
						<div class="card card-table flex-fill">
							<div class="card-header">
								<h4 class="card-title float-left mt-2">Booking</h4>
								<a href="{{ route('bookings') }}" class="btn btn-primary float-right veiwbutton">Veiw All</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center">
										<thead>
											<tr>
												<!-- <th>Booking ID</th> -->
												<th>User Name</th>
												<th>Address </th>
												<th>Room</th>
												<th class="text-center">Arrival Date</th>
												<th class="text-right">Depature Date</th>
												<!-- <th class="text-center">Status</th> -->
											</tr>
										</thead>
										<tbody>
										@foreach ($bookings as $booking)
											<tr>
												<!-- <td class="text-nowrap">
													<div>BKG-0001</div>
												</td> -->
												<td class="text-nowrap">{{$booking->user->name}}</td>
												<td> {{ $booking->reservationdetails->address ?? 'N/A' }}</td>
												<td>{{$booking->chambre->nameR }}</td>
												<td class="text-center">{{ $booking->checkIn}}</td>
												<td class="text-right">
													<div>{{ $booking->checkOut}}</div>
												</td>
												<!-- <td class="text-center"> <span class="badge badge-pill bg-success inv-badge">INACTIVE</span> </td> -->
											</tr>
											
										@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/plugins/morris/morris.min.js"></script>
	<script src="assets/js/chart.morris.js"></script>
	<script src="assets/js/script.js"></script>

	
</body>


</html>