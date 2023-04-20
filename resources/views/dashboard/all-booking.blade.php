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
								<h4 class="card-title float-left mt-2">Appointments</h4>
								<a href="{{route('bookings.create')}}" class="btn btn-primary float-right veiwbutton ">Add Booking</a>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table class="datatable table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
											<th>User Details</th>
											<th>Room Details</th>
											<th>Booking Details</th>
												<th>Status</th>
												<th class="text-right">Actions</th>
											</tr>
										</thead>
										
										<tbody>
										
										@foreach ($bookings as $booking)
										
										@php
											$status = '';
											$tempId = null;
											$bookingid = $booking->id;
											$statusBocking =$booking->statutBooking;
											switch ($booking->statutBooking) {
												case 'pending':
													$status = '<button class="btn btn-sm bg-warning-light mr-2" data-toggle="modal"  onclick="changeStatusBooking('.$bookingid.', \''.$statusBocking.'\' )"   data-target="#editStatusModal">Pending</button>' ;
													break;
												case 'booked':
													
													$status = '<button type="button" class="btn btn-sm bg-success-light mr-2" onclick="changeStatusBooking('.$bookingid.', \''.$statusBocking.'\' )"  data-toggle="modal" data-target="#editStatusModal">Booked</button>';
													break;
												case 'canceled':
													$status = '<div class="btn btn-sm bg-danger-light mr-2" data-toggle="modal" onclick="changeStatusBooking('.$bookingid.', \''.$statusBocking.'\' )"  data-target="#editStatusModal">Canceled</div>';
													break;
												
												case 'completed':
													$status = '<div class="btn btn-sm bg-info-light mr-2" data-toggle="modal"  onclick="changeStatusBooking('.$bookingid.', \''.$statusBocking.'\' )" data-target="#editStatusModal">Completed</div>';
													break;
												default:
													$status = '';
													break;
											}
										@endphp
											<tr>
											<!-- Loop through reservation details for this booking -->
											

											<td>
												<b>Name: </b> {{$booking->user->name}}
												<br>
												<b>Address:</b> {{ $booking->reservationdetails->address ?? 'N/A' }}
												<br>
												<b>Phone:</b>{{$booking->reservationdetails->phoneNum ?? 'N/A'}}
											</td>	

											<td>
												<b>Room: </b>{{$booking->chambre->nameR }}
												<br>
												<b>Price:</b> {{$booking->reservationdetails->price ?? 'N/A' }} MAD
											</td>
											<td>
												<b>Amount: </b>{{ $booking->reservationdetails->total_payement ?? 'N/A'}} MAD
												<br>
												<b>Arrival Date: </b>{{ $booking->checkIn}}
												<br>
												<b>Depature Date: </b>{{ $booking->checkOut}}

											</td>
											
										
												<td>
													{!! $status !!} 
												</td>
												<td class="text-right">
													<div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="{{ route('bookings.edit', [$booking->id]) }}"><i class="fas fa-pencil-alt m-r-5"></i>Assign Room</a>
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset_{{ $booking->id }}"><i class="fas fa-trash-alt m-r-5"></i> Delete</a>
														</div>
													</div>
												</td>
											</tr>

											<div id="delete_asset_{{ $booking->id }}" class="modal fade delete-modal" role="dialog">
												<div class="modal-dialog modal-dialog-centered">
													<div class="modal-content">
														<div class="modal-body text-center"> <img src="assets/img/sent.png" alt="" width="50" height="46">
															<h3 class="delete_class">Are you sure want to delete this Asset?</h3>
															<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
																<form style="display:inline" method="POST" action="{{route('bookings.destroy',$booking->id)}}">
																	@csrf
																	@method('DELETE')
																	<input type="hidden" name="id" value="{{ $booking->id }}">
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

		</div>
	</div>
	<!-- modal edit Status -->
	<div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content w-100">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Change Statut</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-center">
                      <form method="POST" action="{{route('changeStatutBooking') }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="Bookingid" id="Bookingid" value="">
                        <label for="changeRole">Select Statut</label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"  name="statut_ids" id="pendingRadio" value="pending">
                            <label class="form-check-label" for="inlineRadio1">Pending</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"  name="statut_ids" id="bookedRadio" value="booked">
                            <label class="form-check-label" for="inlineRadio2">Booked</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"  name="statut_ids" id="cancelRadio" value="canceled">
                            <label class="form-check-label" for="inlineRadio3">Canceled</label>
                          </div>
						  <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"  name="statut_ids" id="completRadio" value="completed">
                            <label class="form-check-label" for="inlineRadio4">Completed</label>
                          </div>
                       <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" id="saveBtn" class="btn btn-primary">Save</button>
                    </div>
                      </form>
                    </div>
                   
                  </div>
                </div>
              </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables/datatables.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/js/script.js"></script>
</body>

</html>