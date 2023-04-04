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
        <div class="header">
            <div class="header-left">
                <a href="index.html" class="logo"> <img src="assets/img/hotel_logo.png" width="50" height="70" alt="logo"> <span class="logoclass">HOTEL</span> </a>
                <a href="index.html" class="logo logo-small"> <img src="assets/img/hotel_logo.png" alt="Logo" width="30" height="30"> </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
            <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
            <ul class="nav user-menu">
                <li class="nav-item dropdown noti-dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span> </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header"> <span class="notification-title">Notifications</span> <a href="javascript:void(0)" class="clear-noti"> Clear All </a> </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media"> <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Carlson Tech</span> has approved <span class="noti-title">your estimate</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span> </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media"> <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-11.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">International Software
                                                        Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span> </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media"> <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-17.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">John Hendry</span> sent a cancellation request <span class="noti-title">Apple iPhone
                                                        XR</span></p>
                                                <p class="noti-time"><span class="notification-time">8 mins ago</span> </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media"> <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-13.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Mercury Software
                                                        Inc</span> added a new product <span class="noti-title">Apple
                                                        MacBook Pro</span></p>
                                                <p class="noti-time"><span class="notification-time">12 mins ago</span> </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer"> <a href="#">View all Notifications</a> </div>
                    </div>
                </li>
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Soeng Souy"></span> </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm"> <img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle"> </div>
                            <div class="user-text">
                                <h6>Soeng Souy</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div> <a class="dropdown-item" href="profile.html">My Profile</a> <a class="dropdown-item" href="settings.html">Account Settings</a> <a class="dropdown-item" href="login.html">Logout</a>
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