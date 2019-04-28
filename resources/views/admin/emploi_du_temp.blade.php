@extends('layouts.header')

@section('title','Emploi du Temps')
@section('js')
 
  <script >

$(document).ready(function(){
  $(document).on("click","#add",function(){
   $.ajax({
type: "POST",
data: $('#addSeance').serialize(),                             // to submit fields at once
url: $('#addSeance').attr('action'),                        // use the form's action url
success: function(data) {
    alert("add wit ");
}
}); 

  });
 var tp1 = 0;
/* this is our ajax function created for an arrayed forms */
var called = 0;
var nmbr=0 ;

//alert(tp1);
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
            var text ='<form class="formTD" method="post" id="groupe'+i+'" action="{{ url("empTD") }}">'+
            '{!! csrf_field() !!}'+
            '<fieldset class="dropzone dropzone-custom" style="border-color:grey; border-width: 3px;" >'+ 
            '<div class="row">'+
            '<div class="button-ap-list responsive-btn pull-right"><div class="button-style-four btn-mg-b-10">'+
            '<button type="button" class="btn btn-custon-rounded-four btn-danger" id="'+i+'">'+
            '<i class="fa fa-times edu-danger-error" aria-hidden="true"></i> </button></div></div></div><div class="row "><input class="hiddenid" type="hidden" name="idmodule" value=""><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Enseignant</label><div class="form-group"><div class="chosen-select-single mg-b-20">'+
        '<select name="idensTD" class="chosen-select" tabindex="-1" id="ensTD'+i+'">'+

        '@foreach($pro as $p)'+

        '<option value="{{$p->idEns}}">{{$p->nom}} {{$p->prenom}}</option>'+
        '@endforeach'+
        '</select>'+
        '</div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Groupe</label><div class="form-group"><div class="chosen-select-single mg-b-20"><select id="grpTD'+i+'" name="idgrpTD" class="chosen-select" tabindex="-1">@foreach($groupes as $grp)<option value="{{$grp->idG}}">{{$grp->nomG}} </option>@endforeach</select></div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Séances </label><div class="form-group-inner"  id="module"><div class="chosen-select-single"><select name="idseaTD[]" data-placeholder="Choisir une seance" class="chosen-select" multiple="multiple" id="seaTD'+i+'">@foreach($seancesTD as $sea)<option value="{{$sea->idSea}}">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}</option>@endforeach</select></div></div></div></div></fieldset></form><div id="saute'+i+'"><br></div>';
               // alert("k="+l+" i ="+i);
           
      
$("#section"+kl+"").append(text);
$(".chosen_select").chosen();
//$(".chosen-select").trigger('chosen:updated');
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
$(".chosen-select").chosen();
//$(".chosen-select").trigger('chosen:updated');
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
    $("#popnew").css('display','');
    //alert("L1= "+data.pop1.length);alert("L2="+data.pop.length);
 $('.ch > option').remove();
 $('.sea > option').remove();
  if(mo3 ==="CTT"){
    $('.ch').append('<option disabled selected>Select your opyion </option><option selected> Cour </option><option selected> TD </option><option selected> TP </option>');
    $('.ch').trigger("chosen:updated");
     $('#newGrpRow').css('display','none');
      $('#newSecRow').css('display','none');
  }
    if(mo3 ==="CTd"){
$('.ch').append('<option disabled selected>Select your opyion </option><option selected> Cour </option><option selected> TD </option>');
    $('.ch').trigger("chosen:updated");
     $('#newGrpRow').css('display','none');
      $('#newSecRow').css('display','none');
  }
  if(mo3 ==="CTp"){
    $('.ch').append('<option disabled selected>Select your opyion </option><option selected> Cour </option><option selected> TP </option>');
    $('.ch').trigger("chosen:updated");
     $('#newGrpRow').css('display','none');
      $('#newSecRow').css('display','none');
  }
alert(mo3);
    if(mo3 ==="Cour"){
    
    $('.ch').append('<option selected> Cour </option>');
    $('.ch').trigger("chosen:updated");
    $('#newGrpRow').css('display','none');
    $('#newSecRow').css('display','');
    $('.sea').append("<option disabled selected>Select your opyion </option>@foreach($cour as $sea)<option >{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}  </option>@endforeach");
    $('.sea').trigger("chosen:updated");

  }

    if(mo3 ==="TP"){
        alert("hi");
     $('.ch').append('<option selected> TP </option>');
    $('.ch').trigger("chosen:updated");
    $('#newSecRow').css('display','none');
    $('#newGrpRow').css('display','');
    $('.sea').append("<option disabled selected>Select your opyion </option>@foreach($tp as $sea)<option>{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}  </option>@endforeach");
    $('.sea').trigger("chosen:updated");
  }

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
$("#popnew").css('display','none');
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
 $('#precTD').css('display','none');
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
    var id = forms[called].attr("id").substring(6);
    alert(id);
$.ajax({
type: "POST",
data: forms[called].serialize(),                             // to submit fields at once
url: forms[called].attr('action'),                        // use the form's action url
success: function(data) {

    /**/
 //forms[called].reset();
called++;                                                                 // this will serve as a key
 
if(called < forms.length) {
ajax_recaller(forms);                                            // call the ajax function again
} else {
called=0;

 $(".chosen-select option:selected").removeAttr('selected');
    $(".chosen-select").trigger('chosen:updated');
 
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
  $('.ch > option').remove();
 $('.sea > option').remove();
  if(mo3 ==="CTT"){
    $('.ch').append('<option disabled selected>Select your opyion </option><option > Cour </option><option > TD </option><option> TP </option>');
    $('.ch').trigger("chosen:updated");
  }
    if(mo3 ==="CTd"){
$('.ch').append('<option disabled selected>Select your opyion </option><option > Cour </option><option > TD </option>');
    $('.ch').trigger("chosen:updated");
  }
  if(mo3 ==="CTp"){
    $('.ch').append('<option disabled selected>Select your opyion </option><option > Cour </option><option > TP </option>');
    $('.ch').trigger("chosen:updated");
  }
alert(mo3);
    if(mo3 ==="Cour"){
    
    $('.ch').append('<option selected> Cour </option>');
    $('.ch').trigger("chosen:updated");
    $('#newGrpRow').css('display','none');
    $('#newSecRow').css('display','');
    $('.sea').append("@foreach($cour as $sea)<option >{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}  </option>@endforeach");
    $('.sea').trigger("chosen:updated");

  }

    if(mo3 ==="TP"){
        alert("hi");
     $('.ch').append('<option selected> TP </option>');
    $('.ch').trigger("chosen:updated");
    $('#newSecRow').css('display','none');
    $('#newGrpRow').css('display','');
    $('.sea').append("@foreach($tp as $sea)<option>{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}  </option>@endforeach");
    $('.sea').trigger("chosen:updated");
  }

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
    $("#popnew").css('display','');
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
$("#popnew").css('display','none');
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

$(document).on('change','#newType',function(){
 var type=$("#newType").val();
 $('.sea > option').remove();
 if(type === "Cour"){
    $("#newSecRow").css('display','');
    $("#newGrpRow").css('display','none');
   $('.sea').append("@foreach($cour as $sea)<option >{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}  </option>@endforeach");
    $('.sea').trigger("chosen:updated");
 }
  if(type === "TP"){
    $("#newSecRow").css('display','none');
    $("#newGrpRow").css('display','');
   $('.sea').append("@foreach($tp as $sea)<option >{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}  </option>@endforeach");
    $('.sea').trigger("chosen:updated");
 }
   if(type === "TD"){
    $("#newSecRow").css('display','none');
    $("#newGrpRow").css('display','');
   $('.sea').append("@foreach($tp as $sea)<option >{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}  </option>@endforeach");
    $('.sea').trigger("chosen:updated");
 }
});

 
$(document).on('click','#submitCour',function(){
  alert('hello');
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
     //alert("ct = "+ct+"ct1 = "+ct1);
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
//alert("eehoo"); 
   var tab = new Array();
   var tab1 = new Array();
   var cmpt=0;
   //var i =0;
   var ct =0;
   var ct1 =0;
  $(".formTD").each(function () {
   // alert("id = "+$(this).attr("id").substring(6));
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

   // alert("hi");
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
     //alert("ct = "+ct+"ct1 = "+ct1);
    if(ct>0 || ct1>0){
       $("#error1td").css("display","");
       $("#errortd").css("display","none");
    }else{
 // alert("no");
   $("#errortd").css("display","none");
$("#error1td").css("display","none");
    var x=0;
var forms = new Array();
 
$(".Cour").each(function(){
 forms[x] = $(this);
 //alert($(this).attr("class"));
x++;
});
$(".formTD").each(function(){
 forms[x] = $(this);
 //alert($(this).attr("class"));
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
    //alert("id = "+$(this).attr("id").substring(6));
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

    //alert("hi");
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
   //  alert("ct = "+ct+"ct1 = "+ct1);
    if(ct>0 || ct1>0){
       $("#error1td").css("display","");
       $("#errortd").css("display","none");
    }else{
  //alert("no");
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

@endsection

    
     @section('sidebar')
  
     @include('layouts.sidebarAdmin2')

     @endsection
    @section('mobileSidebar')
  
     @include('layouts.mobileSidebar2')

     @endsection

    
                                        @section('search')
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Semestre</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">{{$semestre->nomSem}}/Emploi du Temps</span>
                                            </li>
                                        </ul>
                                        @endsection
                                         @section('content')
                                          <div id="InformationproModalalert" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-body">
                                        <i class="educate-icon educate-checked modal-check-pro" style="color: #8e44ad;"></i>
                                        <h2>Emplois du temps Enregistré</h2>
                                        
                                    </div>
                                    <div class="modal-footer info-md">
                                        
                                        <form action="{{url('popEmp')}}" method="post" id="popEmp">
                                      {!! csrf_field() !!}
                                       <input type="hidden" name="modhid">
                                       
                                      </form>
                                       <a href="#" id="popTab" style="background: #8e44ad">OK</a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    
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
                                      
                                        <a href="#" id="subMod">valider</a>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
 

        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                

                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <input type="hidden" name="nbrSec" id="nbrSec" value="{{$nbr}}">
    <div class="product-status-wrap drp-lst">
                            <h4>Emploi du temps</h4>
                            <br>
                            <div class="row ">           
                             <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                              
                    <label class="login2"> Module</label>  
                   <div class="form-group">
                  
      <input name="nameasset" type="text" class="form-control" id="nameMod" value="Module" readonly>
                  
           
                            </div>
                  
                                                        
                                                            </div>
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
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
                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <br> 
                     <div class="modal-area-button" id="popnew" style="display: none">
    <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#nouvel" > <i class="fa fa-plus">  </i></a> </div>
      <div id="nouvel" class="modal  modal-edu-general default-popup-PrimaryModal fade" role="dialog"><div class="modal-dialog">
        <div class="modal-content"><div class="modal-close-area modal-close-df"><a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a></div>
        <div class="modal-body">
            
        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="review-content-section">
                                <span class="educate-icon educate-info modal-check-pro information-icon-pro"></span><h2 style="color:#006DF0;">Nouvelle Séance</h2><br>
                                <form action="{{url('addSeance')}}" method="post" id="addSeance">
                                    <input type="text" name="idmodule" value="">
                                            <div class="row">

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><h4>Type </h4></div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                                        <div class="form-group-inner"><div class="chosen-select-single mg-b-20"><select  name="newType" class="chosen-select ch" id="newType" tabindex="-1"> <option value="" disabled selected>Select your option</option>

                                   </select></div></div>
                                    </div></div>
                                
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><h4>Enseignant </h4></div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                                        <div class="form-group-inner"><div class="chosen-select-single mg-b-20"><select id="" name="newEns" class="chosen-select" id="newEns" tabindex="-1"> <option value="" disabled selected>Select your option</option>
                                    @foreach($pro as $p)<option value="{{$p->idEns}}">{{$p->nom}}{{$p->nom}} </option>@endforeach</select></div></div>
                                    </div></div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <h4>Seance </h4></div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="form-group-inner"  id="module">
                                            <div class="chosen-select-single">
                                                <select id="newSeance" data-placeholder="Choisir une seance" class="chosen-select sea" multiple="multiple"  name="newSeance">@foreach($seancesTP as $sea)
                                                <option value="{{$sea->idSea}}">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}</option>
                                            @endforeach</select>
                                        </div>
                                        </div>
                                       </div>
                                    </div>
                                    <br>
                                        <div class="row" id="newGrpRow" style="display: none;">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><h4>Groupe  </h4></div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <div class="form-group-inner">
                                                    <div class="chosen-select-single mg-b-20"><select id="newGrp" name="newGrp" class="chosen-select" id="group" tabindex="-1">
                                                     <option value="" disabled selected>Select your option</option>
                                    @foreach($sec as $s)<option value="{{$s->idSec}}">{{$s->nomSec}} </option>@endforeach</select></div></div></div></div>
                                              <div class="row" id="newSecRow" style="display: none;">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><h4>Section  </h4></div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <div class="form-group-inner">
                                                    <div class="chosen-select-single mg-b-20"><select id="newSec" name="newSec" class="chosen-select" id="group" tabindex="-1">
                                                     <option value="" disabled selected>Select your option</option>
                                    @foreach($sec as $s)<option value="{{$s->idSec}}">{{$s->nomSec}} </option>@endforeach</select></div></div></div></div>
                                        <div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="devit-card-custom"><a href="#" class="btn btn-primary waves-effect waves-light" id="add">Ajouter</a></div></div></div>
                                        </form>

                                    </div>


                                        

                                </div></div>


                            </div></div>
                        </div></div>
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
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <form class="Cour" id="groupe{{$i}}" method="post" action="{{ url('empCour') }}"> 
    {!! csrf_field() !!} 
    <fieldset class="dropzone dropzone-custom" style="border-color:grey; border-width: 2px;" ><br><div class="row ">
                               <input type="hidden" name="idmodule" value="">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label class="login2"> Enseignant</label>
                        <div class="form-group-inner"><div class="chosen-select-single mg-b-20"><select name="idens" class="chosen-select" tabindex="-1" id="ensC{{$i}}" > <option value="" disabled selected>Select your option</option>
                                  @foreach($pro as $p)<option value="{{$p->idEns}}">{{$p->nom}} {{$p->nom}}</option>@endforeach</select></div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Section</label><div class="form-group-inner"><div class="chosen-select-single mg-b-20"><select id="secC{{$i}}" name="idsec" class="chosen-select" id="group" tabindex="-1"> <option value="" disabled selected>Select your option</option>
                                    @foreach($sec as $s)<option value="{{$s->idSec}}">{{$s->nomSec}} </option>@endforeach</select></div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Séances </label><div class="form-group-inner"  id="module"><div class="chosen-select-single"><select id="seaC{{$i}}" data-placeholder="Choisir une seance" class="chosen-select" multiple="multiple" id="seance" name="idsea[]">@foreach($seances as $sea)<option value="{{$sea->idSea}}">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}</option>@endforeach</select></div></div></div></div></fieldset></form>
                                
                               </div>   
                            </div>
                            <br> 
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
                                             <div class="login-btn-inner">
                                             <div class="login-horizental pull-right">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="suivtd">Suivant</button>  </div>
        
               <div class="login-horizental pull-right" style="display: none;" id="submittedTD">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="submitTd">Valider</button>
                                         </div> 
                                         <div class="login-horizental pull-right">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="precTD">précédent </button>
          </div>
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
<div class="login-btn-inner">
                                                 <div class="login-horizental pull-right">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="submitCour">Valider</button>
          </div>
           </div>
                                            <div class="login-btn-inner">                                               
                                               <div class="login-horizental pull-right">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="precTD">précédent </button>
                                                               </div>  </div>


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



@endsection