<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active"> <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
                <li class="list-divider"></li>
                <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Booking </span> <span class="menu-arrow"></span></a>
                    @php
                    $id = 2;
                    $booking = DB::table('reservations')->where('id', $id)->first();
                    @endphp
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('bookings') }}"> All Booking </a></li>
                       
                      
                        <li><a href="{{ route('bookingadd') }}"> Add Booking </a></li>

                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Customers </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{route('users.index')}}"> All customers </a></li>
                        <!-- <li><a href="edit-customer.html"> Edit Customer </a></li>
                        <li><a href="add-customer.html"> Add Customer </a></li> -->
                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fas fa-hand-holding"></i> <span> Facilities </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('facilities') }}"> All Facilities </a></li>
                        <li><a href="{{ route('editfacilitie') }}"> Edit Facilities </a></li>
                        <li><a href="{{ route('addfacilitie') }}"> Add Facilities </a></li>
                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fas fa-key"></i> <span> Rooms </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('rooms') }}">All Rooms </a></li>
                        <li><a href="{{ route('roomedit') }}"> Edit Rooms </a></li>
                        <li><a href="{{ route('roomadd') }}"> Add Rooms </a></li>
                    </ul>
                </li>
              
             
               
               
                <li class="submenu"> <a href="#"><i class="fas fa-book"></i> <span> Contacts </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('contacts.index') }}">All Contacts </a></li>
                        
                    </ul>
                </li>
                <li> <a href="calendar.html"><i class="fas fa-calendar-alt"></i> <span>Calendar</span></a> </li>
                <li class="submenu"> <a href="#"><i class="fe fe-table"></i> <span> Blog </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="blog.html">Blog </a></li>
                        <li><a href="blog-details.html">Blog Veiw </a></li>
                        <li><a href="add-blog.html">Add Blog </a></li>
                        <li><a href="edit-blog.html">Edit Blog </a></li>
                    </ul>
                </li>
                
               
                
                
               
               
                
            </ul>
        </div>
    </div>
</div>