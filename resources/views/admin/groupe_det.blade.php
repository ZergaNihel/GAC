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
</head>
<script >
    $(document).ready(function(){
       
alert("heloo");
$(document).on('click','#newStud',function(){
    alert("hii");
    if($("#nom").val() === "" || $("#prenom").val() === "" || $("#matricule").val() === "" ||  $("#birthday").val() === "" || ( !$("#n").is(':checked') && !$("#r").is(':checked') &&  !$("#e").is(':checked')) ){
alert("cc1");
      $('#error').css("display","");
    //$("#module > option").attr("selected",false);
    
    }else if(($("#r").is(':checked') ||  $("#e").is(':checked')) && $("select").val() == null){
          $('#error').css("display","");
          alert("cc2 = "+$("#r").val());
    }else{

         $('#error').css('display' ,"none");
//alert("heloo inside");
            $.ajax({
type: "POST",
data: $("#formEtud").serialize(),                             // to submit fields at once
url:  $("#formEtud").attr('action'),                        // use the form's action url
success: function(data) {
    $("#zoomInDown1").modal("hide");
//$("#formEtud").reset(); 
 $("#nom").val("");
 $("#prenom").val("");
 $("#matricule").val("");
 $("#birthday").val("");
 $("#n").prop("checked", false);
 $("#r").prop("checked", false);
 $("#e").prop("checked", false);
 $("select option:selected").removeAttr('selected');
 $("select").trigger('chosen:updated');
 
alert(data.etud.nom);
ligne = "<tr><td>"+ $("#var").val()+"</td><td>"+data.etud.nom+"</td><td>"+data.etud.prenom+"</td><td>"+data.etud.date_naissance+"</td><td>"+data.etud.matricule+"</td><td>"+data.etud.type+"</td><td>non enregistré</td><tr>";
 $("tbody").append(ligne);
}
  
});}
        });
    });
</script>
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
                                <li><a title="Dashboard v.1" href="index.html"><span class="mini-sub-pro">Nouveau groupe</span></a></li>
                                <li><a title="Dashboard v.2" href="index-1.html"><span class="mini-sub-pro">Liste de groupe</span></a></li>
                               
                              
                            </ul>
                        </li>
                     
                        <li>
                            <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Emplois du temps</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="all-professors.html"><span class="mini-sub-pro">E.P générale</span></a></li>
                                <li><a href="#" ><span class="mini-sub-pro">E.P par module</span></a></li>
                                
                            </ul>
                        </li>

                     
              
                     
                    <li>
                            <a title="Landing Page" href="events.html" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Délibération</span></a>
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
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
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
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>
                                                    <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
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
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="message-view">
                                                            <a href="#">View All Messages</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                        <ul class="notification-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.</p>
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
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <img src="img/product/pro4.jpg" alt="" />
                                                            <span class="admin-name">Prof.Anderson</span>
                                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>Mon profil</a>
                                                        </li>
                                                        <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>Modifier mon Profile</a>
                                                        </li>
                                                    
                                                        <li><a href="#"><span class="edu-icon edu-locked author-log-ic"></span>Déconnecter</a>
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
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Semestre <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="index.html">Nouveau Semestre</a></li>
                                                <li><a href="index-1.html">Semestre Actuel</a></li>
                                               
                                            </ul>
                                        </li>
                                        <li><a href="events.html">Historique</a></li>
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="#">Enseignants <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <li><a href="all-professors.html">Enseignants</a>
                                                </li>
                                                <li><a href="add-professor.html">Nouveau Enseignant</a>
                                                </li>
                                                
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demopro" href="#">Etudiants <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#democrou" href="#">Modules <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="democrou" class="collapse dropdown-header-top">
                                              <li><a href="all-professors.html">Modules</a>
                                                </li>
                                                <li><a href="add-professor.html">Nouveau module</a>
                                                </li>
                                            </ul>
                                        </li>
                                   
                                   
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
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
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Dashboard / Semestre actuel</a> <span class="bread-slash">/</span>
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
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Projects <span class="table-project-n">Data</span> Table</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <div class="add-product">
                                                <a class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown1"><i class="fa fa-plus"> </i> Nouveau étudiant</a>
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
                                                                            <h3>Nouveau Etudiant</h3>
                            <p>Ajouter un nouveau étudiant</p><br>
                                       <div class="alert-wrap1 shadow-inner wrap-alert-b">
                                <div class="alert alert-danger alert-mg-b" role="alert" id="error" style="display: none;">
                                <strong>Erreur!</strong> Vous devez remplisser tout les champs.
                            </div>
                            <br>
                           
                          </div>

                               <form action="{{url('NouveauEtudiant')}}"  method="post" id="formEtud">
                                {!! csrf_field() !!}
                         <div class="form-group-inner">
                  <div class="row">
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <label class="login2">Nom</label>
                                                                                        </div>
                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                              <input type="text" class="form-control" placeholder="Nom" name="nom" id="nom"/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
         <div class="form-group-inner"> <div class="row">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Prénom</label>
                                                                                        </div>
               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                     <input type="text" class="form-control" placeholder="Prenom" name="prenom" id="prenom" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                             <div class="form-group-inner"> <div class="row">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Matricule</label>
                                                                                        </div>
               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                     <input type="text" class="form-control" placeholder="matricule" name="matricule" id="matricule" />
                                                                                        </div>
                                                        </div>
                                         </div>
                               
                                         <div class="form-group-inner"> <div class="row">
                                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Date de naissance</label>
                                                                                        </div> 
                                                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="sparkline16-graph">
                  <div class="date-picker-inner">
                                    <div class="form-group data-custon-pick" id="data_1">
                                    
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input type="text" class="form-control" value="10/04/2017" name="birthday" id="birthday">
                                        </div>
                                    </div>
                                  </div>
                                  </div>
                                   </div>
                                  </div>
                                  </div>



      <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                <label class="login2">Type </label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                                <div class="bt-df-checkbox pull-left">
                                                                 
                                                  <script type="text/javascript">
    
    function fct1(){
    
       
document.getElementById('module').style.display = "none";
        }
         function fct2(){
       
document.getElementById('module').style.display = "";
  }
</script>                      
                                                              
                                                         
                                                               
          <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                   <div >
                                                                                <label>
                <input type="radio" value="Nouveau(elle)"  onchange="fct1();" id="n" name="type"> <i></i> Nouveau(elle)</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                       <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div >
                                                                                <label>
         <input type="radio" value="Répétitif(ve)"  onchange="fct2();" id="r" name="type"> <i></i> Répétitif(ve)</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                           <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div >
                                                                                <label>
               <input type="radio" value="Endétté(e)" name="type" onchange="fct2();" id="e"> <i></i> Endétté(e)</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                             
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                         
                                                    </div>


<input type="hidden" name="groupe" value="18">



                                   <div class="form-group-inner" style="display: none;" id="module">
                                    <div class="row">
                                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Modules</label>
                                                                                         </div> 
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                           <div class="chosen-select-single">
                                               
                                                <select data-placeholder="Module..." class="chosen-select" multiple="multiple" name="modules[]" id="module">
                                                       
                                            @foreach($modules as $mod)
                                      <option value="{{$mod->idMod}}">{{$mod->nom}}</option>
                                            @endforeach 
                                                    
                                                    </select>
                                            </div>
                                            </div>
                                             </div>
                                              </div>
                         <div class="login-btn-inner">
                                                                                    <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
         
                                                                                    </div>
                   <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="login-horizental">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button"id="newStud">Ajouter</button>
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
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true"    data-resizable="true" data-cookie="true"
                                   data-show-pagination-switch="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                               
                                                <th data-field="id">ID</th>
                                                <th data-field="name" data-editable="true">Nom</th>
                                                <th data-field="prenom" data-editable="true">Prénom</th>
                                                <th data-field="date" data-editable="true">date de naissance</th>
                                                <th data-field="matricule">Matricule</th>
                                                <th data-field="task" data-editable="true">Type</th>
                                                <th data-field="email" data-editable="true">Email</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php $var=1; ?>
                                          @foreach($etudiants as $etu)  
                                            <tr>
                                          
                                                <td>{{$var}}</td>
                                                <td>{{$etu->nom}}</td>
                                                <td>{{$etu->prenom}}</td>
                                                <td>{{$etu->date_naissance}}</td>
                                                <td >{{$etu->matricule}} </td>
                                                <td>{{$etu->type}}</td>
                                           
                                                <td >non enregistré</td>
                                            </tr>
                                            <?php $var++; ?>
                                            @endforeach
                                        
                              
                                        </tbody>
                                    </table>
                                    <input type="hidden" id="var" value="{{$var}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



         <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
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