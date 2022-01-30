<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


            @if(admin()->user()->type  == 'employee')


                <li class="{{request()->segment(2) == 'employee_trip' ? 'active' : ''}} nav-item">
                    <a href="{{url('admin/employee_trip')}}">
                        <i class="la la-map"></i>
                        <span class="menu-title" >{{__('lang.trip_information')}}</span>
                    </a>
                </li>


            @endif


                @if(admin()->user()->type  == 'admin')


{{--                <li class="{{request()->segment(2) == 'home' ? 'active' : ''}} nav-item">--}}
{{--                <a href="{{url('admin/home')}}">--}}
{{--                    <i class="la la-home"></i>--}}
{{--                    <span class="menu-title" >{{__('lang.dashboard')}}</span>--}}
{{--                </a>--}}
{{--            </li>--}}




            <li class="{{request()->segment(2) == 'user' ? 'active' : ''}} nav-item">
                <a href="{{url('admin/user')}}">
                    <i class="la la-users"></i>
                    <span class="menu-title" >{{__('lang.users')}}</span>
                </a>
            </li>


            <li class="{{request()->segment(2) == 'employee' ? 'active' : ''}} nav-item">
                <a href="{{url('admin/employee')}}">
                    <i class="la la-user"></i>
                    <span class="menu-title" >{{__('lang.employees')}}</span>
                </a>
            </li>


            <li  class="{{request()->segment(2) == 'area' ? 'active' : ''}} nav-item">
                <a href="{{url('admin/area')}}">
                    <i class="la la-map-marker"></i>
                    <span class="menu-title" >{{__('lang.areas')}}</span>
                </a>
            </li>


            <li class="{{request()->segment(2) == 'bus' ? 'active' : ''}} nav-item">
                <a href="{{url('admin/bus')}}">
                    <i class="la la-car"></i>
                    <span class="menu-title" >{{__('lang.manage_bus')}}</span>
                </a>
            </li>



            <li class="{{request()->segment(2) == 'trip' ? 'active' : ''}} nav-item">
                <a href="{{url('admin/trip')}}">
                    <i class="la la-map-o"></i>
                    <span class="menu-title" >{{__('lang.manage_trip')}}</span>
                </a>
            </li>



            <li class="{{request()->segment(2) == 'setting' ? 'active' : ''}} nav-item">
                <a href="{{url('admin/setting')}}">
                    <i class="la la-cogs"></i>
                    <span class="menu-title" >{{__('lang.setting')}}</span>
                </a>
            </li>


                @endif




                <li class="{{request()->segment(2) == 'student' ? 'active' : ''}} nav-item">
                    <a href="{{url('admin/student')}}">
                        <i class="la la-users"></i>
                        <span class="menu-title" >{{__('lang.students')}}</span>
                    </a>
                </li>



            <li class="nav-item">
                <a onclick="$('#logout-form').submit();">
                    <i class="la la-power-off text-danger"></i>
                    <span class="menu-title " >{{__('lang.logout')}}</span>
                </a>
                <form id="logout-form" action="{{url('admin/logout')}}" method="POST">
                    @csrf
                </form>
            </li>







        </ul>
    </div>
</div>
