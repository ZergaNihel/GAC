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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
  <script>

$(document).ready(function(){
 
 var tp1 = 0;
/* this is our ajax function created for an arrayed forms */
var called = 0;
var nmbr=0 ;

 $("#PrimaryModalalert").modal("show");
 
    var nbr =$("#nbrSec").val();
   var idmodule;
   // alert($("#section1").attr("id"));
   // alert(nbr);
    var l=1;
    var i=0 ;
    while(l<=nbr)  {
        
       // alert("hii"+i);
       // var s = $("#section"+l+"").attr("id");
          
           $(document).on("click","#ajouterTD"+l+"",function(){
            var kl = $(this).attr("id").substring(9);

            i++;
            var text ='<form class="formTD" method="post" id="groupe'+i+'" action="{{ url("empTD") }}">{!! csrf_field() !!}<fieldset class="dropzone dropzone-custom" style="border-color:grey; border-width: 3px;" ><div class="row"><div class="button-ap-list responsive-btn pull-right"><div class="button-style-four btn-mg-b-10"><button type="button" class="btn btn-custon-rounded-four btn-danger" id="'+i+'"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> </button></div></div></div><div class="row "><input class="hiddenid" type="hidden" name="idmodule" value=""><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Enseignant</label><div class="form-group"><div class="chosen-select-single mg-b-20"><select name="idensTD" class="chosen-select" tabindex="-1" id="ensTD'+i+'">@foreach($pro as $p)<option value="{{$p->idEns}}">{{$p->nom}} {{$p->nom}}</option>@endforeach</select></div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Groupe</label><div class="form-group"><div class="chosen-select-single mg-b-20"><select id="grpTD'+i+'" name="idgrpTD" class="chosen-select" tabindex="-1">@foreach($groupes as $grp)<option value="{{$grp->idG}}">{{$grp->nomG}} </option>@endforeach</select></div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Séances </label><div class="form-group-inner"  id="module"><div class="chosen-select-single"><select name="idseaTD[]" data-placeholder="Choisir une seance" class="chosen-select" multiple="multiple" id="seaTD'+i+'">@foreach($seancesTD as $sea)<option value="{{$sea->idSea}}">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}</option>@endforeach</select></div></div></div></div></fieldset></form><div id="saute'+i+'"><br></div>';
               // alert("k="+l+" i ="+i);
           
            
$("#section"+kl+"").append(text);
//alert(idmodule);
$('input[name="idmodule"]').val(idmodule);
            /* var b=$("input[type='number']").attr("id");
            alert(b);*/
         
//}
        } );
l++;
}

 
 
  


 var tp=1;
   while(tp<=nbr)  {
        
      //  alert("hii tp"+tp);
      var s = $("#sectionTP"+tp+"").attr("id");
         
           $(document).on("click","#ajouterTP"+tp+"",function(){
            var ktp = $(this).attr("id").substring(9);
       //   alert(ktp);
            i++;
            var text ='<form class="formTP" method="post" id="groupe'+i+'" action="{{ url("empTP") }}">{!! csrf_field() !!}<fieldset class="dropzone dropzone-custom" style="border-color:grey; border-width: 3px;" ><div class="row"><div class="button-ap-list responsive-btn pull-right"><div class="button-style-four btn-mg-b-10"><button type="button" class="btn btn-custon-rounded-four btn-danger" id="'+i+'"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> </button></div></div></div><div class="row "><input type="hidden" name="idmodule"  class="hiddenid" value="" ><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Enseignant</label><div class="form-group"><div class="chosen-select-single mg-b-20"><select name="idensTP" id="ensTP'+i+'" class="chosen-select" tabindex="-1" >@foreach($pro as $p)<option value="{{$p->idEns}}">{{$p->nom}} {{$p->nom}}</option>@endforeach</select></div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Groupe</label><div class="form-group"><div class="chosen-select-single mg-b-20"><select id="grpTP'+i+'" name="idgrpTP" class="chosen-select" tabindex="-1">@foreach($groupes as $grp)<option value="{{$grp->idG}}">{{$grp->nomG}} </option>@endforeach</select></div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Séances </label><div class="form-group-inner"  id="module"><div class="chosen-select-single"><select name="idseaTP[]" id="seaTP'+i+'" data-placeholder="Choisir une seance" class="chosen-select" multiple="multiple"  >@foreach($seancesTP as $sea)<option value="{{$sea->idSea}}">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}</option>@endforeach</select></div></div></div></div></fieldset></form><div id="saute'+i+'"><br></div>';
               // alert("k="+l+" i ="+i);
           
            
$("#sectionTP"+ktp+"").append(text);
//alert(idmodule);
$('input[name="idmodule"]').val(idmodule);
//alert($('input[name="idmodule"]').val());
            /* var b=$("input[type='number']").attr("id");
            alert(b);*/
         
//}
        } );
tp++;
}







           $(document).on("click",".btn-danger",function(){
           
            var btn_id = $(this).attr("id");
            //alert("id = "+btn_id+ " fielset = "+$("#groupe2").attr("id"));
            $("#groupe"+btn_id+"").remove();

            $("#saute"+btn_id+"").remove();
             //alert(btn_id);
             i--;
            
             });

          




$(document).on('click','#subMod',function(){
  //alert($("select[name='moduleCh']").val());
  if($("select[name='moduleCh']").val() === null){
    $("#alertreq").css('display','');
  }else{
   $("#alertreq").css('display','none');
$.ajax({
type: "POST",
data: $('#popMod').serialize(),                             // to submit fields at once
url: $('#popMod').attr('action'),                        // use the form's action url
success: function(data) {
  var mo1;
  var mo2;
  var mo3;
  for(var j=0; j< data.module.length ; j++){
    mo1 = data.module[j].idMod;
    mo2 = data.module[j].nom;
    mo3 = data.module[j].type;
  }
 /* alert( mo1);
  alert( mo2);
  alert( mo3);*/
  $("#PrimaryModalalert").modal("hide");
  $("#nameMod").val(mo2);
   
  $('input[name="idmodule"]').val(mo1);
  $('input[name="modhid"]').val(mo1);


idmodule = mo1;
//alert(idmodule);alert(data.mo4);
  if(data.mo4>0){
    $("#tabEmpTemps").css('display','');
    $("#empForm").css('display','none');
    //alert("L1= "+data.pop1.length);alert("L2="+data.pop.length);


var x1;
var x2;
var x3;
//alert(data.var);
var i=0;
if(data.pop1.length!=0){
 x1 = '<div class="modal-area-button" id="courtd"><a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModal">'+data.pop1[i].nomSec +' -- '+data.pop1[i].nom+' </a></div><div id="PrimaryModal" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-close-area modal-close-df"><a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a></div><div class="modal-body"><div class="product-payment-inner-st"><ul id="myTabedu1" class="tab-review-design"><li class="active"><a href="#description">Informations</a></li><li><a href="#reviews"> Modifier </a></li></ul><div id="myTabContent" class="tab-content custom-product-edit"><div class="product-tab-list tab-pane fade active in" id="description"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><span class="educate-icon educate-info modal-check-pro information-icon-pro"></span><h2>Cour</h2><br><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Enseignant </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop1[i].nom+' '+data.pop1[i].prenom+'</p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Seance </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop1[i].jour+' '+data.pop1[i].heure+' '+data.pop1[i].salle+'</p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Section </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop1[i].nomSec+'</p></div></div></div></div></div></div><div class="product-tab-list tab-pane fade" id="reviews"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="devit-card-custom"><a href="#" class="btn btn-primary waves-effect waves-light">Submit</a></div></div></div></div></div></div></div></div></div></div><div class="modal-footer"><a data-dismiss="modal" href="#">Cancel</a><a href="#">Process</a></div></div></div></div>';
}
//var res = data.pop;
//alert(data.pop);
if(data.pop.length!=0){
x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#WarningModalalert">'+data.pop[i].nomG +' -- '+data.pop[i].nom+' </a></div><div id="WarningModalalert" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-close-area modal-close-df"><a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a></div><div class="modal-body"><div class="product-payment-inner-st"><ul id="myTabedu1" class="tab-review-design"><li class="active"><a href="#description">Informations</a></li><li><a href="#reviews"> Modifier </a></li></ul><div id="myTabContent" class="tab-content custom-product-edit"><div class="product-tab-list tab-pane fade active in" id="description"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><span class="educate-icon educate-info modal-check-pro information-icon-pro"></span><h2>Travaux Dirigés (TD)!</h2><br><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Enseignant </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].nom+' '+data.pop[i].prenom+' </p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Seance </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].jour+' '+data.pop[i].heure+' '+data.pop[i].salle+'</p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Groupe  </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].nomG+'</p></div></div></div></div></div></div><div class="product-tab-list tab-pane fade" id="reviews"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="devit-card-custom"><a href="#" class="btn btn-primary waves-effect waves-light">Submit</a></div></div></div></div></div></div></div></div></div></div><div class="modal-footer warning-md"><a data-dismiss="modal" href="#">Annuler</a><a href="#">OK</a></div></div></div></div>';


x2 ='<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#Informationpro">'+data.pop[i].nomG +' -- '+data.pop[i].nom+' </a></div>  <div id="Informationpro" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-close-area modal-close-df"><a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a></div><div class="modal-body"><div class="product-payment-inner-st"><ul id="myTabedu1" class="tab-review-design"><li class="active"><a href="#description">Informations</a></li><li><a href="#reviews"> Modifier </a></li></ul><div id="myTabContent" class="tab-content custom-product-edit"><div class="product-tab-list tab-pane fade active in" id="description"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><span class="educate-icon educate-info modal-check-pro information-icon-pro"></span><h2>Travaux Pratique (TP)!</h2><br><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Enseignant </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].nom+' '+data.pop[i].prenom+' </p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Seance </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].jour+' '+data.pop[i].heure+' '+data.pop[i].salle+'</p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Groupe  </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].nomG+'</p></div></div></div></div></div></div><div class="product-tab-list tab-pane fade" id="reviews"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="devit-card-custom"><a href="#" class="btn btn-primary waves-effect waves-light">Submit</a></div></div></div></div></div></div></div></div></div></div><div class="modal-footer info-md"><a data-dismiss="modal" href="#">Cancel</a><a href="#">Process</a></div></div></div></div>';
}
for( i =0;i<data.pop.length ;i++){
  //alert("pop = cour");
  if(data.pop[i].heure === "8h30" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D8').append(x2);
    }
  }
    if(data.pop[i].heure === "10h" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D10').append(x2);
    }
  }
   if(data.pop[i].heure === "11h30" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D11').append(x2);
    }
  }


     if(data.pop[i].heure === "13h30" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D15').append(x2);
    }
  }
if(data.pop[i].heure === "8h30" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Ma8').append(x2);
    }
  }

if(data.pop[i].heure === "10h" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Ma10').append(x2);
    }
  }
  if(data.pop[i].heure === "11h30" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Ma11').append(x2);
    }
  }
     if(data.pop[i].heure === "13h30" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Ma15').append(x2);
    }
  }

if(data.pop[i].heure === "8h30" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
      
      $('#L8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L8').append(x2);
    }
  }

  if(data.pop[i].heure === "10h" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
    $('#L10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L10').append(x2);
    }
  }
    if(data.pop[i].heure === "11h30" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
      
      $('#L11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L11').append(x2);
    }
  }
       if(data.pop[i].heure === "13h30" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
      
      $('#L13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
      
      $('#L15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L15').append(x2);
    }
  }
  if(data.pop[i].heure === "8h30" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Me8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me8').append(x2);
    }
  }

  if(data.pop[i].heure === "10h" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
    $('#Me10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me10').append(x2);
    }
  }
    if(data.pop[i].heure === "11h30" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Me11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me11').append(x2);
    }
  }
       if(data.pop[i].heure === "13h30" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Me13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Me15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me15').append(x2);
    }
  }


  if(data.pop[i].heure === "8h30" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
      
      $('#J8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J8').append(x2);
    }
  }

  if(data.pop[i].heure === "10h" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
    $('#J10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J10').append(x2);
    }
  }
    if(data.pop[i].heure === "11h30" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
      
      $('#J11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J11').append(x2);
    }
  }
       if(data.pop[i].heure === "13h30" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
      
      $('#J13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
      
      $('#J15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J15').append(x2);
    }
  }
  
}


alert(data.pop1.length);
for( i =0;i<data.pop1.length ;i++){
  // alert("pop1 = tptd");
  if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "dimanche"){
 $('#D8').append(x1);
}
    if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "dimanche"){
     $('#D10').append(x1);
    
  }
   if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "dimanche"){
    $('#D11').append(x1);
}
if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "dimanche"){
  $('#D13').append(x1); }

 if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "dimanche"){
  $('#D15').append(x1);
}
if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "mardi"){
 $('#Ma8').append(x1); }

if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "mardi"){
 $('#Ma10').append(x1);
 }
  if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "mardi"){
  $('#Ma11').append(x1); }

  if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "mardi"){
$('#Ma13').append(x1);
 }
 if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "mardi"){
  $('#Ma15').append(x1);
   }

if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "lundi"){
    $('#L8').append(x1); }

  if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "lundi"){
  $('#L10').append(x1);
  
  }
    if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "lundi"){
  $('#L11').append(x1); }

  if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "lundi"){
   $('#L13').append(x1);
     
  }
  if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "lundi"){
    $('#L15').append(x1);
  
  }
  if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "Mercredi"){
  $('#Me8').append(x1);
   
  }

  if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "Mercredi"){
   $('#Me10').append(x1);
   
  }
    if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "Mercredi"){
   $('#Me11').append(x1);
   
  }
   if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "Mercredi"){
  $('#Me13').append(x1);
 
  }
 if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "Mercredi"){
    $('#Me15').append(x1);
  
  }


  if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "jeudi"){
    $('#J8').append(x1);
   
  }

  if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "jeudi"){
   $('#J10').append(x1);
   
  }
    if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "jeudi"){
    $('#J11').append(x1);
   
  }
  if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "jeudi"){
   $('#J13').append(x1);
  
  }
   if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "jeudi"){
    $('#J15').append(x1); }
    

}

 }else{
$("#empForm").css('display','');
$("#tabEmpTemps").css('display','none');
  if(mo3 === 'Cour'){
   // alert("lala");
     $('.c').css('display','');
    $('.ttd').css('display','none');
    $('.ttp').css('display','none');
    $('#submittedC').css('display','');
    $('#suivC').css('display','none');

  }
  if(mo3 === 'CTd'){
     tp1=2;
     $('.c').addClass('active');
    $('.c').css('display','');
    $('.ttd').css('display','');
    $('.ttp').css('display','none');
    $('#submittedTD').css('display','');
    $('#suivtd').css('display','none');
    $('#submittedC').css('display','none');
    $('#suivC').css('display','');

  }if(mo3 === 'TP'){
    tp1=1;
 $('.c').css('display','none');
 $('.c').removeClass('active');
 $('.ttd').css('display','none');
 $('.ttp').css('display','');
 $('.ttp').addClass('active');
 $('#INFORMATION').addClass('active in');
 $('#description').removeClass('active');
  }
  if(mo3 === 'CTp'){
    tp1=2;
  }
   if(mo3 === 'CTT'){
    tp1=2;
  }
 //alert("hii"+data.mo1+""+data.mo2+""+data.mo3);
}
}
});
}
 });


ajax_recaller = function(forms){
$.ajax({
type: "POST",
data: forms[called].serialize(),                             // to submit fields at once
url: forms[called].attr('action'),                        // use the form's action url
success: function(data) {
 //forms[called].reset();
called++;                                                                 // this will serve as a key
 
if(called < forms.length) {
ajax_recaller(forms);                                            // call the ajax function again
} else {
called=0;
 $("#InformationproModalalert").modal("show");                                                        

}
 
}
  
});
 
}
/*reset = function(forms){
for(var k=0;k<forms.length;k++){
  nmbr = forms[k].attr('id').substring(6);
  if(forms[k].attr('class') === "Cour"){
$("#ensC"+nmbr+" option[value=""]").prop('selected', true);
$("#secC"+nmbr+" option[value=""]").prop('selected', true);
$("#seaC"+nmbr+" option:selected").prop("selected", false);
}
}

}*/


$(document).on('click','#popTab',function(){
  //alert("hohaha");
$.ajax({
type: "POST",
data: $('#popEmp').serialize(),                             // to submit fields at once
url: $('#popEmp').attr('action'),                        // use the form's action url
success: function(data) {
  $("#tabEmpTemps").css('display','');
$("#empForm").css('display','none');
    
var x1;
var x2;
var x3;
  $(".modal-area-button").each(function(){
   $("#courtd").remove();
   $("#poptd").remove();
   $("#poptp").remove();
});
    $(".modal modal-edu-general").each(function(){
   $("#PrimaryModal").remove();
   $("#WarningModalalert").remove();
   $("#Informationpro").remove();
});
//alert(data.var);
var i=0;
if(data.pop1.length!=0){
 x1 = '<div class="modal-area-button" id="courtd"><a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModal">'+data.pop1[i].nomSec +' -- '+data.pop1[i].nom+' </a></div><div id="PrimaryModal" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-close-area modal-close-df"><a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a></div><div class="modal-body"><div class="product-payment-inner-st"><ul id="myTabedu1" class="tab-review-design"><li class="active"><a href="#description">Informations</a></li><li><a href="#reviews"> Modifier </a></li></ul><div id="myTabContent" class="tab-content custom-product-edit"><div class="product-tab-list tab-pane fade active in" id="description"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><span class="educate-icon educate-info modal-check-pro information-icon-pro"></span><h2>Cour</h2><br><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Enseignant </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop1[i].nom+' '+data.pop1[i].prenom+'</p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Seance </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop1[i].jour+' '+data.pop1[i].heure+' '+data.pop1[i].salle+'</p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Section </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop1[i].nomSec+'</p></div></div></div></div></div></div><div class="product-tab-list tab-pane fade" id="reviews"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="devit-card-custom"><a href="#" class="btn btn-primary waves-effect waves-light">Submit</a></div></div></div></div></div></div></div></div></div></div><div class="modal-footer"><a data-dismiss="modal" href="#">Cancel</a><a href="#">Process</a></div></div></div></div>';
}
//var res = data.pop;
//alert(data.pop);
if(data.pop.length!=0){
x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#WarningModalalert">'+data.pop[i].nomG +' -- '+data.pop[i].nom+' </a></div><div id="WarningModalalert" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-close-area modal-close-df"><a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a></div><div class="modal-body"><div class="product-payment-inner-st"><ul id="myTabedu1" class="tab-review-design"><li class="active"><a href="#description">Informations</a></li><li><a href="#reviews"> Modifier </a></li></ul><div id="myTabContent" class="tab-content custom-product-edit"><div class="product-tab-list tab-pane fade active in" id="description"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><span class="educate-icon educate-info modal-check-pro information-icon-pro"></span><h2>Travaux Dirigés (TD)!</h2><br><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Enseignant </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].nom+' '+data.pop[i].prenom+' </p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Seance </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].jour+' '+data.pop[i].heure+' '+data.pop[i].salle+'</p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Groupe  </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].nomG+'</p></div></div></div></div></div></div><div class="product-tab-list tab-pane fade" id="reviews"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="devit-card-custom"><a href="#" class="btn btn-primary waves-effect waves-light">Submit</a></div></div></div></div></div></div></div></div></div></div><div class="modal-footer warning-md"><a data-dismiss="modal" href="#">Annuler</a><a href="#">OK</a></div></div></div></div>';


x2 ='<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#Informationpro">'+data.pop[i].nomG +' -- '+data.pop[i].nom+' </a></div>  <div id="Informationpro" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-close-area modal-close-df"><a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a></div><div class="modal-body"><div class="product-payment-inner-st"><ul id="myTabedu1" class="tab-review-design"><li class="active"><a href="#description">Informations</a></li><li><a href="#reviews"> Modifier </a></li></ul><div id="myTabContent" class="tab-content custom-product-edit"><div class="product-tab-list tab-pane fade active in" id="description"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><span class="educate-icon educate-info modal-check-pro information-icon-pro"></span><h2>Travaux Pratique (TP)!</h2><br><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Enseignant </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].nom+' '+data.pop[i].prenom+' </p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Seance </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].jour+' '+data.pop[i].heure+' '+data.pop[i].salle+'</p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Groupe  </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].nomG+'</p></div></div></div></div></div></div><div class="product-tab-list tab-pane fade" id="reviews"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="devit-card-custom"><a href="#" class="btn btn-primary waves-effect waves-light">Submit</a></div></div></div></div></div></div></div></div></div></div><div class="modal-footer info-md"><a data-dismiss="modal" href="#">Cancel</a><a href="#">Process</a></div></div></div></div>';
}
for( i =0;i<data.pop.length ;i++){
  if(data.pop[i].heure === "8h30" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D8').append(x2);
    }
  }
    if(data.pop[i].heure === "10h" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D10').append(x2);
    }
  }
   if(data.pop[i].heure === "11h30" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D11').append(x2);
    }
  }


     if(data.pop[i].heure === "13h30" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D15').append(x2);
    }
  }
if(data.pop[i].heure === "8h30" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Ma8').append(x2);
    }
  }

if(data.pop[i].heure === "10h" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Ma10').append(x2);
    }
  }
  if(data.pop[i].heure === "11h30" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Ma11').append(x2);
    }
  }
     if(data.pop[i].heure === "13h30" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Ma15').append(x2);
    }
  }

if(data.pop[i].heure === "8h30" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
      
      $('#L8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L8').append(x2);
    }
  }

  if(data.pop[i].heure === "10h" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
    $('#L10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L10').append(x2);
    }
  }
    if(data.pop[i].heure === "11h30" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
      
      $('#L11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L11').append(x2);
    }
  }
       if(data.pop[i].heure === "13h30" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
      
      $('#L13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
      
      $('#L15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L15').append(x2);
    }
  }
  if(data.pop[i].heure === "8h30" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Me8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me8').append(x2);
    }
  }

  if(data.pop[i].heure === "10h" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
    $('#Me10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me10').append(x2);
    }
  }
    if(data.pop[i].heure === "11h30" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Me11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me11').append(x2);
    }
  }
       if(data.pop[i].heure === "13h30" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Me13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Me15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me15').append(x2);
    }
  }


  if(data.pop[i].heure === "8h30" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
      
      $('#J8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J8').append(x2);
    }
  }

  if(data.pop[i].heure === "10h" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
    $('#J10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J10').append(x2);
    }
  }
    if(data.pop[i].heure === "11h30" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
      
      $('#J11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J11').append(x2);
    }
  }
       if(data.pop[i].heure === "13h30" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
      
      $('#J13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
      
      $('#J15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J15').append(x2);
    }
  }
  
}



for( i =0;i<data.pop1.length ;i++){
  if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "dimanche"){
 $('#D8').append(x1);
}
    if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "dimanche"){
     $('#D10').append(x1);
    
  }
   if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "dimanche"){
    $('#D11').append(x1);
}
if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "dimanche"){
  $('#D13').append(x1); }

 if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "dimanche"){
  $('#D15').append(x1);
}
if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "mardi"){
 $('#Ma8').append(x1); }

if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "mardi"){
 $('#Ma10').append(x1);
 }
  if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "mardi"){
  $('#Ma11').append(x1); }

  if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "mardi"){
$('#Ma13').append(x1);
 }
 if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "mardi"){
  $('#Ma15').append(x1);
   }

if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "lundi"){
    $('#L8').append(x1); }

  if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "lundi"){
  $('#L10').append(x1);
  
  }
    if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "lundi"){
  $('#L11').append(x1); }

  if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "lundi"){
   $('#L13').append(x1);
     
  }
  if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "lundi"){
    $('#L15').append(x1);
  
  }
  if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "Mercredi"){
  $('#Me8').append(x1);
   
  }

  if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "Mercredi"){
   $('#Me10').append(x1);
   
  }
    if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "Mercredi"){
   $('#Me11').append(x1);
   
  }
   if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "Mercredi"){
  $('#Me13').append(x1);
 
  }
 if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "Mercredi"){
    $('#Me15').append(x1);
  
  }


  if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "jeudi"){
    $('#J8').append(x1);
   
  }

  if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "jeudi"){
   $('#J10').append(x1);
   
  }
    if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "jeudi"){
    $('#J11').append(x1);
   
  }
  if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "jeudi"){
   $('#J13').append(x1);
  
  }
   if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "jeudi"){
    $('#J15').append(x1); }
    

}


//alert("data"+data.pop);
  
$("#InformationproModalalert").modal("hide"); 

}
});
});






 $(document).on('change','#selMod',function(){
  //alert("hohaha");
$.ajax({
type: "POST",
data: $('#selectMod').serialize(),                             // to submit fields at once
url: $('#selectMod').attr('action'),                        // use the form's action url
success: function(data) {
var mo1;
  var mo2;
  var mo3;
  for(var j=0; j< data.module.length ; j++){
    mo1 = data.module[j].idMod;
    mo2 = data.module[j].nom;
    mo3 = data.module[j].type;
  }
  /*alert( mo1);
  alert( mo2);
  alert( mo3);*/

  $("#nameMod").val(mo2);
  $('input[name="idmodule"]').val(mo1);
   $('input[name="modhid"]').val(mo1);
   idmodule = mo1;


/*alert(idmodule);
alert(data.pop);
alert(data.pop1);
  alert(data.mo4);*/
 //alert("hii"+data.mo1+""+data.mo2+""+data.mo3);
 if(data.mo4>0){
    $("#tabEmpTemps").css('display','');
    $("#empForm").css('display','none');
 $(".modal-area-button").each(function(){
   $("#courtd").remove();
   $("#poptd").remove();
   $("#poptp").remove();
});
  $(".modal modal-edu-general").each(function(){
   $("#PrimaryModal").remove();
   $("#WarningModalalert").remove();
   $("#Informationpro").remove();
});
   

var x1;
var x2;
var x3;
//alert(data.var);
var i=0;
if(data.pop1.length!=0){
 x1 = '<div class="modal-area-button" id="courtd"><a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModal">'+data.pop1[i].nomSec +' -- '+data.pop1[i].nom+' </a></div><div id="PrimaryModal" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-close-area modal-close-df"><a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a></div><div class="modal-body"><div class="product-payment-inner-st"><ul id="myTabedu1" class="tab-review-design"><li class="active"><a href="#description">Informations</a></li><li><a href="#reviews"> Modifier </a></li></ul><div id="myTabContent" class="tab-content custom-product-edit"><div class="product-tab-list tab-pane fade active in" id="description"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><span class="educate-icon educate-info modal-check-pro information-icon-pro"></span><h2>Cour</h2><br><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Enseignant </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop1[i].nom+' '+data.pop1[i].prenom+'</p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Seance </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop1[i].jour+' '+data.pop1[i].heure+' '+data.pop1[i].salle+'</p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Section </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop1[i].nomSec+'</p></div></div></div></div></div></div><div class="product-tab-list tab-pane fade" id="reviews"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="devit-card-custom"><a href="#" class="btn btn-primary waves-effect waves-light">Submit</a></div></div></div></div></div></div></div></div></div></div><div class="modal-footer"><a data-dismiss="modal" href="#">Cancel</a><a href="#">Process</a></div></div></div></div>';}
//var res = data.pop;
//alert(data.pop);
if(data.pop.length!=0){
x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#WarningModalalert">'+data.pop[i].nomG +' -- '+data.pop[i].nom+' </a></div><div id="WarningModalalert" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-close-area modal-close-df"><a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a></div><div class="modal-body"><div class="product-payment-inner-st"><ul id="myTabedu1" class="tab-review-design"><li class="active"><a href="#description">Informations</a></li><li><a href="#reviews"> Modifier </a></li></ul><div id="myTabContent" class="tab-content custom-product-edit"><div class="product-tab-list tab-pane fade active in" id="description"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><span class="educate-icon educate-info modal-check-pro information-icon-pro"></span><h2>Travaux Dirigés (TD)!</h2><br><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Enseignant </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].nom+' '+data.pop[i].prenom+' </p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Seance </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].jour+' '+data.pop[i].heure+' '+data.pop[i].salle+'</p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Groupe  </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].nomG+'</p></div></div></div></div></div></div><div class="product-tab-list tab-pane fade" id="reviews"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="devit-card-custom"><a href="#" class="btn btn-primary waves-effect waves-light">Submit</a></div></div></div></div></div></div></div></div></div></div><div class="modal-footer warning-md"><a data-dismiss="modal" href="#">Annuler</a><a href="#">OK</a></div></div></div></div>';



x2 ='<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#Informationpro">'+data.pop[i].nomG +' -- '+data.pop[i].nom+' </a></div>  <div id="Informationpro" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-close-area modal-close-df"><a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a></div><div class="modal-body"><div class="product-payment-inner-st"><ul id="myTabedu1" class="tab-review-design"><li class="active"><a href="#description">Informations</a></li><li><a href="#reviews"> Modifier </a></li></ul><div id="myTabContent" class="tab-content custom-product-edit"><div class="product-tab-list tab-pane fade active in" id="description"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><span class="educate-icon educate-info modal-check-pro information-icon-pro"></span><h2>Travaux Pratique (TP)!</h2><br><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Enseignant </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].nom+' '+data.pop[i].prenom+' </p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Seance </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].jour+' '+data.pop[i].heure+' '+data.pop[i].salle+'</p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Groupe  </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">'+data.pop[i].nomG+'</p></div></div></div></div></div></div><div class="product-tab-list tab-pane fade" id="reviews"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="devit-card-custom"><a href="#" class="btn btn-primary waves-effect waves-light">Submit</a></div></div></div></div></div></div></div></div></div></div><div class="modal-footer info-md"><a data-dismiss="modal" href="#">Cancel</a><a href="#">Process</a></div></div></div></div>';
}

for( i =0;i<data.pop.length ;i++){
  if(data.pop[i].heure === "8h30" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D8').append(x2);
    }
  }
    if(data.pop[i].heure === "10h" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D10').append(x2);
    }
  }
   if(data.pop[i].heure === "11h30" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D11').append(x2);
    }
  }


     if(data.pop[i].heure === "13h30" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "dimanche"){
    if(data.pop[i].type === 'td' ){
      
      $('#D15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D15').append(x2);
    }
  }
if(data.pop[i].heure === "8h30" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Ma8').append(x2);
    }
  }

if(data.pop[i].heure === "10h" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Ma10').append(x2);
    }
  }
  if(data.pop[i].heure === "11h30" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Ma11').append(x2);
    }
  }
     if(data.pop[i].heure === "13h30" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#D13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "mardi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Ma15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Ma15').append(x2);
    }
  }

if(data.pop[i].heure === "8h30" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
      
      $('#L8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L8').append(x2);
    }
  }

  if(data.pop[i].heure === "10h" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
    $('#L10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L10').append(x2);
    }
  }
    if(data.pop[i].heure === "11h30" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
      
      $('#L11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L11').append(x2);
    }
  }
       if(data.pop[i].heure === "13h30" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
      
      $('#L13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "lundi"){
    if(data.pop[i].type === 'td' ){
      
      $('#L15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#L15').append(x2);
    }
  }
  if(data.pop[i].heure === "8h30" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Me8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me8').append(x2);
    }
  }

  if(data.pop[i].heure === "10h" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
    $('#Me10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me10').append(x2);
    }
  }
    if(data.pop[i].heure === "11h30" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Me11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me11').append(x2);
    }
  }
       if(data.pop[i].heure === "13h30" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Me13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "Mercredi"){
    if(data.pop[i].type === 'td' ){
      
      $('#Me15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#Me15').append(x2);
    }
  }


  if(data.pop[i].heure === "8h30" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
      
      $('#J8').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J8').append(x2);
    }
  }

  if(data.pop[i].heure === "10h" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
    $('#J10').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J10').append(x2);
    }
  }
    if(data.pop[i].heure === "11h30" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
      
      $('#J11').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J11').append(x2);
    }
  }
       if(data.pop[i].heure === "13h30" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
      
      $('#J13').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J13').append(x2);
    }
  }
       if(data.pop[i].heure === "15h" && data.pop[i].jour === "jeudi"){
    if(data.pop[i].type === 'td' ){
      
      $('#J15').append(x3);
     }
    if(data.pop[i].type === 'tp' ){

      $('#J15').append(x2);
    }
  }
  
}



for( i =0;i<data.pop1.length ;i++){
  if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "dimanche"){
 $('#D8').append(x1);
}
    if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "dimanche"){
     $('#D10').append(x1);
    
  }
   if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "dimanche"){
    $('#D11').append(x1);
}
if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "dimanche"){
  $('#D13').append(x1); }

 if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "dimanche"){
  $('#D15').append(x1);
}
if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "mardi"){
 $('#Ma8').append(x1); }

if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "mardi"){
 $('#Ma10').append(x1);
 }
  if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "mardi"){
  $('#Ma11').append(x1); }

  if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "mardi"){
$('#Ma13').append(x1);
 }
 if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "mardi"){
  $('#Ma15').append(x1);
   }

if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "lundi"){
    $('#L8').append(x1); }

  if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "lundi"){
  $('#L10').append(x1);
  
  }
    if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "lundi"){
  $('#L11').append(x1); }

  if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "lundi"){
   $('#L13').append(x1);
     
  }
  if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "lundi"){
    $('#L15').append(x1);
  
  }
  if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "Mercredi"){
  $('#Me8').append(x1);
   
  }

  if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "Mercredi"){
   $('#Me10').append(x1);
   
  }
    if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "Mercredi"){
   $('#Me11').append(x1);
   
  }
   if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "Mercredi"){
  $('#Me13').append(x1);
 
  }
 if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "Mercredi"){
    $('#Me15').append(x1);
  
  }


  if(data.pop1[i].heure === "8h30" && data.pop1[i].jour === "jeudi"){
    $('#J8').append(x1);
   
  }

  if(data.pop1[i].heure === "10h" && data.pop1[i].jour === "jeudi"){
   $('#J10').append(x1);
   
  }
    if(data.pop1[i].heure === "11h30" && data.pop1[i].jour === "jeudi"){
    $('#J11').append(x1);
   
  }
  if(data.pop1[i].heure === "13h30" && data.pop1[i].jour === "jeudi"){
   $('#J13').append(x1);
  
  }
   if(data.pop1[i].heure === "15h" && data.pop1[i].jour === "jeudi"){
    $('#J15').append(x1); }
    

}


  }else{
$("#empForm").css('display','');
$("#tabEmpTemps").css('display','none');
 if(mo3 === 'Cour'){
   // alert("lala");
    $('.c').css('display','');
    $('.c').addClass('active');
    $('.ttd').css('display','none');
    $('.ttp').css('display','none');
    $('#submittedC').css('display','');
    $('#suivC').css('display','none');
    $('#INFORMATION').removeClass('active in');
    $('#reviews').removeClass('active in');
    $('#description').addClass('active in');

  }
  if(mo3 === 'CTd'){
     tp1=2;
     $('.ttd').removeClass('active');
    $('.c').addClass('active');
    $('.c').css('display','');
    $('.ttd').css('display','');
    $('.ttp').css('display','none');
    $('#submittedTD').css('display','');
    $('#suivtd').css('display','none');
    $('#submittedC').css('display','none');
    $('#suivC').css('display','');
    $('#INFORMATION').removeClass('active in');
    $('#reviews').removeClass('active in');
    $('#description').addClass('active in');

  }if(mo3 === 'TP'){
    tp1=1;
 $('.c').css('display','none');
 $('.c').removeClass('active');
 $('.ttd').removeClass('active');
 $('.ttd').css('display','none');
 $('.ttp').css('display','');
 $('.ttp').addClass('active');
 $('#INFORMATION').addClass('active in');
 $('#description').removeClass('active in');
 $('#reviews').removeClass('active in');
  }
  if(mo3 === 'CTp'){
    tp1=2;

  }
   if(mo3 === 'CTT'){
    tp1=2;
$('.ttp').removeClass('active');
$('.ttd').removeClass('active');
$('.c').addClass('active');
$('.c').css('display','');
$('.ttd').css('display','');
$('.ttp').css('display','');
    $('#submittedTD').css('display','none');
    $('#suivtd').css('display','');
    $('#submittedC').css('display','none');
    $('#suivC').css('display','');
    $('#INFORMATION').removeClass('active in');
    $('#description').addClass('active in');
    $('#reviews').removeClass('active in');
    
  }

}
}

});

 });




 
$(document).on('click','#submitCour',function(){
  //alert('hello');
 var tab = new Array();
   var tab1 = new Array();
   var cmpt=0;
   //var i =0;
   var ct =0;
   var ct1 =0;
  $(".formTP").each(function () {
  //  alert("id = "+$(this).attr("id").substring(6));
    var num = $(this).attr("id").substring(6);
  // alert("seances"+$("#seaTP"+num+"").val()+" groupe = "+$("#grpTP"+num+"").val()+"Enseignant"+$("#ensTP"+num+"").val());
 if( $("#seaTP"+num+"").val() == null || $("#grpTP"+num+"").val() == null || $("#ensTP"+num+"").val() == null ){

     cmpt++;
    }else{
         $("#seaTP"+num+" option:selected").each(function () {
              var c=""+$(this).val()+"";
             // alert("c = "+c);
              tab.push(c); 
              });
var c1=""+$("#grpTP"+num+"").val()+"";
             //alert("groupe = "+c1);
              tab1.push(c1); 
     
    
    }
  
});
    if( cmpt >0 ){

    //alert("hi");
     $("#errortp").css("display","");
     
  }else{
      for ( i = 0; i <tab.length ; i++) {

      for ( j = i+1; j <tab.length ; j++) {
      if(tab[i] === tab[j]){
         ct++;
      }
    }

    }
          for ( var i1 = 0; i1 <tab1.length ; i1++) {

      for (var j1 = i1+1; j1 <tab1.length ; j1++) {
      if(tab1[i1] === tab1[j1]){
         ct1++;
      }
    }

    }
     //alert("ct = "+ct+"ct1 = "+ct1);
    if(ct>0 || ct1>0){
       $("#error1tp").css("display","");
       $("#errortp").css("display","none");
    }else{
 // alert("no");
   $("#errortp").css("display","none");
  $("#error1tp").css("display","none");
  var x=0;
var forms = new Array();
 if(tp1 == 2 ){
$(".Cour").each(function(){
 forms[x] = $(this);
// alert($(this).attr("class"));
x++;
});
$(".formTD").each(function(){
 forms[x] = $(this);
// alert($(this).attr("class"));
x++;
});
}

$(".formTP").each(function(){
 forms[x]= $(this);
// alert($(this).attr("class"));
x++;
});
 ajax_recaller(forms);

}
}




});
/*$(document).on('click','#suivC',function(){ 
  alert("suiv");
  $("#c").removeClass("active");
  $("#td").addClass("active");
  //$("#description").hide();
  $("#reviews").show();

});*/
$(".td" ).css( 'pointer-events', 'none' );
$(".tp" ).css( 'pointer-events', 'none' );
$(document).on('click','#submitC',function(){
   var tab = new Array();
    var tab1 = new Array();
   var nbr = $("#nbrSec").val();
   var cmpt=0;
   var i =0;
   var ct =0;
   var ct1 =0;
   while(i<nbr){
 if( $("#ensC"+i+"").val() == null || $("#secC"+i+"").val() == null || $("#seaC"+i+"").val() == null ){
     cmpt++;
    }else{
         $("#seaC"+i+" option:selected").each(function () {
              var c=""+$(this).val()+"";
              //alert(c);
              tab.push(c); 
              });
var c1=""+$("#secC"+i+"").val()+"";
             // alert(c1);
              tab1.push(c1); 
     
    
    }
    i++;
   }
  if( cmpt >0 ){

    alert("hi");
     $("#error").css("display","");
     
  }else{
      for ( i = 0; i <tab.length ; i++) {

      for ( j = i+1; j <tab.length ; j++) {
      if(tab[i] === tab[j]){
         ct++;
      }
    }

    }
          for ( var i1 = 0; i1 <tab1.length ; i1++) {

      for (var j1 = i1+1; j1 <tab1.length ; j1++) {
      if(tab1[i1] === tab1[j1]){
         ct1++;
      }
    }

    }
     alert("ct = "+ct+"ct1 = "+ct1);
    if(ct>0 || ct1>0){
       $("#error1").css("display","");
       $("#error").css("display","none");
    }else{
  //alert("no");
   $("#error").css("display","none");
    $("#error1").css("display","none");
    var x=0;
var forms = new Array();
 
$(".Cour").each(function(){
 forms[x] = $(this);
 //alert($(this).attr("class"));
x++;
});
 ajax_recaller(forms);

 }
}

});

$(document).on('click','#suivC',function(){
 /*alert($("#secC").val());
  alert($("#ensC").val());*/
   //alert($("#seaC1").val());
   var tab = new Array();
    var tab1 = new Array();
   var nbr = $("#nbrSec").val();
   var cmpt=0;
   var i =0;
   var ct =0;
   var ct1 =0;
   while(i<nbr){
 if( $("#ensC"+i+"").val() == null || $("#secC"+i+"").val() == null || $("#seaC"+i+"").val() == null ){
     cmpt++;
    }else{
         $("#seaC"+i+" option:selected").each(function () {
              var c=""+$(this).val()+"";
              //alert(c);
              tab.push(c); 
              });
var c1=""+$("#secC"+i+"").val()+"";
             // alert(c1);
              tab1.push(c1); 
     
    
    }
    i++;
   }
  if( cmpt >0 ){

    //alert("hi");
     $("#error").css("display","");
     
  }else{
      for ( i = 0; i <tab.length ; i++) {

      for ( j = i+1; j <tab.length ; j++) {
      if(tab[i] === tab[j]){
         ct++;
      }
    }

    }
          for ( var i1 = 0; i1 <tab1.length ; i1++) {

      for (var j1 = i1+1; j1 <tab1.length ; j1++) {
      if(tab1[i1] === tab1[j1]){
         ct1++;
      }
    }

    }
    // alert("ct = "+ct+"ct1 = "+ct1);
    if(ct>0 || ct1>0){
       $("#error1").css("display","");
        $("#error").css("display","none");
    }else{
  //alert("no");
   $("#error").css("display","none");
    $("#error1").css("display","none");
  $('.tab-review-design > .active').next('li').find('a').trigger('click');
  $(".td" ).css( 'pointer-events', 'auto' );}
}
  
});
$(document).on('click','#submitTd',function(){
alert("eehoo"); 
   var tab = new Array();
   var tab1 = new Array();
   var cmpt=0;
   //var i =0;
   var ct =0;
   var ct1 =0;
  $(".formTD").each(function () {
    alert("id = "+$(this).attr("id").substring(6));
    var num = $(this).attr("id").substring(6);
   // alert("seances"+$("#seaTD"+num+"").val()+" groupe = "+$("#grpTD"+num+"").val()+"Enseignant"+$("#ensTD"+num+"").val());
 if( $("#seaTD"+num+"").val() == null || $("#grpTD"+num+"").val() == null || $("#ensTD"+num+"").val() == null ){

     cmpt++;
    }else{
         $("#seaTD"+num+" option:selected").each(function () {
              var c=""+$(this).val()+"";
             // alert("c = "+c);
              tab.push(c); 
              });
var c1=""+$("#grpTD"+num+"").val()+"";
             //alert("groupe = "+c1);
              tab1.push(c1); 
     
    
    }
  
});
    if( cmpt >0 ){

    alert("hi");
     $("#errortd").css("display","");
     
  }else{
      for ( i = 0; i <tab.length ; i++) {

      for ( j = i+1; j <tab.length ; j++) {
      if(tab[i] === tab[j]){
         ct++;
      }
    }

    }
          for ( var i1 = 0; i1 <tab1.length ; i1++) {

      for (var j1 = i1+1; j1 <tab1.length ; j1++) {
      if(tab1[i1] === tab1[j1]){
         ct1++;
      }
    }

    }
     alert("ct = "+ct+"ct1 = "+ct1);
    if(ct>0 || ct1>0){
       $("#error1td").css("display","");
       $("#errortd").css("display","none");
    }else{
  alert("no");
   $("#errortd").css("display","none");
$("#error1td").css("display","none");
    var x=0;
var forms = new Array();
 
$(".Cour").each(function(){
 forms[x] = $(this);
 alert($(this).attr("class"));
x++;
});
$(".formTD").each(function(){
 forms[x] = $(this);
 alert($(this).attr("class"));
x++;
});

 ajax_recaller(forms);
  
}
}
});
$(document).on('click','#suivtd',function(){
alert("eehoo"); 
   var tab = new Array();
   var tab1 = new Array();
   var cmpt=0;
   //var i =0;
   var ct =0;
   var ct1 =0;
  $(".formTD").each(function () {
    alert("id = "+$(this).attr("id").substring(6));
    var num = $(this).attr("id").substring(6);
   // alert("seances"+$("#seaTD"+num+"").val()+" groupe = "+$("#grpTD"+num+"").val()+"Enseignant"+$("#ensTD"+num+"").val());
 if( $("#seaTD"+num+"").val() == null || $("#grpTD"+num+"").val() == null || $("#ensTD"+num+"").val() == null ){

     cmpt++;
    }else{
         $("#seaTD"+num+" option:selected").each(function () {
              var c=""+$(this).val()+"";
             // alert("c = "+c);
              tab.push(c); 
              });
var c1=""+$("#grpTD"+num+"").val()+"";
             //alert("groupe = "+c1);
              tab1.push(c1); 
     
    
    }
  
});
    if( cmpt >0 ){

    alert("hi");
     $("#errortd").css("display","");
     
  }else{
      for ( i = 0; i <tab.length ; i++) {

      for ( j = i+1; j <tab.length ; j++) {
      if(tab[i] === tab[j]){
         ct++;
      }
    }

    }
          for ( var i1 = 0; i1 <tab1.length ; i1++) {

      for (var j1 = i1+1; j1 <tab1.length ; j1++) {
      if(tab1[i1] === tab1[j1]){
         ct1++;
      }
    }

    }
     alert("ct = "+ct+"ct1 = "+ct1);
    if(ct>0 || ct1>0){
       $("#error1td").css("display","");
       $("#errortd").css("display","none");
    }else{
  alert("no");
   $("#errortd").css("display","none");
     $("#error1td").css("display","none");
  $('.tab-review-design > .active').next('li').find('a').trigger('click');
  $(".td" ).css( 'pointer-events', 'auto' );}
}
  
});

  $(document).on('click','#precTD',function(){
  $('.tab-review-design > .active').prev('li').find('a').trigger('click');
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
             <div id="InformationproModalalert" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-body">
                                        <i class="educate-icon educate-checked modal-check-pro"></i>
                                        <h2>Emplois du temps Enregistré</h2>
                                        <p>The Modal plugin is a dialog box/popup window that is displayed on top of the current page</p>
                                    </div>
                                    <div class="modal-footer info-md">
                                        <a data-dismiss="modal" href="#">Annuler</a>
                                        <form action="{{url('popEmp')}}" method="post" id="popEmp">
                                      {!! csrf_field() !!}
                                       <input type="hidden" name="modhid">
                                       <button type="submit"> ok </button>
                                      </form>
                                       <a href="#" id="popTab">valider</a>
                                    </div>
                                </div>
                            </div>
                        </div>
              <div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <form action="{{url('empMod')}}" method="post" id="popMod">
                                      {!! csrf_field() !!}
                                    <div class="modal-body">
                                                             <div class="alert-wrap1 shadow-inner wrap-alert-b">
                                <div class="alert alert-danger alert-mg-b" role="alert" id="alertreq" style="display: none;">
                                <strong>Erreur!</strong> Vous devez remplisser le champs.
                            </div></div>
                                        <i class="educate-icon educate-checked modal-check-pro"></i>
                                        <h2>Modules</h2>
                                        <div class="form-group-inner"><div class="chosen-select-single mg-b-20"><select name="moduleCh" class="chosen-select error" tabindex="-1" id="" >
                                         <option value="" disabled selected>Select your option</option>
                                         @foreach($mods as $m)
                                 <option value="{{$m->idMod}}">{{$m->nom}} ({{$m->code}})</option> 
                                          @endforeach
                               </select></div></div>
                                    </div>
                                     </form>
                                    <div class="modal-footer">
                                        <a data-dismiss="modal" href="#">Annuler</a>
                                        <a href="#" id="subMod">valider</a>
                                    </div>
                                   
                                </div>
                            </div>
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
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                

                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <input type="hidden" name="nbrSec" id="nbrSec" value="{{ $nbr}}">
    <div class="product-status-wrap drp-lst">
                            <h4>Emploi du temps</h4>
                            <br>
                            <div class="row ">           
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              
                    <label class="login2"> Module</label>  
                   <div class="form-group">
                  
      <input name="nameasset" type="text" class="form-control" id="nameMod" value="Module" readonly>
                  
           
                            </div>
                  
                                                        
                                                            </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class="login2"> Module</label>  
                                                    <div class="form-group">
                                                        <div class="chosen-select-single mg-b-20">
                                        
          <form action="{{url('empMod')}}" method="post" id="selectMod">
                                      {!! csrf_field() !!}
         <select data-placeholder="Choose a Country..." id="selMod" class="chosen-select" tabindex="-1" name="moduleCh">
               <option value="" selected>Selectionner</option>
                @foreach($mods as $m)
                <option value="{{$m->idMod}}">{{$m->nom}} ({{$m->code}})</option> 
               @endforeach
                                                      
                                                        
         </select>
        </form>
                                            </div>
                                                               
                                                       </div>
                                                          
                                                            </div>
                            
                                                        </div></div>
                                                      </div>
                                                    </div>
                                                    </div>
                                                    </div>
<div class="single-pro-review-area mt-t-30 mg-b-15" id="empForm">
            <div class="container-fluid">
                

                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   

                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li  class="c active"><a href="#description">Cours</a></li>
                                <li class="ttd"><a class="td" href="#reviews" > Travaux dirigé (TD) </a></li>
                                <li class="ttp"><a class="tp" href="#INFORMATION">Travaux pratiques (TP)</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                         <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="review-content-section">
                                               

                                   <div id="dropzone1" class="multi-uploader-cs">
                                <div  class="dropzone dropzone-custom "  id="sectionC" >
                                  
                                   <div class="alert-wrap1 shadow-inner wrap-alert-b">
                                <div class="alert alert-danger alert-mg-b" role="alert" id="error" style="display: none;">
                                <strong>Erreur!</strong> Vous devez remplisser tout les champs.
                            </div>
                            <br>
                            <div class="alert alert-danger alert-mg-b" role="alert" id="error1" style="display: none;">
                                <strong>Erreur!</strong> les séances sont identiques!!
                            </div>
                          </div>
                                  <?php $i=0; while ($i<$nbr) { ?>
                                    
                                 
                                    <div class="row ">
                          
                              <form class="Cour" id="groupe{{$i}}" method="post" action="{{ url('empCour') }}"> {!! csrf_field() !!} <fieldset class="dropzone dropzone-custom" style="border-color:grey; border-width: 3px;" ><br><div class="row ">
                               <input type="hidden" name="idmodule" value=""><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Enseignant</label><div class="form-group-inner"><div class="chosen-select-single mg-b-20"><select name="idens" class="chosen-select error" tabindex="-1" id="ensC{{$i}}" > <option value="" disabled selected>Select your option</option>
                                  @foreach($pro as $p)<option value="{{$p->idEns}}">{{$p->nom}} {{$p->nom}}</option>@endforeach</select></div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Section</label><div class="form-group-inner"><div class="chosen-select-single mg-b-20"><select id="secC{{$i}}" name="idsec" class="chosen-select" id="group" tabindex="-1"> <option value="" disabled selected>Select your option</option>
                                    @foreach($sec as $s)<option value="{{$s->idSec}}">{{$s->nomSec}} </option>@endforeach</select></div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Séances </label><div class="form-group-inner"  id="module"><div class="chosen-select-single"><select id="seaC{{$i}}" data-placeholder="Choisir une seance" class="chosen-select" multiple="multiple" id="seance" name="idsea[]">@foreach($seances as $sea)<option value="{{$sea->idSea}}">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}</option>@endforeach</select></div></div></div></div></fieldset></form>
                                  <br>
                            </div> 
                             <?php $i++;} ?>
                          </div>
                                                </div>
                                                
                                               
                                                  <div class="modal-bootstrap shadow-inner mg-tb-30 responsive-mg-b-0 pull-right">
                                                  <div class="modal-area-button">
                                                  <a class="Primary mg-b-10"  id="suivC" >suivant</a>
                                              </div>
                                            </div>
<div class="modal-bootstrap shadow-inner mg-tb-30 responsive-mg-b-0 pull-right" style="display: none" id="submittedC">
                                                  <div class="modal-area-button">
                                                  <a class="Primary mg-b-10"  id="submitC" >valider</a>
                                              </div>
                                            </div>
                                               
                                            </div>
                                     
  

<br><br>
    





                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                  <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               
                                            <div class="review-content-section">
                                                         <div class="alert-wrap1 shadow-inner wrap-alert-b">
                                <div class="alert alert-danger alert-mg-b" role="alert" id="errortd" style="display: none;">
                                <strong>Erreur!</strong> Vous devez remplisser tout les champs.
                            </div>
                            <br>
                            <div class="alert alert-danger alert-mg-b" role="alert" id="error1td" style="display: none;">
                                <strong>Erreur!</strong> les séances sont identiques!!
                            </div>
                          </div>
                          <br>
                                             
                                              <?php $var=1; ?>
                                              @foreach($sec as $s)
                                              <input type="hidden" name="{{$s->idSec}}">
                                                <div id="dropzone1" class="multi-uploader-cs">
                                <div  class="dropzone dropzone-custom " id="section{{$var}}">
                                    <div class="row " id="row2">
                           <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                           
                                <div class="main-sparkline15-hd pull-right">
                                    <h1 style="color: #006DF0;">Section : {{$s->nomSec}} </h1>
                                  
                                </div>
                            
                                  </div>
                                  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">  
                                   <div class="button-ap-list responsive-btn">
                                <div class="button-style-four btn-mg-b-10 pull-right">
                                    <button type="button" id="ajouterTD{{$var}}"
                                    class="btn btn-custon-four btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                </div>

                            </div>
                           
                            
                                <br>      
        
                                                    </div>
                                                    <?php $var++; ?>
                                                </div>
                                                <br>


                                                @endforeach
                                            </div>
                                            
                                             <div class="login-horizental pull-right">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="suivtd">Suivant</button>
                                                                                            </div>
               <div class="login-horizental pull-right" style="display: none;" id="submittedTD">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="submitTd">Submit</button>
                                                                                            </div>     <div class="login-horizental pull-right">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="precTD">précédent </button>
                                                                                            </div>
                                        </div>
                                    </div>

<br><br>
   
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    
                                   
                                            <div class="review-content-section">
                                                          <div class="alert-wrap1 shadow-inner wrap-alert-b">
                                <div class="alert alert-danger alert-mg-b" role="alert" id="errortp" style="display: none;">
                                <strong>Erreur!</strong> Vous devez remplisser tout les champs.
                            </div>
                            <br>
                            <div class="alert alert-danger alert-mg-b" role="alert" id="error1tp" style="display: none;">
                                <strong>Erreur!</strong> les séances sont identiques!!
                            </div>
                          </div>
                                                  <?php $var=1; ?>
                                              @foreach($sec as $s)
                                              <input type="hidden" name="{{$s->idSec}}">
                <div id="dropzone1" class="multi-uploader-cs">
                                <div  class="dropzone dropzone-custom " id="sectionTP{{$var}}">
                                    <div class="row " >
                           <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                            <div class="sparkline15-hd pull-right">
                                <div class="main-sparkline15-hd">
                                    <h1 style="color: #006DF0;" >Section :{{$s->nomSec}} </h1>
                                </div>
                            </div>
                                  </div>
                                  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">  
                                   <div class="button-ap-list responsive-btn">
                                <div class="button-style-four btn-mg-b-10 pull-right">
                                    <button type="button" id="ajouterTP{{$var}}"
                                    class="btn btn-custon-four btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                </div>
                            </div> 
                                      
     
                                                    </div>
                                                </div>
                                                <br>
                                                <?php $var++; ?> 
                                                @endforeach
                                            </div>
                                                 <div class="login-horizental pull-right">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="submitCour">Submit</button>
                                                                                            </div>
                                               <div class="login-horizental pull-right">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="precTD">précédent </button>
                                                                                            </div>
                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

 <div class="product-status mg-b-15" id="tabEmpTemps" style="display: none;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                          <div class="asset-inner table-responsive">
                                <table>
                                    <tr><th></th>
                                        <th>8h30</th>
                                        <th>10h</th>
                                        <th>11h30</th>
                                        <th>13h</th>
                                        <th>13h30</th>
                                        <th>15h</th>
                                        <th>16h30</th>
                                    </tr>
                                     <tr>
                                        <th >Dimanche</th>
                                        <td id="D8"></td>
                                        <td id="D10"></td>
                                        <td id="D11"></td>
                                         <td></td>
                                        <td id="D13"></td>
                                        <td id="D15"></td>
                                        <td></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <th>Lundi</th>
                                        <td id="L8"></td>
                                        <td id="L10"></td>
                                        <td id="L11"></td>
                                         <td></td>
                                        <td id="L13"></td>
                                        <td id="L15"></td>
                                        <td></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <th>Mardi</th>
                                        <td id="Ma8"></td>
                                        <td id="Ma10"></td>
                                        <td id="Ma11"></td>
                                         <td></td>
                                        <td id="Ma13"></td>
                                        <td id="Ma15"></td>
                                        <td></td>

                                       
                                       
                                    </tr>
                                    <tr>
                                        <th>Mercredi</th>
                                        <td id="Me8"></td>
                                        <td id="Me10"></td>
                                        <td id="Me11"></td>
                                         <td></td>
                                        <td id="Me13"></td>
                                        <td id="Me15"></td>
                                        <td></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <th>Jeudi</th>
                                        <td id="J8"></td>
                                        <td id="J10"></td>
                                        <td id="J11"></td>
                                         <td></td>
                                        <td id="J13"></td>
                                        <td id="J15"></td>
                                        <td></td>
                                       
                                       
                                    </tr>
                                </table>
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