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
                            <h3 class="page-title mt-5">Add Room Image</h3>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form method="POST" action="{{route('images.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype">
                                <input type="hidden" name="chambre_id" value ={{$id}}>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Picture Room</label>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="customFile" name="picture">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>


                            </div>

                    </div>
                </div>

                <button type="submit" name="saveRoomImage" class="btn btn-primary buttonedit ml-2">Save Image</button>
                </form>
 

                <div class=" mt-5">
                <div class="table-responsive ">
                    
                    <table class="datatable table table-stripped table table-hover table-center mb-0">
                        <thead>
                            <tr>

                                <th scope="col" width="">Picture </th>
                                <th scope="col" width="">Thumb </th>
                                <th scope="col" class="">Delete</th>
                            </tr>
                        </thead>
                        
                        @php
                        $images=DB::table('chambreimages')->where ('chambre_id',$id)->get();
                        
                        $image_list = [];
                        foreach ($images as $image) {
                            $image_list = array_merge($image_list, explode('|', $image->picture));
                        }
                        @endphp
                        <tbody>
                       
                        @foreach ($images as $key => $image)
                            <tr class="align-middle">
                            @if($image->thumb == 1)
                            <?php $thumb_btn = '<button type="submit" class="btn text-success "><i class="fas fa-check m-r-5"></i></button>'; ?>
                        @else
                            <?php $thumb_btn = '<button type="submit" class="btn text-secondary"><i class="fas fa-check m-r-5"></i></button>'; ?>
                        @endif

                                <td>
                                    <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/upload/rooms/'.$image_list[$key])}}" alt="Room Image"></a>

                                </td>
                                <td>{!! $thumb_btn !!}</td>

                                <td >
                                    <form  method="POST" action="{{route('images.destroy',['image'=>$image->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary ">
                                        <i class="fas fa-trash-alt m-r-5"></i>Delete
                                    </button>
                                    </form>
                                </td>
                            </tr>


                        @endforeach	
                        </tbody>
                    </table>
                </div>
                </div>

            </div>
            
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