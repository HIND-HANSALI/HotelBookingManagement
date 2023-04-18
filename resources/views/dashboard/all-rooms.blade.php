<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Hostel Dashboard</title>
	
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/adventure_logo_hostel.png">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
	<!-- DataTables -->
	<!-- <link rel="stylesheet"  href="assets/plugins/datatables/css/jquery.dataTables.css"/> -->
	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> -->


	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="assets/css/style.css"> </head>
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css"> -->
	
    

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
								<h4 class="card-title float-left mt-2">All Rooms</h4> <a href="{{route('roomss.create')}}"class="btn btn-primary float-right veiwbutton">Add Room</a> </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table class="datatable table table-stripped table table-hover table-center mb-0" id="datatableRooms">
										<thead>
											<tr>
												
												<!-- <th>Picture  </th> -->
												<th>Name</th>
												<th>Room Categorie</th>
												<th>Number Beds</th>
												
												<th>Room Description</th>
												<th>Price Room</th>
												<th>Status</th>
												<th>Facilities</th>
												<th class="text-right">Actions</th>
											</tr>
										</thead>
										<tbody>
										
										@foreach ($rooms as $room)
					
											<tr>
												
												<!-- <td>
													
                                                    <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"  src="{{asset('assets/upload/rooms/'.$room-> pictureR)}}" alt="Room Image"></a>
                                              
                                                </td> -->
												<td>{{$room->nameR}}</td>
												<td>{{$room->categorie_id}}</td>
												
												<td>{{$room->numberBedOriginal}}</td>
												<td >{{substr($room->descriptionR, 0, 50)}}</td>
												<td>{{$room->priceR}} MAD</td>
												
												<td>
												@if ($room->statutR)
													<button id="room_{{ $room->id }}_status" onclick="toggle_status({{ $room->id }}, 0)" class="btn btn-sm btn-success mr-2 shadow-none">active</button>
												@else
													<button id="room_{{ $room->id }}_status" onclick="toggle_status({{ $room->id }}, 1)" class="btn btn-sm btn-danger mr-2 shadow-none">inactive</button>
												@endif
													
												</td>
												<td>
													@foreach ($room->facilities as $facility)
														{{$facility->name}}
													@endforeach
												</td>
												<td class="text-right">
													<div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
														<div class="dropdown-menu dropdown-menu-right"> 
														<a class="dropdown-item" href="{{ route('roomss.edit', $room->id) }}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a> 
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset_{{ $room->id }}"><i class="fas fa-trash-alt m-r-5"></i> Delete</a> 
														<a class="dropdown-item" href="{{ route('roomImage', $room->id) }}"><i class="fas fa-image m-r-5"></i>Add Image</a>
														<!-- <a class="dropdown-item" href="{{ route('images.index') }}"><i class="fas fa-image m-r-5"></i>View All Image</a> -->
													</div>
													</div>
												</td>
											</tr>
											
											
											<div id="delete_asset_{{ $room->id }}" class="modal fade delete-modal" role="dialog">
												<div class="modal-dialog modal-dialog-centered">
													<div class="modal-content">
														<div class="modal-body text-center"> <img src="assets/img/sent.png" alt="" width="50" height="46">
															<h3 class="delete_class">Are you sure want to delete this Asset?</h3>
															<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
															<form style="display:inline" method="POST" action="{{route('roomss.destroy',$room->id)}}">
															@csrf
															@method('DELETE')
															<input type="hidden" name="id" value="{{ $room->id }}">
																<button type="submit" class="btn btn-danger">Delete</button>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
											@endforeach	
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="delete_asset" class="modal fade delete-modal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center"> <img src="assets/img/sent.png" alt="" width="50" height="46">
							<h3 class="delete_class">Are you sure want to delete this Asset?</h3>
							<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="assets/js/main.js"></script>
	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables/datatables.min.js"></script>
	<script src="assets/js/script.js"></script>
	
	<script>
		// var table = $('#datatableRooms').DataTable();

		// // Destroy the existing DataTable
		// table.destroy();

		// // Initialize DataTables on the table again
		// $('#datatableRooms').DataTable({
		// 	searching: true
		// });
	// 		$(document).ready(function () {
	// 	$('#datatableRooms').DataTable({
	// 	searching: true
	// });
	// });
	</script>
</body>

</html>