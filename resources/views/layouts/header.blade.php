<html class="no-js" lang="en">

<head>
     <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('meta')
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
    <link rel="stylesheet" href="{{asset('css/c3/c3.min.css')}}">
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.transitions.css')}}">
     <!-- summernote CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('css/summernote/summernote.css')}}">
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
   
    <!-- x-editor CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/editor/select2.css')}}">


     <link rel="stylesheet" href="{{asset('css/tabs.css')}}">
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
   
    <link rel="stylesheet" href="{{asset('css/form/themesaller-forms.css')}}">
    
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
    <!-- dropzone CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('css/dropzone/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('css/modals.css')}}">
    <link rel="stylesheet" href="{{asset('css/form/all-type-forms.css')}}">
 
<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
@yield('js') 
</head>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Start Left menu area -->
 @yield('sidebar')   
     
<div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br>
                    <div class="logo-pro">
                       <br><br>
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
 <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
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
                 <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i>@if(Auth::user()->unreadNotifications->where('type','App\Notifications\MsgNotification')->count()>0)
                                                        <span class="indicator-ms"></span>
                                                    @endif
                                                </a>
                                                    <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <h1>Message</h1>
                                                        </div>
                                                        <ul class="message-menu">

                                           
                        @foreach(Auth::user()->unreadNotifications->where('type','App\Notifications\MsgNotification') as $notification)
                                          <li style="background-color:#f5f5f5;">
                <a 
            href="{{url('/emails/view/'.$notification->data['id_msg'].'/'.$notification->id)}}">
                                  <div class="message-img">
                                   <img src="{{asset('img/contact/2.jpg')}}" alt="">
                                                                    </div>
                                <div class="message-content">
   <span class="message-date">{{\Carbon\Carbon::parse($notification->created_at)->toFormattedDateString()}}
   </span>
   @if( App\User::find($notification->data['id_emt'])->role == 1 or App\User::find($notification->data['id_emt'])->role == 2 )
                        <h2>{{ App\User::find($notification->data['id_emt'])->name}}
   @endif
   @if( App\User::find($notification->data['id_emt'])->role == 0 )
                        <h2>{{ App\User::find($notification->data['id_emt'])->etudiant->nom}}
   @endif
   @if( App\User::find($notification->data['id_emt'])->role == 3)
                        <h2>{{ App\User::find($notification->data['id_emt'])->enseignant->nom}}
   @endif


                     
                          <span class="label label-danger"> Nouveau</span></h2>
                                    @if($notification->data['sujet'])
                                     <p>{{ $notification->data['sujet'] }}</p>
                                     @else
                                      <p>Aucun Sujet</p>
                                     @endif
                                                                    </div>
                                                                </a>
                                        </li>
                                        @endforeach
                 @foreach(Auth::user()->readNotifications->where('type','App\Notifications\MsgNotification')->take(1) as $notification)
                                          <li>
                <a 
            href="{{url('/emails/view/'.$notification->data['id_msg'].'/'.$notification->id)}}">
                                  <div class="message-img">
                                   <img src="{{asset('img/contact/2.jpg')}}" alt="">
                                                                    </div>
                                <div class="message-content">
   <span class="message-date">{{\Carbon\Carbon::parse($notification->created_at)->toFormattedDateString()}}
   </span>
                     @if( App\User::find($notification->data['id_emt'])->role == 1 or App\User::find($notification->data['id_emt'])->role == 2 )
                        <h2>{{ App\User::find($notification->data['id_emt'])->name}}
   @endif
   @if( App\User::find($notification->data['id_emt'])->role == 0 )
                        <h2>{{ App\User::find($notification->data['id_emt'])->etudiant->nom}}
   @endif
   @if( App\User::find($notification->data['id_emt'])->role == 3)
                        <h2>{{ App\User::find($notification->data['id_emt'])->enseignant->nom}}
   @endif


                     
                          <span class="label label-danger"> Nouveau</span></h2>
                                    @if($notification->data['sujet'])
                                     <p>{{ $notification->data['sujet'] }}</p>
                                     @else
                                      <p>Aucun Sujet</p>
                                     @endif
                                                                    </div>
                                                                </a>
                                        </li>
                                        @endforeach
                                      
                                                        </ul>
                                                        <div class="message-view">
                                                            <a href="{{url('/boite_de_reception')}}">View All Messages</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i>
                                @if(Auth::user()->unreadNotifications->where('type','App\Notifications\nouvelEtudiant')->count()>0)
                                                        <span class="indicator-ms"></span>
                                                    @endif</a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                      <ul class="notification-menu">
      @foreach(Auth::user()->unreadNotifications->where('type','App\Notifications\nouvelEtudiant') as $notification)                            
                                 <li style="background-color:#f5f5f5;">
<a href="{{url('/CompteEtudiant/'.$notification->data['id_user'].'/'.$notification->id) }}">
                <div class="notification-icon">
<i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                    </div>
            <div class="notification-content">
            <span class="notification-date">{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span>
               <h2>{{$notification->data['nom']}} {{$notification->data['prenom']}}</h2>
            <p>L' étudiant (e) {{$notification->data['nom']}} {{$notification->data['prenom']}} a crée son compte .</p>
            </div>
                                                                </a>
                                                            </li>
                                                    @endforeach
                   @foreach(Auth::user()->readNotifications->where('type','App\Notifications\nouvelEtudiant') as $notification)                            
                                 <li >
<a href="{{url('/CompteEtudiant/'.$notification->data['id_user'].'/'.$notification->id) }}">
                <div class="notification-icon">
<i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                    </div>
            <div class="notification-content">
            <span class="notification-date">{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span>
               <h2>{{$notification->data['nom']}} {{$notification->data['prenom']}}</h2>
            <p>L'étudiant {{$notification->data['nom']}} {{$notification->data['prenom']}} a crée son compte .</p>
            </div>
                                                                </a>
                                                            </li>
                                                    @endforeach
                                                            
                                                        </ul>
                                                        <div class="notification-view">
                                                          
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
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
                                                       <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                       
                                                        <!--nihel-->
                                                      @if(Auth::user()->role == '0'|| Auth::user()->role == '1' || Auth::user()->role == '2')
                                                          <li><a href="{{ url('membre/'.Auth::user()->id.'/details')}}"><span class="edu-icon edu-user-rounded author-log-ic"></span>Mon Profile</a>
                                                          </li>
                                                   @elseif(Auth::user()->role == '3')
                                                    <li><a href="{{ url('membreE/'.Auth::user()->id.'/details')}}"><span class="edu-icon edu-user-rounded author-log-ic"></span>Mon Profile</a>
                                                          </li>

                                                          @endif
                                                       
                                                    @if(Auth::user()->role == '0' || Auth::user()->role == '1' || Auth::user()->role == '2')
                                                        <li><a href="{{ url('membre/'.Auth::user()->id.'/edite')}}"><span class="edu-icon edu-settings author-log-ic"></span>Modifier mon compte</a>
                                                        </li>
                                                    @elseif(Auth::user()->role == '3')
                                                         <li><a href="{{ url('membreE/'.Auth::user()->id.'/edite')}}"><span class="edu-icon edu-settings author-log-ic"></span>Modifier mon compte</a>
                                                        </li>
                                                    @endif
                                                    <!--fin nihel-->
                                                        <!--nihel 19/03/2019-->
                                                        <li> <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="edu-icon edu-locked author-log-ic"></span>Se déconnecter</a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                        </li>
                                                        <!--fin nihel-->
                                                    </ul>
                                                </li>
                                                @if(Auth::user()->role == '1')
                                        <li class="nav-item nav-setting-open"><a href="{{url('admin/parametre') }}"   aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-settings"></i></a>
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
         @yield('mobileSidebar')
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                           @yield('search')
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@yield('content')
     <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>GAC © 2019.tous les droits résèrvés. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
     <!-- icheck JS
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
    <!-- Chart JS
    ============================================ -->
    <script src="{{asset('js/chart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('js/peity/peity-active.js')}}"></script>
    <!-- tab JS
    ============================================ -->
    <script src="{{asset('js/tab.js')}}"></script>
    <!-- plugins JS
    ============================================ -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <!-- main JS
    ============================================ -->
    <script src="{{asset('js/main.js')}}"></script>
    
    <!-- select2 JS
    ============================================ -->
    <script src="{{asset('js/select2/select2.full.min.js')}}"></script>
    <script src="js/select2/select2-active.js"></script>
    <!-- chosen JS
    ============================================ -->
    <script src="{{asset('js/chosen/chosen.jquery.js')}}"></script>
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
   
    <!-- Charts JS
    ============================================ -->
    <script src="{{asset('js/charts/Chart.js')}}"></script>
    <script src="{{asset('js/charts/rounded-chart.js')}}"></script>
@yield('pdf')
<!-- counterup JS
        ============================================ -->
    <script src="{{asset('js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('js/counterup/counterup-active.js')}}"></script>
     <!-- summernote JS
        ============================================ -->
    <script src="{{asset('js/summernote/summernote.min.js')}}"></script>
    <script src="{{asset('js/summernote/summernote-active.js')}}"></script>
    <!-- form validate JS
        ============================================ -->
    <script src="{{asset('js/form-validation/jquery.form.min.js')}}"></script>
    <script src="{{asset('js/form-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/form-validation/form-active.js')}}"></script>
    <!-- multiple email JS
        ============================================ -->
    <script src="{{asset('js/multiple-email/multiple-email-active.js')}}"></script>
    <!-- dropzone JS
        ============================================ -->
    <script src="{{asset('js/dropzone/dropzone.js')}}"></script>
     <!-- c3 JS
        ============================================ -->
    <script src="{{asset('js/c3-charts/d3.min.js')}}"></script>
    <script src="{{asset('js/c3-charts/c3.min.js')}}"></script>
    <script src="{{asset('js/c3-charts/c3-active.js')}}"></script>
</body>



</html>