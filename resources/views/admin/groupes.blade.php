<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard V.1 | Kiaalap - Kiaalap Admin Template</title>
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
    <link rel="stylesheet" href="{{('css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/calendar/fullcalendar.print.min.css')}}">
    <!-- x-editor CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/editor/select2.css')}}">
    <link rel="stylesheet" href="{{('css/editor/datetimepicker.css')}}">
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
    <link rel="stylesheet" href="{{asset('css/modals.cs')}}s">
    <link rel="stylesheet" href="{{asset('css/form/all-type-forms.css')}}s">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="">


        $(document).ready(function(){
            $(document).on('click','#deleteBtn',function(){
            alert("hhh");
            $.ajax({
                type: "POST",
                data: $('#deleteForm').serialize(),                             // to submit fields at once
                url: $('#deleteForm').attr('action'),                        // use the form's action url
                success: function(data) {
                        $("#delete").modal("hide");
                        alert(data.success);
                        $("#panel"+data.id+"").remove();
                    }
                });
            });

    alert($("#EditError").val());
     if( $("#EditError").val() == 1){
         $("#edit").modal("show");
        }
     $("#edit").on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget).data('groupe');
    var b = $(event.relatedTarget).data('id');
    var c = $(event.relatedTarget).data('section');
    var e = $(event.relatedTarget).data('ids1');

//alert("e="+e+"a="+a+"b="+b+"c="+c);
    var m = $(this)
    m.find('#editGrp').val(a);
    m.find('#editSec').val(e);
    m.find('#editSec').text(c);
    m.find("#idGroupe").val(b);
    m.find("#idGroupe_etu").val(e);

   // alert(m.find("#idGroupe_etu").val());
    //m.find('#prepend-big-btn').val(c);
});
$("#delete").on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget).data('groupe');
    var b = $(event.relatedTarget).data('id');
    alert(b);
     var m = $(this)
   // m.find('#editGrp').val(a);
    m.find("#idGrpDel").val(b);
    alert("groupe = "+m.find("#idGrpDel").val(b));
    //m.find('#prepend-big-btn').val(c);
});

var groupe;
  $("input:hidden.groupe").each(function() {
      // alert( $(this).val());
   groupe = $(this).val();
$.ajax({
  type: "get",
  url: "{{url('statGroupe')}}/"+groupe+"/" ,
  success: function(data){
   //alert("groupe = "+data.id+"nbr = "+data.nbr);
     $(".nbr"+data.id+"").append(data.nbr);
    var ctx = document.getElementById("piechart"+data.id+"");
    var piechart = new Chart(ctx, {
        type: 'pie',
        data: {
        labels: ["Endétté", "Répétitifs", "Nouveau"],
            datasets: [{
                label: 'pie Chart',
                backgroundColor: [
                    
                    '#65b12d',
                    '#D80027',
                    '#006DF0'
                ],
                data: [data.endette,data.repetitif, data.nouveau]
            }]
        },
        options: {
            responsive: true
        }
    });
  
  }
});

 });
          });
    </script>


</head>

<body>
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><a href="index.html"><img src="img/logo/logosn.png" alt="" /></a></strong>
                <br>
                <br>

                <div class="breadcome-heading">
                    <form role="search" class="sr-input-func">
                        <input type="text" placeholder="Search..." class="search-int form-control">
                        <a href="#"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>
            <br>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" href="index.html">
                                <span class="educate-icon educate-home icon-wrap"></span>
                                <span class="mini-click-non">Groupes</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="index.html"><span class="mini-sub-pro">Nouveau
                                            groupe</span></a></li>
                                <li><a title="Dashboard v.2" href="index-1.html"><span class="mini-sub-pro">Liste de
                                            groupe</span></a></li>


                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span
                                    class="educate-icon educate-professor icon-wrap"></span> <span
                                    class="mini-click-non">Emplois du temps</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="all-professors.html"><span class="mini-sub-pro">E.P
                                            générale</span></a></li>
                                <li><a href="#"><span class="mini-sub-pro">E.P par module</span></a></li>

                            </ul>
                        </li>




                        <li>
                            <a title="Landing Page" href="events.html" aria-expanded="false"><span
                                    class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span>
                                <span class="mini-click-non">Délibération</span></a>
                        </li>




                    </ul>
                </nav>
            </div>

        </nav>
    </div>


    <div class="all-content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br>
                    <div class="logo-pro">
                        <br> <br>
                        <a href="index.html"></a>
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
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">Module</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">Semestre</a>
                                                </li>

                                                <li class="nav-item"><a href="#" class="nav-link">Historique</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item dropdown">
                                                    <a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle"><i
                                                            class="educate-icon educate-message edu-chat-pro"
                                                            aria-hidden="true"></i><span
                                                            class="indicator-ms"></span></a>
                                                    <div role="menu"
                                                        class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <h1>Message</h1>
                                                        </div>
                                                        <ul class="message-menu">


                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/2.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="message-view">
                                                            <a href="#">View All Messages</a>
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
                                                        <img src="img/product/pro4.jpg" alt="" />
                                                        <span class="admin-name">Prof.Anderson</span>
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu"
                                                        class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="#"><span
                                                                    class="edu-icon edu-home-admin author-log-ic"></span>Mon
                                                                profil</a>
                                                        </li>
                                                        <li><a href="#"><span
                                                                    class="edu-icon edu-user-rounded author-log-ic"></span>Modifier
                                                                mon Profile</a>
                                                        </li>

                                                        <li><a href="#"><span
                                                                    class="edu-icon edu-locked author-log-ic"></span>Déconnecter</a>
                                                        </li>
                                                    </ul>
                                                </li>

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
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Semestre <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="index.html">Nouveau Semestre</a></li>
                                                <li><a href="index-1.html">Semestre Actuel</a></li>

                                            </ul>
                                        </li>
                                        <li><a href="events.html">Historique</a></li>
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="#">Enseignants
                                                <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <li><a href="all-professors.html">Enseignants</a>
                                                </li>
                                                <li><a href="add-professor.html">Nouveau Enseignant</a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demopro" href="#">Etudiants <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>

                                        </li>
                                        <li><a data-toggle="collapse" data-target="#democrou" href="#">Modules <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="democrou" class="collapse dropdown-header-top">
                                                <li><a href="all-professors.html">Modules</a>
                                                </li>
                                                <li><a href="add-professor.html">Nouveau module</a>
                                                </li>
                                            </ul>
                                        </li>


                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="mailbox.html">Inbox</a>
                                                </li>
                                                <li><a href="mailbox-view.html">View Mail</a>
                                                </li>
                                                <li><a href="mailbox-compose.html">Compose Mail</a>
                                                </li>
                                            </ul>
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
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..."
                                                    class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Dashboard / Semestre actuel</a> <span
                                                    class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Emploie du temps</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="edu-accordion-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                            <h2>Groupe étudiants par section</h2>

                        </div>
                        <div class="add-product pull-right">
                            <a class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown1">Nouveau
                                Groupe</a>
                        </div>

                    </div>
                </div>


                <div id="zoomInDown1" class="modal modal-edu-general modal-zoomInDown fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-close-area modal-close-df">
                                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                            </div>
                            <div class="modal-body">
                                <div class="modal-login-form-inner">

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="basic-login-inner modal-basic-inner">
                                                <h3>Nouveau Groupe</h3>
                                                <p>Register User can get sign in from here</p>
                                                @if($message = Session::get('success'))
                                                <div class="alert alert-success alert-block">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @endif
                                                <form method="post" enctype="multipart/form-data"
                                                    action="{{ url('groupes') }}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Section</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="form-select-list"> <select
                                                                        class="form-control custom-select-value"
                                                                        name="section" placeholder="password"
                                                                        style="width: 80%;">
                                                                        <option disabled>choisissez la section</option>
                                                                        @foreach($sections as $sec)
                                                                        <option value="{{$sec->idSec}}">{{$sec->nomSec}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Groupe</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="form-group">

                                                                    <input name="groupe" type="text"
                                                                        placeholder="Nom de Groupe" class="form-control"
                                                                        id="" style="width: 80%;"> </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Liste
                                                                    d'étudiants</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="file-upload-inner ts-forms">
                                                                    <div class="input prepend-small-btn">

                                                                        <div class="file-button">
                                                                            <i class="fa fa-download"></i>
                                                                            <input type="file"
                                                                                onchange="document.getElementById('prepend-big-btn').value = this.value;"
                                                                                style="width:80%" name="select_file">
                                                                        </div>
                                                                        <input type="text" id="prepend-big-btn"
                                                                            placeholder="no file selected"
                                                                            style="width:80%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="login-btn-inner">

                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="login-horizental">
                                                                    <button
                                                                        class="btn btn-sm btn-primary login-submit-cs"
                                                                        type="submit">Ajouter</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  njgjbxkgnbjlxk  -->
                <div class="row">
                    @if($message = Session::get('succ'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>


                    @endif
                    <?php $var=1; ?>
                    @foreach($section as $s)

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="admin-pro-accordion-wrap shadow-inner responsive-mg-b-30">
                            <div class="alert-title">
                                <h2>{{$s->section->nomSec}}</h2>

                            </div>
                            <div class="panel-group edu-custon-design" id="accordion">

                                @foreach(App\Groupe_etu::where('sem_groupe','=',$semestre)->where('sec_groupe','=',$s->sec_groupe)->select('groupe')->get()
                                as $grp)
                                <div class="panel panel-default" id="panel{{$grp->groupe1->idG}}">
                                    <div class="panel-heading accordion-head">
                                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse{{$var}}"> Groupe {{$grp->groupe1->nomG}} </a>
                                            <a class="zoomInDown mg-t" href="#" data-ids1="{{$s->section->idSec}}"
                                                data-toggle="modal" data-id="{{$grp->groupe1->idG}}"
                                                data-groupe="{{$grp->groupe1->nomG}}"
                                                data-section="{{$s->section->nomSec}}" data-target="#edit"><i
                                                    class="fa fa-edit pull-right"> </i> </a>

                                            <a href="{{url('groupe/detail/'.$grp->groupe1->idG)}}"> <i
                                                    class="fa fa-eye pull-right"> </i></a>
                                            <a href="#" class="zoomInDown mg-t" data-toggle="modal"
                                                data-id="{{$grp->groupe1->idG}}" data-groupe="{{$grp->groupe1->nomG}}"
                                                data-section="{{$s->section->nomSec}}" data-target="#delete"> <i
                                                    class="fa fa-trash pull-right"> </i></a>

                                        </h4>
                                    </div>
                                    <div id="delete" class="modal modal-edu-general modal-zoomInDown fade"
                                        role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-close-area modal-close-df">
                                                    <a class="close" data-dismiss="modal" href="#"
                                                        style="background: #d80027"><i class="fa fa-close"></i></a>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-login-form-inner">
                                                        <span
                                                            class="educate-icon educate-danger modal-check-pro information-icon-pro"
                                                            style="color: #d80027"></span>
                                                        <h2>Suppression !</h2>
                                                        <p>Voulez-Vous vraiment supprimer le Groupe :
                                                            <b>{{$grp->groupe1->nomG}}</b></p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer danger-md">
                                                    <form method="post" action="{{ url('DeleteGroupes') }}"
                                                        id="deleteForm">
                                                        {{ csrf_field() }}

                                                        <input type="hidden" name="idGrpDel" id="idGrpDel">

                                                        <a data-dismiss="modal" href="#"
                                                            style="background: #d80027">Annuler</a>
                                                        <a href="#" id="deleteBtn"
                                                            style="background: #d80027">supprimer</a>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="edit" class="modal modal-edu-general modal-zoomInDown fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-close-area modal-close-df">
                                                    <a class="close" data-dismiss="modal" href="#"><i
                                                            class="fa fa-close"></i></a>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-login-form-inner">

                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="basic-login-inner modal-basic-inner">
                                                                    <h3>Modifier le Groupe : {{$grp->groupe1->nomG}}
                                                                    </h3>

                                                                    @if(count($errors) > 0)
                                                                    <div class="alert alert-danger">
                                                                        Upload Validation Error<br><br>
                                                                        <ul>
                                                                            @foreach($errors->all() as $error)
                                                                            <li>{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                    <input type="hidden" name="EditError" value="1">
                                                                    @endif


                                                                    <form method="post"
                                                                        action="{{ url('EditGroupes') }}">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="idGrp" id="idGroupe">
                                                                        <input type="hidden" name="idGrp_etu"
                                                                            id="idGroupe_etu">
                                                                        <div class="form-group-inner">
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                                    <label
                                                                                        class="login2">Section</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                                    <div class="form-select-list">
                                                                                        <select
                                                                                            class="form-control custom-select-value"
                                                                                            name="section"
                                                                                            style="width: 80%;">
                                                                                            <option id="editSec"
                                                                                                selected></option>
                                                                                            <option disabled>choisissez
                                                                                                la section</option>
                                                                                            @foreach($sections as $sec)
                                                                                            <option
                                                                                                value="{{$sec->idSec}}">
                                                                                                {{$sec->nomSec}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group-inner">
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                                    <label class="login2">Groupe</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                                    <div class="form-group">

                                                                                        <input type="text" value=""
                                                                                            placeholder="Nom de Groupe"
                                                                                            class="form-control"
                                                                                            id="editGrp"
                                                                                            style="width: 80%;"
                                                                                            name="groupe"> </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="login-btn-inner">

                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                    <div class="login-horizental">
                                                                                        <button
                                                                                            class="btn btn-sm btn-primary login-submit-cs"
                                                                                            id="submitEdit"
                                                                                            type="submit">Modifier</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($var == 1){ ?>
                                    <div id="collapse{{$var}}" class="panel-collapse panel-ic collapse in">
                                        <?php }else{ ?>
                                        <div id="collapse{{$var}}" class="panel-collapse panel-ic collapse">
                                            <?php } ?>
                                            <div class="panel-body admin-panel-content animated bounce">
                                                <div class="alert-title">
                                                    <h4>Section : {{$s->section->nomSec}}</h4>
                                                </div>
                                                <br>
                                                <div class="alert-title">
                                                    <h4>Groupe : {{$grp->groupe1->nomG}}</h4>

                                                </div> <br>
                                                <div class="alert-title">
                                                    <h4 class="nbr{{$grp->groupe1->idG}}">Nombre d'étudiants : </h4>

                                                </div><br>
                                                <input type="hidden" id="groupe_id" class="groupe" name="group[]"
                                                    value="{{$grp->groupe}}">
                                                <div class="charts-area mg-b-15">
                                                    <div class="charts-single-pro responsive-mg-b-30">
                                                        <div class="alert-title">
                                                            <h2>Statistiques groupe</h2>
                                                        </div>
                                                        <div id="pie-chart">
                                                            <canvas id="piechart{{$grp->groupe1->idG}}"></canvas>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <?php $var++; ?>

                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                    <!--    cvbcj -->
                </div>
            </div>

            <!-- accordion End-->
            <div class="footer-copyright-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="footer-copy-right">
                                <p>Copyright © 2018. All rights reserved. Template by <a
                                        href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




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
        <!-- tawk chat JS
    ============================================ -->
        <script src="{{asset('js/tawk-chat.js')}}"></script>
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
        <!-- calendar JS
    ============================================ -->
        <script src="{{asset('js/calendar/moment.min.js')}}"></script>
        <script src="{{asset('js/calendar/fullcalendar.min.js')}}"></script>
        <script src="{{asset('js/calendar/fullcalendar-active.js')}}"></script>
        <!-- Charts JS
    ============================================ -->
        <script src="{{asset('js/charts/Chart.js')}}"></script>
        <script src="{{asset('js/charts/rounded-chart.js')}}"></script>
        <!-- pdf JS
    ============================================ -->
        <script src="{{asset('js/pdf/jquery.media.js')}}"></script>
        <script src="{{asset('js/pdf/pdf-active.js')}}"></script>



</body>

</html>
