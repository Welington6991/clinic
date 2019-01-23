<!DOCTYPE html>
<html lang="en" xml:lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">

    <title>Painel - {{ $title }}</title>

    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.0.1/sweetalert.min.css" >
    <link href="<?= url('assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css') ?>" rel="stylesheet">
    <link href="<?= url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= url('assets/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?= url('assets/vendors/datatables/media/css/datatables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?= url('assets/vendors/icomoon-bower/style.css') ?>" rel="stylesheet">

    <link href="<?= url('assets/css/painel/space.min.css') ?>" rel="stylesheet">
    <link href="<?= url('assets/css/painel/main.css') ?>" rel="stylesheet">

</head>

<body class="page-sidebar-fixed">
    <div class="page-container">
        <div class="page-sidebar">
            <div class="logo-box">
                <i class="icon-close" id="sidebar-toggle-button-close"></i>
            </div>
            <div class="page-sidebar-inner">
                <div class="page-sidebar-menu">
                    <ul class="accordion-menu">
                        <li class="text-center li-bordered">
                            <a href="{{ route('home') }}" title="Image user">
                                <img src="<?= url('assets/images/painel/user.png') ?>" alt="" class="imgUserSidebar
                            img-circle" />
                            </a>
                            <p class="client">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="enterprise">Clinic</p>
                            <span class="iconsusers">
                                <div class="row">
                                    <div class="col-xs-offset-3 col-xs-2 iconshover">
                                        <a href="{{ route('userFormEdit', ['id' => Auth::user()->id]) }}" title="Edit user"><i class="fa fa-cog"></i></a>
                                    </div>
                                    <div class="col-xs-2 iconshover">
                                        <a href="{{ route('home') }}" title="Home"><i class="fa fa-home"></i></a>
                                    </div>
                                    <div class="col-xs-2 iconshover">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" title="Logout"><i
                                                class="fa fa-plug "></i></a>
                                    </div>
                                </div>
                            </span>
                        </li>

                        <li class="liMenu iconshover">
                            <a href="{{ route('home') }}" title="Home">
                                <i class="menu-icon {{ $active == 'home' ? 'active' : null }} fa fa-home"></i><span>Home</span>
                            </a>
                        </li>
                        <li class="liMenu iconshover">
                            <a href="{{ route('users') }}" title="Users">
                                <i class="menu-icon {{ $active == 'users' ? 'active' : null }} fa fa-users"></i><span>Users</span>
                            </a>
                        </li>
                        <li class="liMenu iconshover">
                            <a href="{{ route('patients') }}" title="Patients">
                                <i class="menu-icon {{ $active == 'patients' ? 'active' : null }} fa fa-stethoscope"></i><span>Patients</span>
                            </a>
                        </li>
                        <li class="liMenu iconshover">
                            <a href="{{ route('doctors') }}" title="Doctors">
                                <i class="menu-icon {{ $active == 'doctors' ? 'active' : null }} fa fa-user-md"></i><span>Doctors</span>
                            </a>
                        </li>
                        <li class="liMenu iconshover">
                            <a href="{{ route('schedules') }}" title="Schedules">
                                <i class="menu-icon {{ $active == 'schedules' ? 'active' : null }} fa fa-calendar"></i><span>Schedules</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="page-content">
            <div class="page-header">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <div class="logo-sm buttonMenu">
                                <a href="javascript:void(0)" id="sidebar-toggle-button" style="font-size: 20px;"><i
                                        class="fa fa-bars"></i></a>
                                <a class="logo-box" href="#"><span>Clinic</span></a>
                            </div>
                            <div class="userMobile">
                                <a href="#" id="openUserMobile">
                                    <i class="fa fa-angle-down iconMenuUser"></i>
                                    <img src="<?= url('assets/images/painel/user.png') ?>" alt="Image user" class="img-circle" title="Image user">
                                </a>
                                <div class="userMobileOpen">
                                    <div class="userMobileInfos">
                                        <img src="<?= url('assets/images/painel/user.png') ?>" alt="Image user" class="img-circle" title="Image user">
                                        <span>{{ Auth::user()->name }}</span>
                                        <div class="optionInfoUser">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                                class="btn btn-danger optionLogout" title="Logout">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="javascript:void(0)" id="collapsed-sidebar-toggle-button"><i class="fa fa-toggle-on icone-menu-retratil iconshover2"></i></a></li>
                                <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="fa fa-expand icone-expand iconshover2"></i></a></li>
                                <li class="logout">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        class="optionLogout" title="Logout">
                                        <i class="fa fa-plug"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown user-dropdown">
                                    <a href="#" id="colapseMenuUser" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-angle-down iconMenuUser"></i> &nbsp; Hello, {{
                                        Auth::user()->name
                                        }} &nbsp; &nbsp; &nbsp;<img src="<?= url('assets/images/painel/user.png'); ?>"
                                            alt="" class="img-circle"></a>
                                    <ul class="dropdown-menu" style="width: 100%">
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" title="Logout">
                                                <i class="fa fa-plug"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>