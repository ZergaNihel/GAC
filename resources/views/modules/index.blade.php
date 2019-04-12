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
    <link rel="stylesheet" href="{{asset('css/modals.css')}}">
    <link rel="stylesheet" href="{{asset('css/form/all-type-forms.css')}}">
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
<script >
      $(document).ready(function(){


        var text;
        var text1;
        var sem = $("#sem").val();
        var k = $("#var").val();
        var s1 = $("#s1").val();
        var s2 = $("#s2").val();
        $(document).on('change','input:radio[name=semestre]',function(){
        if($(this).val() == s1 || $(this).val()== s2){
        $("#enseignant").css('display','');
        }else{
        $("#enseignant").css('display','none');
        }
        });
     

     $("#EditModule").on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget).data('id');
    var b = $(event.relatedTarget).data('nom');
    var c = $(event.relatedTarget).data('code');
    var d = $(event.relatedTarget).data('type');
    var e = $(event.relatedTarget).data('semestre');
    var f = $(event.relatedTarget).data('responsable');


alert("id="+a+"  nom= "+b+" code= "+c+" type= "+d+" semestre= "+e+" responsable="+f+" ");
    var m = $(this)
    m.find('#idMod').val(a);
    m.find('#nom').val(b);
    m.find('#code1').val(c);
    m.find("#type").val(d);
  //  $("select option:selected").AddAttr('selected');
    m.find("#type").trigger('chosen:updated');
    //m.find("#semestre").val(e);
   
   // alert("s1 = "+$('#s1').val()+ "s2 = "+$('#s2').val()+" Aucun = "+$('#auc').val());
    if(e == $('#s1').val()){
      $('input:radio[name=semestre1]')[0].checked = true;
      $("#enseignant1").css('display','');
       m.find("#enseignant12").val(f);
       //m.find("select #enseignant12").trigger('chosen:updated');
    }else if(e == $('#s2').val()){
      $('input:radio[name=semestre1]')[1].checked = true;
      $("#enseignant1").css('display','');
       m.find("#enseignant12").val(f);
       // m.find("select #enseignant12").trigger('chosen:updated');
    }else{
      $('input:radio[name=semestre1]')[2].checked = true;
      $("#enseignant1").css('display','none');
    }

   // alert(m.find("#idGroupe_etu").val());
    //m.find('#prepend-big-btn').val(c);
});

      //  alert("sem"+sem+"k"+k);
         alert("s1"+$("#s1").val()+"s2"+$("#s2").val());
       $(document).on('click','#ModBtn',function(){
        alert("hhh");
        $.ajax({
type: "POST",
data: $('#formMod').serialize(),                             // to submit fields at once
url: $('#formMod').attr('action'),                        // use the form's action url
success: function(data) {
    $("#zoomInDown1").modal("hide");
    alert(""+data.mod.nom);
    if(data.mod.semestre == null ){
     text = '<button class="ds-setting">Désactivé</button>';
     text1 = 'Aucun';
    }else{
        if(data.mod.semestre == s1){
             text1 = 'Semestre 1';
            text = '<button class="pd-setting">Active</button>';
        }
        if (data.mod.semestre == s2) {
             text1 = 'Semestre 2';
             text = '<button class="ps-setting">Active</button>';
        }
        if(data.mod.semestre != s2 && data.mod.semestre != s1){
             text = '<button class="ds-setting">Désactivé</button>';
        }


}

    

    $('table').append('<tr id="'+data.mod.idMod+'"><td id="var'+data.mod.idMod+'">'+k+'</td><td id="nom'+data.mod.idMod+'">'+data.mod.nom+'</td><td id="code'+data.mod.idMod+'">'+data.mod.code+'</td><td id="type'+data.mod.idMod+'">'+data.mod.type+'</td><td id="active'+data.mod.idMod+'">'+text+'</td><td id="semestre'+data.mod.idMod+'">'+text1+'</td><td id="action'+data.mod.idMod+'"><a data-toggle="tooltip" href="#" title="Détails" class="btn btn-default" ><i class="fa fa-book" aria-hidden="true"></i></a><a  data-toggle="modal"  href="#" title="Modifier" class="btn btn-default" data-target="#EditModule" data-nom="'+data.mod.nom+'" data-code="'+data.mod.code+'" data-type="'+data.mod.type+'" data-semestre="'+data.mod.semestre+'" data-responsable="'+data.mod.ens_responsable+'" data-id="'+data.mod.idMod+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a><button data-toggle="tooltip" title="supprimer" class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true"></i></button></td></tr>');
    $("#var").val(k++);

var s1 =$("#action"+data.mod.idMod+"").find("button");
    s1.attr("id" , "deleteMod"+data.mod.idMod+"");
    
}
});
       });

    $(document).on('click','#ModEditBtn',function(){
        alert("hhh");
        $.ajax({
type: "POST",
data: $('#formEditMod').serialize(),                             // to submit fields at once
url: $('#formEditMod').attr('action'),                        // use the form's action url
success: function(data) {
    $("#EditModule").modal("hide");
$('#nom'+data.module.idMod+'').html(data.module.nom);
$('#code'+data.module.idMod+'').html(data.module.code);
$('#type'+data.module.idMod+'').html(data.module.type);
if(data.module.semestre == s1){
$('#active'+data.module.idMod+'').html('<button class="pd-setting">Active</button>');
$('#semestre'+data.module.idMod+'').html('Semestre 1');
}
else if(data.module.semestre == s2){
$('#active'+data.module.idMod+'').html('<button class="ps-setting">Active</button>');
$('#semestre'+data.module.idMod+'').html('Semestre 2');
}
else{
$('#active'+data.module.idMod+'').html('<button class="ds-setting">Désactivé</button>');
$('#semestre'+data.module.idMod+'').html('Aucun');
    }
    var m = $("#action"+data.module.idMod+"").find("#edita");
    m.data("nom",""+data.module.nom+"");
    m.data("code",""+data.module.code+"");
    m.data("type",""+data.module.type+"");
    m.data("id",""+data.module.idMod+"");
    m.data("semestre",""+data.module.semestre+"");
    m.data("responsable",""+data.module.ens_responsable+"");
   
                                       
}
});
});
     $(document).on('click','.btn-danger',function(){
        var j = $(this).attr("id").substring(9);
       //alert(j);
       $.ajax({
  type: "get",
  url: "{{url('DeleteModule')}}/"+j+"/" ,
  success: function(data){
    if( data.sem == null )
       {$("#"+j+"").remove();}
   else{
    $("#delete").modal("show");
    $("#delete").find("b").text(data.nom);
   }
}
  });
       


     });
        });
</script>
    
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
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
                                   <span class="mini-click-non">Semestre</span>
                                </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="index.html"><span class="mini-sub-pro">nouveau semestre</span></a></li>
                                <li><a title="Dashboard v.2" href="index-1.html"><span class="mini-sub-pro">Semestre actuel</span></a></li>
                               
                              
                            </ul>
                        </li>
                     
                        <li>
                            <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Module</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="all-professors.html"><span class="mini-sub-pro">Nouveau module</span></a></li>
                                <li><a title="Add Professor" href="add-professor.html"><span class="mini-sub-pro">Modules</span></a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Enseignant</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Students" href="all-students.html"><span class="mini-sub-pro">Nouveau enseignant</span></a></li>
                                <li><a title="Add Students" href="add-student.html"><span class="mini-sub-pro">Enseignants</span></a></li>
                                
                            </ul>
                        </li>
                     
                    <li>
                            <a title="Landing Page" href="events.html" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Historique</span></a>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-message icon-wrap"></span> <span class="mini-click-non">Mailbox</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Inbox" href="mailbox.html"><span class="mini-sub-pro">Inbox</span></a></li>
                                <li><a title="View Mail" href="mailbox-view.html"><span class="mini-sub-pro">View Mail</span></a></li>
                                <li><a title="Compose Mail" href="mailbox-compose.html"><span class="mini-sub-pro">Compose Mail</span></a></li>
                            </ul>
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
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Groupe <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="index.html">Nouveau Groupe</a></li>
                                                <li><a href="index-1.html">liste de groupe</a></li>
                                               
                                            </ul>
                                        </li>
                                        
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="#">Emploi du temps <span class="calendar-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <li><a href="all-professors.html">E.P générale</a>
                                                </li>
                                                <li><a href="add-professor.html">E.P par module</a>
                                                </li>
                                                
                                            </ul>
                                        </li>
                                        <li><a href="events.html">Délibération</a></li>
                                        
                                       
                                   
                                   
                           
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
                                            <li><a href="#">Modules</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">liste de module</span>
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
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Modules</h4>
                          
                    <div class="add-product">
                                                <a class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown1">Nouveau Module</a>
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
                                                                            <h3>Nouveau Module</h3>
                            <p>Ajouter un nouveau module</p>
                               <form action="{{url('addModule')}}" method="post" id="formMod" >
                                  {{ csrf_field() }}
                         <div class="form-group-inner">
                  <div class="row">
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <label class="login2">Intitulé</label>
                                                                                        </div>
                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                              <input type="text" class="form-control" placeholder="Nom de module"  name="nom" id="nom" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
         <div class="form-group-inner"> <div class="row">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Code</label>
                                                                                        </div>
               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
         <input type="text" class="form-control" placeholder="Code" name="code" id="code1" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                          <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2">Type</label>
                                                            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                               <div class="chosen-select-single mg-b-20">
                                               
    <select data-placeholder="Choisir un type" class="chosen-select" tabindex="-1" name="type" id="type">
          <option value="CTT">(CTT)Cours/Tp/TD</option>
                                                                            <option value="CTp">(CTp)Cours/Tp</option>
                                                                            <option value="CTd">(CTd)Cours/TD</option>
                                                   <option value="Cour">Cour</option>
                                                 <option value="TP">TP</option>
                                                    </select>
                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                         <div class="login-btn-inner">
  <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                <label class="login2">Semestre </label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                                <div class="bt-df-checkbox pull-left">
                                                                                     
                                                              
                                                         
                                                               
          <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                   <div >
                                                                                <label>
                <input type="radio" value="{{$s1}}"  id="s1" name="semestre"> <i></i> Semestre 1</label>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                       <div class="row">
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div >
                                                                                <label>
         <input type="radio" value="{{$s2}}"   id="s2" name="semestre"> <i></i> Semestre 2</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                           <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div >
                                                                                <label>
               <input type="radio" value="0" name="semestre"  id="auc"> <i></i> Aucun </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                             
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                         
                                                    </div>
              <div class="form-group-inner" style="display: none;" id="enseignant">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2">Enseignant Responsable</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <div class="chosen-select-single mg-b-20">
                                               
    <select data-placeholder="Choisir un type" class="chosen-select" tabindex="-1" name="enseignant" id="enseignant">
                                                               
               @foreach($ens as $e)
                  <option value="{{$e->idEns}}">{{$e->nom}} {{$e->prenom}}</option>
                @endforeach
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                   <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="login-horizental">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="ModBtn">Ajouter</button>
                                                                             </div>
                                                                                        </div>
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
             <div class="login-horizental">
  <button data-dismiss="modal" href="#" class="btn btn-sm btn-primary login-submit-cs" type="button" >Annuler</button> </div>
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
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>No</th>
                                        <th>Module</th>
                                        <th>Code</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Semestre </th>
                                       
                                        <th>Actions</th>
                                    </tr>
                                    <?php $var = 1; ?>
                                    @foreach($modules as $m)
                                    <tr id="{{$m->idMod}}">
                                        <td >{{$var}}</td>
                                        <td id="nom{{$m->idMod}}"> {{$m->nom}}</td>
                                        
                                        <td id="code{{$m->idMod}}">{{$m->code}}</td>
                                        <td id="type{{$m->idMod}}">{{$m->type}}</td>
                                        <td id="active{{$m->idMod}}">
                                        @if($m->sem1 != null)
                                            @if($m->semestre == $s1)
                                            <button class="pd-setting">Active</button>
                                            @elseif($m->semestre == $s2)
                                            <button class="ps-setting">Active</button>
                                            @else
                                             <button class="ds-setting">Désactivé</button>
                                             @endif
                                        @else
                                             <button class="ds-setting">Désactivé</button>
                                        @endif
                                        </td>
                                        <td id="semestre{{$m->idMod}}">
                                        @if($m->sem1 != null)
                                             @if($m->sem1->active == 1)
                                             {{$m->sem1->nomSem}}
                                              @else
                 Aucun
                                           
                                             @endif
                                        @else
        
                   Aucun
                                      

                                        @endif
                                        </td>
                                      
                                        <td id="action{{$m->idMod}}">
                                             <a data-toggle="tooltip" href="#" title="Détails" class="btn btn-default" ><i class="fa fa-book" aria-hidden="true"></i></a><a id="edita" data-toggle="modal"  href="#" title="Modifier" class="btn btn-default" data-target="#EditModule" data-id="{{$m->idMod}}" data-nom="{{$m->nom}}" data-code = "{{$m->code}}" data-type = "{{$m->type}}" data-semestre="{{$m->semestre}}" data-responsable="{{$m->ens_responsable}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a><button data-toggle="tooltip" title="supprimer" class="btn btn-danger" id="deleteMod{{$m->idMod}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                       
                                        </td>
                                    </tr>
                                      <?php $var++; ?>
                                    @endforeach
            <input type="hidden" id="var" value="{{$var}}">

                                    
                                    
                                </table>
                            </div>
                                          <div id="EditModule" class="modal modal-edu-general modal-zoomInDown fade" role="dialog">
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
                                                     <h3>Modifier le module</h3>
                            <p>Modifier le module</p>
                               <form action="{{url('EditModule')}}" method="post" id="formEditMod" >
                                  {{ csrf_field() }}
                                  <input type="hidden" name="idMod" id="idMod">
                         <div class="form-group-inner">
                  <div class="row">
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <label class="login2">Intitulé</label>
                                                                                        </div>
                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                              <input type="text" class="form-control" placeholder="Nom de module"  name="nom" id="nom" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
         <div class="form-group-inner"> <div class="row">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Code</label>
                                                                                        </div>
               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                     <input type="text" class="form-control" placeholder="Code" name="code" id="code1" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                          <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2">Type</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                     <div class="chosen-select-single mg-b-20">
                                               
    <select data-placeholder="Choisir un type" class="chosen-select" tabindex="-1" name="type" id="type">
                          <option value="CTT">(CTT)Cours/Tp/TD</option>
                          <option value="CTp">(CTp)Cours/Tp</option>
                           <option value="CTd">(CTd)Cours/TD</option>
                            <option value="Cour">Cour</option>
                            <option value="TP">TP</option>
                                                    </select>
                                            </div>
                 
                                                            </div>
                                                        </div>
                                                    </div>
                         <div class="login-btn-inner">
  <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                <label class="login2">Semestre </label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                                <div class="bt-df-checkbox pull-left">
                                                                 
                                                  <script type="text/javascript">
    
    function fct1(){
    
       
document.getElementById('enseignant1').style.display = "none";
        }
         function fct2(){
       
document.getElementById('enseignant1').style.display = "";
  }
</script>                      
                                                              
                                                         
                                                               
          <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                   <div >
                                                                                <label>
                <input type="radio" value="{{$s1}}"  onchange="fct2();" id="s1" name="semestre1"> <i></i> Semestre 1</label>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                       <div class="row">
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div >
                                                                                <label>
         <input type="radio" value="{{$s2}}"  onchange="fct2();" id="s2" name="semestre1"> <i></i> Semestre 2</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                           <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div >
                                                                                <label>
               <input type="radio" value="0" name="semestre1" onchange="fct1();" id="auc"> <i></i> Aucun </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                             
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                         
                                                    </div>
              <div class="form-group-inner" style="display: none;" id="enseignant1">
                                                        <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <label class="login2">Enseignant Responsable</label></div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
           <div class="chosen-select-single mg-b-20">
                                               
    <select data-placeholder="Choisir un type" class="chosen-select" tabindex="-1" name="type" id="type" name="enseignant" id="enseignant12">
                                                               
               @foreach($ens as $e)
                  <option value="{{$e->idEns}}">{{$e->nom}} {{$e->prenom}}</option>
                @endforeach
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                   <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="login-horizental">
 <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="ModEditBtn">Modifier</button>

</div>
      </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
             <div class="login-horizental">
  <button data-dismiss="modal" href="#" class="btn btn-sm btn-primary login-submit-cs" type="button" >Annuler</button> </div>
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
                  
 {{ $modules->links() }}  

                        </div>
                    </div>
                </div>
            </div>
        </div>
             <div id="delete" class="modal modal-edu-general modal-zoomInDown fade" role="dialog" >
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-close-area modal-close-df">
                                                            <a class="close" data-dismiss="modal" href="#"  style="background: #d80027"><i class="fa fa-close"></i></a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="modal-login-form-inner">
                                            <span class="educate-icon educate-danger modal-check-pro information-icon-pro" style="color: #d80027"></span>
                                        <h2>Suppression !</h2>
                                        <p>Vous ne pouvez pas supprimer le module : <b></b><br> Vous devez d'abord le désactiver </p>
                                         </div>
                                                        </div>
<div class="modal-footer danger-md"><a data-dismiss="modal" href="#"  style="background: #d80027">Annuler</a></div>
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