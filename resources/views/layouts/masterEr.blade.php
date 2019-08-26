<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>GAC</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="{{asset('https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900')}}" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.transitions.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/educate-custon-icon.css')}}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/calendar/fullcalendar.print.min.css')}}">
    <!-- x-editor CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/editor/select2.css')}}">
    <link rel="stylesheet" href="{{asset('css/editor/datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/editor/bootstrap-editable.css')}}">
    <link rel="stylesheet" href="{{asset('css/editor/x-editor-style.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/data-table/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{asset('css/data-table/bootstrap-editable.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <!-- select2 CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/select2/select2.min.css')}}">
    <!-- chosen CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/chosen/bootstrap-chosen.css')}}">

    <!-- ionRangeSlider CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/ionRangeSlider/ion.rangeSlider.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionRangeSlider/ion.rangeSlider.skinFlat.css')}}">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- modernizr JS
        ============================================ -->
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <!-- touchspin CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/touchspin/jquery.bootstrap-touchspin.min.css')}}">
    <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/datapicker/datepicker3.css')}}">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/form/themesaller-forms.css')}}">
    <link rel="stylesheet" href="{{asset('css/form/all-type-forms.css')}}">
    <!-- colorpicker CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/colorpicker/colorpicker.css')}}">
    <!-- select2 CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/select2/select2.min.css')}}">
    <!-- chosen CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/chosen/bootstrap-chosen.css')}}">
    <!-- ionRangeSlider CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/ionRangeSlider/ion.rangeSlider.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionRangeSlider/ion.rangeSlider.skinFlat.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <!-- modals CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/modals.css')}}">
    <!-- dropzone CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/dropzone/dropzone.css')}}"> 

    @yield('script1')
        
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
     <!-- Start Left menu area -->
     <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="{{url('enseignant/groupes/'.$semestre->idSem)}}"><img class="main-logo" src="{{asset('img/logo/logo.png')}}" alt="" style="width:100px;height:100px;" /></a>
                <strong><a href="{{url('enseignant/groupes/'.$semestre->idSem)}}"><img src="" alt="" /></a></strong>
            </div>

            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <br> <br> <br>
                        <li>
                            <a title="Groupes" href="{{url('enseignant/groupes')}}" aria-expanded="false"><span class="educate-icon educate-student icon-wrap" aria-hidden="true"></span> <span class="mini-click-non"> Groupes</span></a>
                        </li>

                        <li>
                            <a class="has-arrow" href="#">
                                <span class="educate-icon educate-library icon-wrap"></span>
                                <span class="mini-click-non">Présence</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Liste du groupe" href="{{url('presence/'.$semestre->idSem)}}"><span class="mini-sub-pro">Liste du groupe</span></a></li>
                                <li><a title="Gestion des justificatifs" href="{{url('justifications/'.$semestre->idSem)}}"><span class="mini-sub-pro">Gestion des justificatifs</span></a></li>
                                <li><a title="Liste des exclus" href="{{url('exclus/'.$semestre->idSem)}}"><span class="mini-sub-pro">Liste des exclus</span></a></li>
                            </ul>
                        </li>

                        <li>
                            <a title="Correction" href="{{url('correction/choix/'.$semestre->idSem)}}" aria-expanded="false"><i class="fa fa-pencil"></i> <span class="mini-click-non"> Correction</span></a>
                        </li>

                        <li>
                            <a title="Correction" href="{{url('gestion/correction/choix/'.$semestre->idSem)}}" aria-expanded="false"><i class="fa fa-calculator" aria-hidden="true"></i> <span class="mini-click-non"> Gestion notes</span></a>
                        </li>

                        <li>
                            <a class="has-arrow" href="#">
                                    <span class="educate-icon educate-course icon-wrap"></span>
								   <span class="mini-click-non">Gestion paquets</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Controle continu" href="{{url('gestion/paquet/controle/'.$semestre->idSem)}}"><span class="mini-sub-pro">Controle continu</span></a></li>
                                <li><a title="Examen" href="{{url('gestion/paquet/examen/'.$semestre->idSem)}}"><span class="mini-sub-pro">Examen</span></a></li>
                            </ul>
                        </li>

                        <li>
                            <a title="Groupes" href="{{url('notes/'.$semestre->idSem)}}" aria-expanded="false"><i class="fa fa-graduation-cap"></i> <span class="mini-click-non"> Notes finales</span></a>
                        </li>

                        <li>
                            <a href="{{url('Emplois_du_Temps_generale/'.$semestre->idSem)}}" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg"></span> <span class="mini-click-non">Emplois du temps</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="{{asset('img/logo/logosn.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse"
                                                class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="educate-icon educate-nav"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        @if(Auth::user()->role == '1')
                                        @include('layouts.enTete')
                                        @endif
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">

                                                <li class="nav-item dropdown">
                                                    <a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle"><i
                                                            class="educate-icon educate-message edu-chat-pro"
                                                            aria-hidden="true"></i>@if(Auth::user()->unreadNotifications->count()>0)
                                                        <span class="indicator-ms"></span>
                                                        @endif
                                                    </a>
                                                    <div role="menu"
                                                        class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <h1>Message</h1>
                                                        </div>
                                                        <ul class="message-menu">


                                                            @foreach(Auth::user()->unreadNotifications as $notification)
                                                            <li style="background-color:#f5f5f5;">
                                                                <a
                                                                    href="{{url('/emails/view/'.$notification->data['id_msg'].'/'.$notification->id)}}">
                                                                    <div class="message-img">
                                                                        <img src="{{asset('img/profile/profil.png')}}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span
                                                                            class="message-date">{{\Carbon\Carbon::parse($notification->created_at)->toFormattedDateString()}}
                                                                        </span>
                                                                        @if(
                                                                        App\User::find($notification->data['id_emt'])->role
                                                                        == 1 or
                                                                        App\User::find($notification->data['id_emt'])->role
                                                                        == 2 )
                                                                        <h2>{{ App\User::find($notification->data['id_emt'])->name}}
                                                                            @endif
                                                                            @if(
                                                                            App\User::find($notification->data['id_emt'])->role
                                                                            == 0 )
                                                                            <h2>{{ App\User::find($notification->data['id_emt'])->etudiant->nom}}
                                                                                @endif
                                                                                @if(
                                                                                App\User::find($notification->data['id_emt'])->role
                                                                                == 3)
                                                                                <h2>{{ App\User::find($notification->data['id_emt'])->enseignant->nom}}
                                                                                    @endif



                                                                                    <span class="label label-danger">
                                                                                        Nouveau</span></h2>
                                                                                @if($notification->data['sujet'])
                                                                                <p>{{ $notification->data['sujet'] }}
                                                                                </p>
                                                                                @else
                                                                                <p>Aucun Sujet</p>
                                                                                @endif
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                            @foreach(Auth::user()->readNotifications->take(1) as
                                                            $notification)
                                                            <li>
                                                                <a
                                                                    href="{{url('/emails/view/'.$notification->data['id_msg'].'/'.$notification->id)}}">
                                                                    <div class="message-img">
                                                                        <img src="{{asset('img/profile/profil.png')}}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span
                                                                            class="message-date">{{\Carbon\Carbon::parse($notification->created_at)->toFormattedDateString()}}
                                                                        </span>
                                                                        <br>
                                                                        @if(
                                                                        App\User::find($notification->data['id_emt'])->role
                                                                        == 1 or
                                                                        App\User::find($notification->data['id_emt'])->role
                                                                        == 2 )
                                                                        <h2>{{ App\User::find($notification->data['id_emt'])->name}}
                                                                            @endif
                                                                            @if(
                                                                            App\User::find($notification->data['id_emt'])->role
                                                                            == 0 )
                                                                            <h2>{{ App\User::find($notification->data['id_emt'])->etudiant->nom}}
                                                                                @endif
                                                                                @if(
                                                                                App\User::find($notification->data['id_emt'])->role
                                                                                == 3)
                                                                                <h2>{{ App\User::find($notification->data['id_emt'])->enseignant->nom}}
                                                                                    @endif



                                                                                    <span class="label label-danger">
                                                                                        Nouveau</span></h2>
                                                                                @if($notification->data['sujet'])
                                                                                <p>{{ $notification->data['sujet'] }}
                                                                                </p>
                                                                                @else
                                                                                <p>Aucun Sujet</p>
                                                                                @endif
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            @endforeach

                                                        </ul>
                                                        <div class="message-view">
                                                            <a href="{{url('/boite_de_reception')}}">Voir tous les messages</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle"><i
                                                            class="educate-icon educate-bell"
                                                            aria-hidden="true"></i><span
                                                            class="indicator-nt"></span></a>
                                                    <div role="menu"
                                                        class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                        <ul class="notification-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="educate-icon educate-checked edu-checked-pro admin-check-pro"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>


                                                        </ul>
                                                        <div class="notification-view">
                                                            <a href="#">View All Notification</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <img src="{{ asset(Auth::user()->photo) }} " alt="" />
                                                        <span class="admin-name">
                                                            @if(Auth::user()->role == '0')

                                                            {{Auth::user()->etudiant->nom}}
                                                            {{Auth::user()->etudiant->prenom}}
                                                            @elseif(Auth::user()->role == '3')

                                                            {{Auth::user()->enseignant->nom}}
                                                            {{Auth::user()->enseignant->prenom}}

                                                            @else

                                                            {{Auth::user()->name}}

                                                            @endif
                                                        </span>
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu"
                                                        class="dropdown-header-top author-log dropdown-menu animated zoomIn">

                                                        <!--nihel-->
                                                        @if(Auth::user()->role == '0'|| Auth::user()->role == '1' ||
                                                        Auth::user()->role == '2')
                                                        <li><a href="{{ url('membre/'.Auth::user()->id.'/details')}}"><span
                                                                    class="edu-icon edu-user-rounded author-log-ic"></span>Mon
                                                                Profile</a>
                                                        </li>
                                                        @elseif(Auth::user()->role == '3')
                                                        <li><a href="{{ url('membreE/'.Auth::user()->id.'/details')}}"><span
                                                                    class="edu-icon edu-user-rounded author-log-ic"></span>Mon
                                                                Profile</a>
                                                        </li>

                                                        @endif

                                                        @if(Auth::user()->role == '0' || Auth::user()->role == '1' ||
                                                        Auth::user()->role == '2')
                                                        <li><a href="{{ url('membre/'.Auth::user()->id.'/edite')}}"><span
                                                                    class="edu-icon edu-settings author-log-ic"></span>Modifier
                                                                mon compte</a>
                                                        </li>
                                                        @elseif(Auth::user()->role == '3')
                                                        <li><a href="{{ url('membreE/'.Auth::user()->id.'/edite')}}"><span
                                                                    class="edu-icon edu-settings author-log-ic"></span>Modifier
                                                                mon compte</a>
                                                        </li>
                                                        @endif
                                                        <!--fin nihel-->
                                                        <!--nihel 19/03/2019-->
                                                        <li> <a href="{{ route('logout') }}"
                                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span
                                                                    class="edu-icon edu-locked author-log-ic"></span>Se
                                                                déconnecter</a>

                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                        <!--fin nihel-->
                                                    </ul>
                                                </li>
                                                @if(Auth::user()->role == '1')
                                                <li class="nav-item nav-setting-open"><a
                                                        href="{{url('admin/parametre') }}" aria-expanded="false"
                                                        class="nav-link dropdown-toggle"><i
                                                            class="educate-icon educate-settings"></i></a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                            <li><a href="{{url('enseignant/groupes')}}">Groupes</a></li>
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Présence <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="{{url('presence/'.$semestre->idSem)}}">Liste du groupe</a></li>
                                                <li><a href="{{url('justifications/'.$semestre->idSem)}}">Gestion des justificatifs</a></li>
                                                <li><a href="{{url('exclus/'.$semestre->idSem)}}">Liste des exclus</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{url('correction/choix/'.$semestre->idSem)}}">Correction</a></li>
                                        <li><a href="{{url('gestion/correction/choix/'.$semestre->idSem)}}">Gestion notes</a></li>
                                        <li><a data-toggle="collapse" data-target="#demopro" href="#">Gestion paquets <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demopro" class="collapse dropdown-header-top">
                                                <li><a href="{{url('gestion/paquet/controle/'.$semestre->idSem)}}">Controle continu</a>
                                                </li>
                                                <li><a href="{{url('gestion/paquet/examen/'.$semestre->idSem)}}">Examen</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="{{url('Emplois_du_Temps_generale/'.$semestre->idSem)}}">Emplois du temps <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Dashboard</a> <span class="bread-slash">/</span>
                                            </li>
                                            @yield('path')
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>

    <!-- jquery
		============================================ -->
    <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{asset('js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{asset('js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{asset('js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{asset('js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- data table JS
		============================================ -->
    <script src="{{asset('js/data-table/bootstrap-table.js')}}"></script>
    <script src="{{asset('js/data-table/tableExport.js')}}"></script>
    <script src="{{asset('js/data-table/data-table-active.js')}}"></script>
    <script src="{{asset('js/data-table/bootstrap-table-editable.js')}}"></script>
    <script src="{{asset('js/data-table/bootstrap-editable.js')}}"></script>
    <script src="{{asset('js/data-table/bootstrap-table-resizable.js')}}"></script>
    <script src="{{asset('js/data-table/colResizable-1.5.source.js')}}"></script>
    <script src="{{asset('js/data-table/bootstrap-table-export.js')}}"></script>
    <!--  editable JS
		============================================ -->
    <script src="{{asset('js/editable/jquery.mockjax.js')}}"></script>
    <script src="{{asset('js/editable/mock-active.js')}}"></script>
    <script src="{{asset('js/editable/select2.js')}}"></script>
    <script src="{{asset('js/editable/moment.min.js')}}"></script>
    <script src="{{asset('js/editable/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('js/editable/bootstrap-editable.js')}}"></script>
    <script src="{{asset('js/editable/xediable-active.js')}}"></script>
    <!-- Charts JS
    ============================================ -->
    <script src="{{asset('js/charts/Chart.js')}}"></script>
    <script src="{{asset('js/charts/rounded-chart.js')}}"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{asset('js/tab.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('js/main.js')}}"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="{{asset('js/tawk-chat.js')}}"></script>
    <!-- select2 JS
		============================================ -->
    <script src="{{asset('js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('js/select2/select2-active.js')}}"></script>
    <!-- chosen JS
		============================================ -->
    <script src="{{asset('js/chosen/chosen2.jquery.js')}}"></script>
    <script src="{{asset('js/chosen/chosen-active.js')}}"></script>

    <!-- touchspin JS
        ============================================ -->
    <script src="{{asset('js/touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
    <script src="{{asset('js/touchspin/touchspin-active.js')}}"></script>
    <!-- colorpicker JS
        ============================================ -->
    <script src="{{asset('js/colorpicker/jquery.spectrum.min.js')}}"></script>
    <script src="{{asset('js/colorpicker/color-picker-active.js')}}"></script>
    <!-- datapicker JS
        ============================================ -->
    <script src="{{asset('js/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/datapicker/datepicker-active.js')}}"></script>
    <!-- input-mask JS
        ============================================ -->
    <script src="{{asset('js/input-mask/jasny-bootstrap.min.js')}}"></script>
    <!-- ionRangeSlider JS
        ============================================ -->
    <script src="{{asset('js/ionRangeSlider/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('js/ionRangeSlider/ion.rangeSlider.active.js')}}"></script>
    <!-- rangle-slider JS
        ============================================ -->
    <script src="{{asset('js/rangle-slider/jquery-ui-1.10.4.custom.min.js')}}"></script>
    <script src="{{asset('js/rangle-slider/jquery-ui-touch-punch.min.js')}}"></script>
    <script src="{{asset('js/rangle-slider/rangle-active.js')}}"></script>
    <!-- knob JS
        ============================================ -->
    <script src="{{asset('js/knob/jquery.knob.js')}}"></script>
    <script src="{{asset('js/knob/knob-active.js')}}"></script>
    <!-- morrisjs JS
    ============================================ -->
    <script src="{{asset('js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('js/sparkline/jquery.charts-sparkline.js')}}"></script>
    <script src="{{asset('js/sparkline/sparkline-active.js')}}"></script>
    <!-- calendar JS
    ============================================ -->
    <script src="{{asset('js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('js/calendar/fullcalendar-active.js')}}"></script>
    <!-- pdf JS
    ============================================ -->
    <script src="{{asset('js/pdf/jquery.media.js')}}"></script>
    <script src="{{asset('js/pdf/pdf-active-1.js')}}"></script>

    @yield('script2')
      
        
</body>

</html>