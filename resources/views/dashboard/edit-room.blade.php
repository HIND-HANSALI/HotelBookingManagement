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
							<h3 class="page-title mt-5">Edit Room</h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form method="POST" action="{{route('roomss.update',$room->id)}}" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="row formtype">
								<div class="col-md-4">
									<div class="form-group">
										<label>Room Name</label>
										<input class="form-control @error('nameR') is-invalid  @enderror" type="text" name="nameR"  value="{{old ('nameR',$room->nameR)}}">
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label>Room Categorie</label>
										<select class="form-control @error('categorie_id') is-invalid  @enderror" id="sel1" name="categorie_id">
											<option disabled selected>Open this select menu</option>
											@foreach($categories as $categorie)
											<option value="{{$categorie->id}}"{{$categorie->id== $room->categorie_id ? 'selected' : ''}}>{{$categorie->title}}</option>
											@endforeach

										</select>
									</div>
								</div>
								<!-- <div class="col-md-4">
									<div class="form-group">
										<label>Statut Room</label>
										<input type="checkbox" id="statutR" name="statutR" value="1" checked>
										<select class="form-control" id="sel2" name="statutR">
											<option disabled selected>Open this select menu</option>
											<option>AC</option>
											<option>NON-AC</option>
										</select>
									</div>
								</div> -->

								<div class="col-md-4">
									<div class="form-group">
										<label>Number Of Beds </label>
										<select class="form-control" id="sel" name="numberBedOriginal">
											<option disabled selected>Open this select menu</option>
											<option {{$room->numberBedOriginal== 1 ? 'selected' : ''}}>1</option>
											<option{{$room->numberBedOriginal== 2 ? 'selected' : ''}}>2</option>
											<option{{$room->numberBedOriginal== 3 ? 'selected' : ''}}>3</option>
											<option {{$room->numberBedOriginal== 4 ? 'selected' : ''}}>4</option>
											<option {{$room->numberBedOriginal== 5 ? 'selected' : ''}}>5</option>
											<option{{$room->numberBedOriginal== 6 ? 'selected' : ''}}>6</option>
										</select>
									</div>
								</div>


								<div class="col-md-4">
									<div class="form-group">
										<label>Price Room</label>
										<input type="number" class="form-control" id="priceR" name="priceR"  value="{{old ('priceR',$room->priceR)}}">
									</div>
								</div>
								
								<div class="col-md-12">
									<div class="form-group">
										<label>Room description</label>
										<textarea class="form-control" rows="5" id="description" name="descriptionR">{{ old('descriptionR',$room->descriptionR) }}</textarea>

									</div>
								</div>

								<!-- add relation with facilitie?? -->
								<div class="col-md-12">
									<label class="form-label">Facilities </label>
									<div class="row">
										@foreach($facilities as $facilitie)
										<div class="col-md-3 mb-1">
											<label for="">
												<input class="form-check-input shadow-none" name="facilities[]" type="checkbox" value="{{$facilitie->id}}" id="flexCheckDefault" 
												@php 
												foreach($room->facilities as $rf){
													if($facilitie->id == $rf->id){
														echo 'checked';
													}
												}
												@endphp  >
												{{$facilitie->name}}
											</label>
										</div>
										@endforeach
									</div>

								</div>

							</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary buttonedit ml-2">Save</button>
				<button type="button" class="btn btn-primary buttonedit">Cancel</button>
			</div>
			</form>
		</div>

	</div>


	<script src="assets/js/jquery-3.5.1.min.js"></script>

	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/select2.min.js"></script>
	
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>

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