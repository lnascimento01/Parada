<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Parada 351</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <link rel="stylesheet" href="{{ elixir('css/bootstrap/css/bootstrap.min.css') }}" media="all" type="text/css" />
        <link rel="stylesheet" href="{{ elixir('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ elixir('css/paper-dashboard.css') }}">
        <link rel="stylesheet" href="{{ elixir('css/demo.css') }}">
        <link rel="stylesheet" href="{{ elixir('css/default.css') }}">
        <link rel="stylesheet" href="{{ elixir('css/font-asome/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ elixir('js/bootdialog/src/css/bootstrap-dialog.css') }}">
        <link rel="stylesheet" href="{{ elixir('css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ elixir('css/dataTables.css') }}">
        <link rel="stylesheet" href="{{ elixir('css/bootstrap-dialog.css') }}">

        <!--  Fonts and icons     -->
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ elixir('css/themify-icons.css') }}">

    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-background-color="black" data-active-color="danger">
{{ csrf_field() }}
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="" class="simple-text">
                            @yield('title')
                        </a>
                    </div>

                    <ul class="nav">
                        @foreach ($listaMenus as $menu)
                        <li @if ($menu->id == $ativo) class="active" @endif >
                             <a href="{{$menu->url }}">
                                <i class="fa {{ $menu->icone }}"></i>
                                <p>{{ $menu->nome }}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar bar1"></span>
                                <span class="icon-bar bar2"></span>
                                <span class="icon-bar bar3"></span>
                            </button>
                            <a class="navbar-brand" href="#">Painel</a>
                        </div>
<!--                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="ti-panel"></i>
                                        <p>Stats</p>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="ti-bell"></i>
                                        <p class="notification">5</p>
                                        <p>Notifications</p>
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Notification 1</a></li>
                                        <li><a href="#">Notification 2</a></li>
                                        <li><a href="#">Notification 3</a></li>
                                        <li><a href="#">Notification 4</a></li>
                                        <li><a href="#">Another notification</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-settings"></i>
                                        <p>Settings</p>
                                    </a>
                                </li>
                            </ul>

                        </div>-->
                    </div>
                </nav>
                <div>            
                    @yield('content')
                </div>
                <footer>

                    <!-- Core JS Files   -->
                    <!--<script type="text/javascript" src="{{ URL::asset('js/jquery-1.10.2.js') }}"></script>-->
                    <script type="text/javascript" src="{{ URL::asset('css/bootstrap/js/bootstrap.min.js') }}"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-checkbox-radio.js') }}"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/chartist.min.js') }}"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-notify.js') }}"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/paper-dashboard.js') }}"></script>
                    <!--<script type="text/javascript" src="{{ URL::asset('js/jquery-ui/jquery-ui.js') }}"></script>-->
                    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-checkbox-radio.js') }}"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/jquery.mask.js') }}"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/bootdialog/src/js/bootstrap-dialog.js') }}"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/default.js') }}"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-dialog.js') }}"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-notify.js') }}"></script>
                </footer>
            </div>
    </body>