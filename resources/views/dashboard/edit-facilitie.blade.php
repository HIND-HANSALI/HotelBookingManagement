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
							<h3 class="page-title mt-5">Edit Facility</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form method="POST" action="{{route('facilitiess.update',$facilitie->id)}}" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="row formtype">
								<div class="col-md-4">
									<div class="form-group">
										<label>Facility Name</label>
										<input class="form-control" type="text" name="name" value="{{old ('name',$facilitie->name)}}"> </div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label>Facility description</label>
										<textarea class="form-control" rows="5" id="description" name="description">{{ old('description', $facilitie->description) }}</textarea>

									</div>
								</div>
								
                                <div class="col-md-4">
									<div class="form-group">
										<label>Facility Icon</label>
										<div class="custom-file mb-3">
											<input type="file" class="custom-file-input" id="customFile" name="iconF" value="">
											<label class="custom-file-label" for="customFile">Choose icon</label>
										</div>
									</div>
								</div>
								
								
								
								
								
							</div>
						
					</div>
				</div>
				<button  type="submit"class="btn btn-primary buttonedit ml-2">Update</button>
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
	$(function() {
		$('#datetimepicker3').datetimepicker({
			format: 'LT'
		});
	});
	</script>
</body>

</html>