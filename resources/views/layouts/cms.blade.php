
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Administration')</title>
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('dashboard_style/css/light-bootstrap-dashboard.css?v=2.0.0')}} " rel="stylesheet" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
   
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="{{asset('dashboard_style/img/sidebar-5.jpg')}}">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text" style="background-color: white;border-radius: 10px;">
                        <img height="80px" src="{{ asset('img/logo.PNG')}}" alt="Logo">
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item @if(Request::url()==route('cmsWatch')) active @endif">
                        <a class="nav-link" href="{{Route('cmsWatch')}}">
                            <i class="nc-icon nc-cctv"></i>
                            <p>Je regarde</p>
                        </a>
                    </li>
                    <li class="av-item @if(Request::url()==route('cmsRead')) active @endif">
                        <a class="nav-link" href="{{Route('cmsRead')}}">
                            <i class="nc-icon nc-paper-2"></i>
                            <p> Je lis </p>
                        </a>
                    </li>
                    <li class="nav-item @if(Request::url()==route('cmsLearn')) active @endif">
                            <a class="nav-link" href="{{Route('cmsLearn')}}">
                                <i class="nc-icon nc-ruler-pencil"></i>
                                <p>J'apprends </p>
                            </a>
                        </li>
                    <li class="nav-item @if(Request::url()==route('cmsPlay')) active @endif">
                        <a class="nav-link" href="{{Route('cmsPlay')}}">
                            <i class="nc-icon nc-controller-modern"></i>
                            <p>Je joue </p>
                        </a>
                    </li>
                    <li class="nav-item @if(Request::url()==Route('cmsDiy')) active @endif">
                        <a class="nav-link" href="{{Route('cmsDiy')}}">
                            <i class="nc-icon nc-scissors"></i>
                            <p>DIY </p>
                        </a>
                    </li>

                    <li class="nav-item @if(Request::url()==Route('cmsAdmins')) active @endif">
                        <a class="nav-link" href="{{Route('cmsAdmins')}}">
                            <i class="nc-icon nc-badge"></i>
                            <p>Admins</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                
            </footer>
        </div>
    </div>
 
</body>
<!--   Core JS Files   -->
<script src="{{ asset('js/app.js') }}" ></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>

<script src="{{asset('dashboard_style/js/plugins/bootstrap-switch.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{asset('dashboard_style/js/plugins/bootstrap-notify.js')}}"></script>

<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{asset('dashboard_style/js/light-bootstrap-dashboard.js?v=2.0.0')}} " type="text/javascript"></script>

@yield('script')
</html>