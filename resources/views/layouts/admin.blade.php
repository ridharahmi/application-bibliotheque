<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Styles -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
</head>
<body class="sidebar-is-reduced">
<header class="l-header">
    <li class="l-header__inner clearfix">
        <div class="c-header-icon js-hamburger">
            <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span
                        class="bar-bot"></span></div>
        </div>
        <div class="c-header-icon has-dropdown">
            <i class="fa fa-bell"></i>
            <div class="c-dropdown c-dropdown--notifications">
                <div class="c-dropdown__header"></div>
                <div class="c-dropdown__content"></div>
            </div>
        </div>
        <div class="c-search">
            <input class="c-search__input u-input" placeholder="Search..." type="text"/>
        </div>
        <div class="header-icons-group">
            <div class="c-header-icon" style="width: 230px;">
                <i class="fa fa-user fa-fw"></i>
                {{ Auth::user()->name }}
            </div>
            <div class="c-header-icon logout">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        </div>
</header>
<div class="l-sidebar">
    <div class="logo">
        <div class="logo__txt"><i class="fa fa-book"></i></div>
    </div>
    <div class="l-sidebar__content">
        <nav class="c-menu js-menu">
            <ul class="u-list">
                <li class="c-menu__item" data-toggle="tooltip" title="Flights">
                    <div class="c-menu__item__inner"><a href="{{ url('admin') }}"><i class="fa fa-cog"></i></a>
                        <div class="c-menu-item__title"><a href="{{ url('admin') }}"><span>Profile</span></a></div>
                    </div>
                </li>
                <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Statistics">
                    <div class="c-menu__item__inner"><a><i class="fa fa-users"></i></a>
                        <div class="c-menu-item__title"><a href="{{ url('GestionMembre') }}"><span>Membres</span></a></div>
                    </div>
                </li>
                <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Settings">
                    <div class="c-menu__item__inner"><a href="{{ url('GestionLivres') }}"><i class="fa fa-book"></i></a>
                        <div class="c-menu-item__title"><a href="{{ url('GestionLivres') }}"><span>Livres</span></a></div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<main class="l-main">
    <div class="content-wrapper content-wrapper--with-bg">
        <div class="page-content">
            @yield('content')
        </div>
    </div>
</main>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src='https://use.fontawesome.com/2188c74ac9.js'></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
