<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin.Shefat</title>
    <link rel="icon" type="image/png" sizes="20x20" href="{{asset('')}}/icon2.png">
    <link href="{{asset('contents/admin/assets')}}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    @stack('css_plugin')
    <link href="{{asset('contents/admin')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('contents/admin')}}/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="{{asset('contents/admin')}}/css/own-style.css" id="theme" rel="stylesheet">
    <script src="{{asset('contents/admin')}}/js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="{{asset('contents/admin')}}/custom.css">
</head>

<body class="fix-header fix-sidebar card-no-border">
    {{-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div> --}}
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" style="background:#444444; border-right:1px solid gray;">
                    <a class="navbar-brand" href="{{route('admin_index')}}" >
                        <b>
                            @php
                                // $logo=App\frontlogo::where('id',1)->firstOrFail();
                            @endphp
                            {{-- <img src="{{asset('uploads')}}/{{$logo->name}}" alt="homepage" class="dark-logo" /> --}}
                            {{-- <img src="{{asset('contents/admin/assets')}}/images/logo-light-icon.png" alt="homepage" class="light-logo" /> --}}
                        </b>
                        <span>
                         <img src="{{asset('')}}/icon2.png" alt="homepage" class="dark-logo" />
                       </span>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="#"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox animated slideInUp">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <a href="index.html#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox animated slideInUp" aria-labelledby="2">
                                <ul>
                                    <li>
                                        @php
                                            $count=App\contact_message::where('status',1)->count();
                                        @endphp
                                        <div class="drop-title">You have {{$count}} new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            @php
                                                $select=App\contact_message::where('status',1)->get();
                                            @endphp
                                            @foreach ($select as $item)
                                            <a href="{{route('message_view',$item->slug)}}">
                                                    <div class="user-img">
                                                        <img src="{{asset('contents/admin/assets')}}/images/users/1.jpg" alt="user" class="img-circle">
                                                        <span class="profile-status online pull-right"></span>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h5>{{$item->name}}</h5>
                                                        <span class="mail-desc">{{$item->message}}</span>
                                                        <span class="time">{{$item->created_at}}</span>
                                                    </div>
                                                </a>
                                            @endforeach

                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="{{route("message_index")}}"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-bd"></i></a>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('')}}{{ Auth::user()->photo }}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{asset('')}}{{ Auth::user()->photo }}" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p><a href="{{route('user_profile',Auth::user()->slug)}}" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{route('user_profile',Auth::user()->slug)}}"><i class="ti-user"></i> My Profile</a></li>
                                    {{-- <li><a href="index.html#"><i class="ti-wallet"></i> My Balance</a></li> --}}
                                    <li><a href="{{route('message_index')}}"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{route('user_settings',Auth::user()->slug)}}"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <div class="user-profile">
                    <div class="profile-img"> <img class="img-fluid" src="{{asset('')}}{{Auth::user()->photo}}" alt="user" />
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <div class="profile-text">
                        <h5>{{ Auth::user()->name }} </h5>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                        <a href="{{route('message_index')}}" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                        <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <div class="dropdown-menu animated flipInY">
                            <a href="{{route('user_profile',Auth::user()->slug)}}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <a href="{{route('message_index')}}" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('user_settings',Auth::user()->slug)}}" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                @include('layouts.nav')
            </div>
        </aside>

            @yield('contents')

        </div>
            <footer class="footer"> © 2019 admin panel. Developed by Md Shefat. </footer>
        </div>
    </div>
    <script src="{{asset('contents/admin/assets')}}/plugins/bootstrap/js/slim.min.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/jquery/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"> --}}
    <script src="{{asset('contents/admin/assets')}}/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/bootstrap/js/feather.min.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/bootstrap/js/eva.min.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/jquery.slimscroll.js"></script>
    <script src="{{asset('contents/admin')}}/js/waves.js"></script>
    <script src="{{asset('contents/admin')}}/js/sidebarmenu.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/custom.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/app.js"></script>
    @stack('js_plugin')
    <script src="{{asset('contents/admin')}}/js/datatables.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/validation.js"></script>
    <script src="{{asset('contents/admin')}}/custom.js"></script>
    {{-- <script src="{{asset('contents/admin')}}/js/ajax.js"></script> --}}
    <script src="{{asset('contents/admin')}}/js/ajaxCrud.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
</body>

</html>
