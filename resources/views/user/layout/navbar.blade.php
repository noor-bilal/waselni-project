<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{url('home')}}">
                        <img class="brand-logo" alt="LOGO" src="{{avatar('logo.png')}}">
                        <h3 class="brand-text">{{env('APP_NAME')}}</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">

                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon {{direction() == 'ar' ? 'flag-icon-jo' : 'flag-icon-gb'}} "></i>
                            <span class="selected-language"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item" href="{{url('language/en')}}"><i class="flag-icon flag-icon-gb"></i> {{__('lang.english')}}</a>
                            <a class="dropdown-item" href="{{url('language/ar')}}"><i class="flag-icon flag-icon-jo"></i> {{__('lang.arabic')}}</a>
                        </div>
                    </li>

                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1">
                                <span class="user-name text-bold-700">{{auth()->user()->name}}</span>
                            </span>
                            <span class="avatar avatar-online">
                                <img src="{{empty(auth()->user()->image) ? avatar('user.png') : asset(auth()->user()->image)}}" alt="avatar">
                                <i></i>
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">
                                <i class="ft-user"></i>
                                {{__('lang.my_profile')}}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" onclick="$('#logout-form').submit();">
                                <i class="ft-power"></i>
                                {{__('lang.logout')}}
                            </a>
                            <form id="logout-form" action="{{url('logout')}}" method="POST">
                                @csrf
                            </form>

                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
