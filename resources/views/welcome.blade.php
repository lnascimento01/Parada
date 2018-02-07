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

        <link href="{!! asset('bootstrap/js/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
<!--<script type="text/javascript" src="{{ URL::asset('css/bootstrap/js/bootstrap.min.css') }}"></script>-->
<script type="text/javascript" src="{{ URL::asset('css/animate.min.css') }}"></script>
<script type="text/javascript" src="{{ URL::asset('css/paper-dashboard.css') }}"></script>
<script type="text/javascript" src="{{ URL::asset('css/demo.css') }}"></script>
<script type="text/javascript" src="{{ URL::asset('css/default.css') }}"></script>
<script type="text/javascript" src="{{ URL::asset('css/font-asome/css/font-awesome.css') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootdialog/src/css/bootstrap-dialog.css') }}"></script>
        <!--  Fonts and icons     -->
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="{{ URL::asset('css/themify-icons.css') }}"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-background-color="black" data-active-color="danger">

                <!--
                            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
                            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
                -->

                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="" class="simple-text">
                           {$company}
                        </a>
                    </div>

                    <ul class="nav">
                        <li>
                            <a href="/">
                                <i class="ti-panel"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <li>
                            <a href="typography.html">
                                <i class="ti-text"></i>
                                <p>Typography</p>
                            </a>
                        </li>
                        <li>
                            <a href="icons.html">
                                <i class="ti-pencil-alt2"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li>
                            <a href="maps.html">
                                <i class="ti-map"></i>
                                <p>Maps</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ti-bell"></i>
                                <p>Notificações</p>
                            </a>
                        </li>
                        <li class="active-pro">
                            <a href="upgrade.html">
                                <i class="ti-export"></i>
                                <p>Upgrade to PRO</p>
                            </a>
                        </li>
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
                            <a class="navbar-brand" href="#">User Profile</a>
                        </div>
                        <div class="collapse navbar-collapse">
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

                        </div>
                    </div>
                </nav>
                <div>
                 
                </div>
                <footer>
                </footer>
            </div>
    </body>
        <!-- Core JS Files   -->
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.10.2.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('css/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-checkbox-radio.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/chartist.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-notify.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/paper-dashboard.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-ui/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-checkbox-radio.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.mask.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootdialog/src/js/bootstrap-dialog.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/default.js') }}"></script>