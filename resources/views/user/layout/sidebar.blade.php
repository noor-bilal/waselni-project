<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">




            <li class="{{request()->segment(1) == 'appointment' ? 'active' : ''}} nav-item">
                <a href="{{url('appointment')}}">
                    <i class="la la-car"></i>
                    <span class="menu-title" >{{__('lang.appointment')}}</span>
                </a>
            </li>


            <li class="{{request()->segment(1) == 'my_point' ? 'active' : ''}} nav-item">
                <a href="{{url('my_point')}}">
                    <i class="la la-money"></i>
                    <span class="menu-title" >{{__('lang.my_point')}}</span>
                </a>
            </li>



{{--            <li class="{{request()->segment(1) == 'profile' ? 'active' : ''}} nav-item">--}}
{{--                <a href="{{url('profile')}}">--}}
{{--                    <i class="la la-user"></i>--}}
{{--                    <span class="menu-title" >{{__('lang.my_profile')}}</span>--}}
{{--                </a>--}}
{{--            </li>--}}



            <li class="{{request()->segment(1) == 'about_us' ? 'active' : ''}} nav-item">
                <a href="{{url('about_us')}}">
                    <i class="la la-info-circle"></i>
                    <span class="menu-title" >{{__('lang.about_us')}}</span>
                </a>
            </li>


            <li class="nav-item">
                <a onclick="$('#logout-form').submit();">
                    <i class="la la-power-off text-danger"></i>
                    <span class="menu-title " >{{__('lang.logout')}}</span>
                </a>
                <form id="logout-form" action="{{url('logout')}}" method="POST">
                    @csrf
                </form>
            </li>


        </ul>
    </div>
</div>
