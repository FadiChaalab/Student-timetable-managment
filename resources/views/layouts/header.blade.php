<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="{{url('/home')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('images/logo.svg')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('images/logo-dark.png')}}" alt="" height="17">
                    </span>
                </a>

                <a href="{{url('/home')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('images/logo-sm.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('images/logo-light.png')}}" alt="" height="24">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <div class="d-flex">
            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="fa fa-search"></span>
                </div>
            </form>

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-md-block ml-2">
                <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="mr-2" src="{{asset('images/flags/us_flag.jpg')}}" alt="Header Language" height="16">
                    English <span class="mdi mdi-chevron-down"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('images/flags/italy_flag.jpg')}}" alt="user-image" class="mr-1" height="12">
                        <span class="align-middle"> Italian </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('images/flags/french_flag.jpg')}}" alt="user-image" class="mr-1" height="12">
                        <span class="align-middle"> French </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('images/flags/spain_flag.jpg')}}" alt="user-image" class="mr-1" height="12">
                        <span class="align-middle"> Spanish </span>
                    </a>

                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="mdi mdi-bell-outline"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (Auth::user()->id_role == 1)
                    <img class="rounded-circle header-profile-user" src="{{ Auth::user()->avatar ? asset('storage/uploads/admins/avatars/'.Auth::user()->avatar) : asset('images/users/user-4.jpg')}}"
                        alt="Header Avatar">
                    @endif
                    @if (Auth::user()->id_role == 2)
                    <img class="rounded-circle header-profile-user" src="{{ Auth::user()->avatar ? asset('storage/uploads/students/avatars/'.Auth::user()->avatar) : asset('images/users/user-4.jpg')}}"
                        alt="Header Avatar">
                    @endif
                    @if (Auth::user()->id_role == 3)
                    <img class="rounded-circle header-profile-user" src="{{ Auth::user()->avatar ? asset('storage/uploads/teachers/avatars/'.Auth::user()->avatar) : asset('images/users/user-4.jpg')}}"
                        alt="Header Avatar">
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    @if (Auth::user()->id_role == 1)
                    <a class="dropdown-item" href="{{url('/admin/profile')}}"><i
                            class="mdi mdi-account-circle font-size-17 align-middle mr-1"></i> Profile</a>
                    @endif
                    @if (Auth::user()->id_role == 2)
                    <a class="dropdown-item" href="{{url('/student/profile')}}"><i
                            class="mdi mdi-account-circle font-size-17 align-middle mr-1"></i> Profile</a>
                    @endif
                    @if (Auth::user()->id_role == 3)
                    <a class="dropdown-item" href="{{url('/teacher/profile')}}"><i
                            class="mdi mdi-account-circle font-size-17 align-middle mr-1"></i> Profile</a>
                    @endif
                    
                    <a class="dropdown-item d-block" href="#"><i class="mdi mdi-settings font-size-17 align-middle mr-1"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    @if (Auth::user()->id_role == 1)
                    <form action="{{url('/admin/logout')}}" method="post">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit"><i
                            class="bx bx-power-off font-size-17 align-middle mr-1 text-danger"></i> Logout</button>
                    </form>
                    @endif
                    @if (Auth::user()->id_role == 2)
                    <form action="{{url('/student/logout')}}" method="post">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit"><i
                            class="bx bx-power-off font-size-17 align-middle mr-1 text-danger"></i> Logout</button>
                    </form>
                    @endif
                    @if (Auth::user()->id_role == 3)
                    <form action="{{url('/teacher/logout')}}" method="post">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit"><i
                            class="bx bx-power-off font-size-17 align-middle mr-1 text-danger"></i> Logout</button>
                    </form>
                    @endif
                    
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect">
                    <i class="mdi mdi-settings-outline"></i>
                </button>
            </div>

        </div>
    </div>
</header>