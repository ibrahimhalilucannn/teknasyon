<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Teknasyon Yazılım </title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="{{asset('public/css/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/inovatechsoft.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/application.min.css')}}">
</head>
<body class="layout layout-header-fixed">
<div class="layout-header">
    <div class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand navbar-brand-center" href="index.html">
                Teknasyon Yazılım
            </a>
            <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
                <span class="sr-only">Toggle navigation</span>
                <span class="bars">
              <span class="bar-line bar-line-1 out"></span>
              <span class="bar-line bar-line-2 out"></span>
              <span class="bar-line bar-line-3 out"></span>
            </span>
                <span class="bars bars-x">
              <span class="bar-line bar-line-4"></span>
              <span class="bar-line bar-line-5"></span>
            </span>
            </button>
            <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="arrow-up"></span>
                <span class="ellipsis ellipsis-vertical">
              <img class="ellipsis-object" width="32" height="32" src="img/0180441436.jpg" alt="Teddy Wilson">
            </span>
            </button>
        </div>
        <div class="navbar-toggleable">
            <nav id="navbar" class="navbar-collapse collapse">
                <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="bars">
                <span class="bar-line bar-line-1 out"></span>
                <span class="bar-line bar-line-2 out"></span>
                <span class="bar-line bar-line-3 out"></span>
                <span class="bar-line bar-line-4 in"></span>
                <span class="bar-line bar-line-5 in"></span>
                <span class="bar-line bar-line-6 in"></span>
              </span>
                </button>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
                            <img class="circle" width="36" height="36" src="{{asset('public/img/logo.png')}}" alt="Teknasyon Yazılım"> Teknasyon Yazılım
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">

                            <li><a href="{{URL::to('/logout')}}">Logout</a></li>
                        </ul>
                    </li>

                </ul>

            </nav>
        </div>
    </div>
</div>
<div class="layout-main">
    <div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
            <div class="custom-scrollbar">
                <nav id="sidenav" class="sidenav-collapse collapse">
                    <ul class="sidenav level-1">
                        <li class="sidenav-heading">Navigation</li>
                        <li class="sidenav-item {{ Request::segment(1) === 'users' ? 'active' : '' }}">
                            <a href="{{URL::to('users')}}">
                                <span class="sidenav-icon icon icon-works">&#103;</span>
                                <span class="sidenav-label">Kullanıcılar</span>
                            </a>
                        </li>
                        <li class="sidenav-item {{ Request::segment(1) === 'languages' ? 'active' : '' }}">
                            <a href="{{URL::to('languages')}}">
                                <span class="sidenav-icon icon icon-works">&#103;</span>
                                <span class="sidenav-label">Diller</span>
                            </a>
                        </li>
                        <li class="sidenav-item {{ Request::segment(1) === 'versions' ? 'active' : '' }}">
                            <a href="{{URL::to('versions')}}">
                                <span class="sidenav-icon icon icon-works">&#103;</span>
                                <span class="sidenav-label">Versiyonlar</span>
                            </a>
                        </li>
                        <li class="sidenav-item {{ Request::segment(1) === 'projects' ? 'active' : '' }}">
                            <a href="{{URL::to('projects')}}">
                                <span class="sidenav-icon icon icon-works">&#103;</span>
                                <span class="sidenav-label">Projeler</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="layout-content">
        <div class="layout-content-body">
            @yield('content')
        </div>
    </div>
    <div class="layout-footer">
        <div class="layout-footer-body">
            <small class="version">Version 1.4.0</small>
            <small class="copyright">2018 &copy;  <a href="#">İbrahim Halil Uçan</a></small>
        </div>
    </div>
</div>
<script src="{{asset('public/js/vendor.min.js')}}"></script>
<script src="{{asset('public/js/inovatechsoft.min.js')}}"></script>
<script src="{{asset('public/js/application.min.js')}}"></script>
<script src="{{asset('public/js/demo.min.js')}}"></script>

@if (session()->has('insert'))
    <script type="text/javascript">
        toastr.success("{{session()->get('insert')}}", "{{trans('teknasyon/alert.info_success')}}");
    </script>
@endif

@if (session()->has('update'))
    <script type="text/javascript">
        toastr.success("{{session()->get('update')}}", "{{trans('teknasyon/alert.info_success')}}");
    </script>
@endif

@if (session()->has('error'))
    <script type="text/javascript">
        toastr.error("{{session()->get('error')}}", "{{trans('teknasyon/alert.info_error')}}");
    </script>
@endif

@if (session()->has('permission'))
    <script type="text/javascript">
        toastr.error("{{session()->get('permission')}}", "{{trans('teknasyon/alert.info_error')}}");
    </script>
@endif

@if (session()->has('status_danger'))
    <script type="text/javascript">
        toastr.error("{{session()->get('status_danger')}}", "{{trans('teknasyon/alert.info_error')}}");
    </script>
@endif


</body>

</html>