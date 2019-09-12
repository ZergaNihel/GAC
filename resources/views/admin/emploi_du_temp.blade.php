@extends('layouts.header')

@section('title','Emploi du Temps')
@section('js')
 
  <script >

$(document).ready(function(){
    $("#InformationCour").on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget).data('ensn');
    var b = $(event.relatedTarget).data('ensp');
    var d = $(event.relatedTarget).data('sec');
    var e = $(event.relatedTarget).data('seaj');
    var f = $(event.relatedTarget).data('seah');
    var g = $(event.relatedTarget).data('seas');
  var h = $(event.relatedTarget).data('id');

    var m = $(this)
    m.find('#ens').text(a+" "+b);
    m.find("#supID").val(h);
    m.find('#sea').text(e+" "+f+" "+g);
    m.find("#sec").text(d);
   

});
         $("#InformationTP").on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget).data('ensn');
    var b = $(event.relatedTarget).data('ensp');
    var d = $(event.relatedTarget).data('grp');
    var e = $(event.relatedTarget).data('seaj');
    var f = $(event.relatedTarget).data('seah');
    var g = $(event.relatedTarget).data('seas');
    var h = $(event.relatedTarget).data('id');

   // var h = $(event.relatedTarget).data('sec');

//alert("e="+e+"a="+a+"b="+b+""+f+""+g);
    var m = $(this)
    m.find('#ens').text(a+" "+b);
    m.find("#supID").val(h);
   
    m.find('#sea').text(e+" "+f+" "+g);
    m.find("#grp").text(d);
   

   // alert(m.find("#idGroupe_etu").val());
    //m.find('#prepend-big-btn').val(c);
});
  $("#InformationTD").on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget).data('ensn');
    var b = $(event.relatedTarget).data('ensp');
    var d = $(event.relatedTarget).data('grp');
    var e = $(event.relatedTarget).data('seaj');
    var f = $(event.relatedTarget).data('seah');
    var g = $(event.relatedTarget).data('seas');
     var h = $(event.relatedTarget).data('id');

   // var h = $(event.relatedTarget).data('sec');

//alert("e="+e+"a="+a+"b="+b+""+f+""+g);
    var m = $(this)
     m.find("#supID").val(h);
    m.find('#ens').text(a+" "+b);
    m.find('#sea').text(e+" "+f+" "+g);
    m.find("#grp").text(d);
   

   // alert(m.find("#idGroupe_etu").val());
    //m.find('#prepend-big-btn').val(c);
});

seance = function(pop){
var x1;
var x2;
var x3;

if(pop[i].heure === "8h30" && pop[i].jour === "dimanche"){

    if(pop[i].type === "td" ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#D8').append(x3);
     }
    if(pop[i].type === "tp" ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#D8').append(x2);
    }
    if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#D8').append(x1); 
    }
  }
    if(pop[i].heure === "10h" && pop[i].jour === "dimanche"){
    if(pop[i].type === "td" ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#D10').append(x3);
     }
    if(pop[i].type === "tp" ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#D10').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#D10').append(x1); 
    }
  }
   if(pop[i].heure === "11h30" && pop[i].jour === "dimanche"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#D11').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#D11').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#D11').append(x1); 
    }
  }


     if(pop[i].heure === "13h30" && pop[i].jour === "dimanche"){
    if(pop[i].type === 'td' ){
     x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#D13').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#D13').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#D13').append(x1); 
    }
  }
       if(pop[i].heure === "15h" && pop[i].jour === "dimanche"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#D15').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#D15').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#D15').append(x1); 
    }
  }
if(pop[i].heure === "8h30" && pop[i].jour === "mardi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+data.pop1[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Ma8').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Ma8').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#Ma8').append(x1); 
    }
  }

if(pop[i].heure === "10h" && pop[i].jour === "mardi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Ma10').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Ma10').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#Ma10').append(x1); 
    }
  }
  if(pop[i].heure === "11h30" && pop[i].jour === "mardi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Ma11').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Ma11').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#Ma11').append(x1); 
    }
  }
     if(pop[i].heure === "13h30" && pop[i].jour === "mardi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Ma13').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Ma13').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#Ma13').append(x1); 
    }
  }
       if(pop[i].heure === "15h" && pop[i].jour === "mardi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Ma15').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Ma15').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#Ma15').append(x1); 
    }
  }

if(pop[i].heure === "8h30" && pop[i].jour === "lundi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+data.pop1[i].jour+'" data-seah="'+data.pop1[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#L8').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#L8').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#L8').append(x1); 
    }
  }

  if(pop[i].heure === "10h" && pop[i].jour === "lundi"){
    if(pop[i].type === 'td' ){
        x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
    $('#L10').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#L10').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#L10').append(x1); 
    }
  }
    if(pop[i].heure === "11h30" && pop[i].jour === "lundi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#L11').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#L11').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#L11').append(x1); 
    }
  }
       if(pop[i].heure === "13h30" && pop[i].jour === "lundi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#L13').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#L13').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#L13').append(x1); 
    }
  }
       if(pop[i].heure === "15h" && pop[i].jour === "lundi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#L15').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#L15').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#L15').append(x1); 
    }
  }
  if(pop[i].heure === "8h30" && pop[i].jour === "mercredi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Me8').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Me8').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#Me8').append(x1); 
    }
  }

  if(pop[i].heure === "10h" && pop[i].jour === "mercredi"){
    if(pop[i].type === 'td' ){
        x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+data.pop1[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
    $('#Me10').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Me10').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#Me10').append(x1); 
    }
  }
    if(pop[i].heure === "11h30" && pop[i].jour === "mercredi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Me11').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Me11').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#Me11').append(x1); 
    }
  }
       if(pop[i].heure === "13h30" && pop[i].jour === "mercredi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Me13').append(x3);
     }
    if(pop[i].type === "tp" ){

        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Me13').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#Me13').append(x1); 
    }
  }
       if(pop[i].heure === "15h" && pop[i].jour === "mercredi"){
    if(pop[i].type === 'td' ){
     x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>'; 
      $('#Me15').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Me15').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#Me15').append(x1); 
    }
  }


  if(pop[i].heure === "8h30" && pop[i].jour === "jeudi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#J8').append(x3);
     }
    if(pop[i].type === 'tp' ){
x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+data.pop1[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#J8').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#J8').append(x1); 
    }
  }

  if(pop[i].heure === "10h" && pop[i].jour === "jeudi"){
    if(pop[i].type === 'td' ){
        x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
    $('#J10').append(x3);
     }
    if(pop[i].type === 'tp' ){
x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';
      $('#J10').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#J10').append(x1); 
    }
  }
    if(pop[i].heure === "11h30" && pop[i].jour === "jeudi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#J11').append(x3);
     }
    if(pop[i].type === 'tp' ){
x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';
      $('#J11').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#J11').append(x1); 
    }
  }
       if(pop[i].heure === "13h30" && pop[i].jour === "jeudi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#J13').append(x3);
     }
    if(pop[i].type === 'tp' ){
x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';
      $('#J13').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#J13').append(x1); 
    }
  }
       if(pop[i].heure === "15h" && pop[i].jour === "jeudi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#J15').append(x3);
     }
    if(pop[i].type === 'tp' ){
x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';
      $('#J15').append(x2);
    }
        if(pop[i].type === "Cour" ){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-sec="'+pop[i].nomSec+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomSec+' </a>'+
 '</div>';
    $('#J15').append(x1); 
    }
  }


}

emploi_du_temps = function(pop,pop1){
var x1;
var x2;
var x3;
var i;

if(pop.length > 0){
  for( i =0;i<pop.length ;i++){


  if(pop[i].heure === "8h30" && pop[i].jour === "dimanche"){

    if(pop[i].type === "td" ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#D8').append(x3);
     }
    if(pop[i].type === "tp" ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#D8').append(x2);
    }
  }
    if(pop[i].heure === "10h" && pop[i].jour === "dimanche"){
    if(pop[i].type === "td" ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#D10').append(x3);
     }
    if(pop[i].type === "tp" ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#D10').append(x2);
    }
  }
   if(pop[i].heure === "11h30" && pop[i].jour === "dimanche"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#D11').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#D11').append(x2);
    }
  }


     if(pop[i].heure === "13h30" && pop[i].jour === "dimanche"){
    if(pop[i].type === 'td' ){
     x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#D13').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#D13').append(x2);
    }
  }
       if(pop[i].heure === "15h" && pop[i].jour === "dimanche"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#D15').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#D15').append(x2);
    }
  }
if(pop[i].heure === "8h30" && pop[i].jour === "mardi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+data.pop1[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Ma8').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Ma8').append(x2);
    }
  }

if(pop[i].heure === "10h" && pop[i].jour === "mardi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Ma10').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Ma10').append(x2);
    }
  }
  if(pop[i].heure === "11h30" && pop[i].jour === "mardi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Ma11').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Ma11').append(x2);
    }
  }
     if(pop[i].heure === "13h30" && pop[i].jour === "mardi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Ma13').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Ma13').append(x2);
    }
  }
       if(pop[i].heure === "15h" && pop[i].jour === "mardi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Ma15').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Ma15').append(x2);
    }
  }

if(pop[i].heure === "8h30" && pop[i].jour === "lundi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+data.pop1[i].jour+'" data-seah="'+data.pop1[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#L8').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#L8').append(x2);
    }
  }

  if(pop[i].heure === "10h" && pop[i].jour === "lundi"){
    if(pop[i].type === 'td' ){
        x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
    $('#L10').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#L10').append(x2);
    }
  }
    if(pop[i].heure === "11h30" && pop[i].jour === "lundi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#L11').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#L11').append(x2);
    }
  }
       if(pop[i].heure === "13h30" && pop[i].jour === "lundi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#L13').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#L13').append(x2);
    }
  }
       if(pop[i].heure === "15h" && pop[i].jour === "lundi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#L15').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#L15').append(x2);
    }
  }
  if(pop[i].heure === "8h30" && pop[i].jour === "mercredi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Me8').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Me8').append(x2);
    }
  }

  if(pop[i].heure === "10h" && pop[i].jour === "mercredi"){
    if(pop[i].type === 'td' ){
        x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+data.pop1[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
    $('#Me10').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Me10').append(x2);
    }
  }
    if(pop[i].heure === "11h30" && pop[i].jour === "mercredi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Me11').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Me11').append(x2);
    }
  }
       if(pop[i].heure === "13h30" && pop[i].jour === "mercredi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#Me13').append(x3);
     }
    if(pop[i].type === "tp" ){

        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Me13').append(x2);
    }
  }
       if(pop[i].heure === "15h" && pop[i].jour === "mercredi"){
    if(pop[i].type === 'td' ){
     x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>'; 
      $('#Me15').append(x3);
     }
    if(pop[i].type === 'tp' ){
        x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#Me15').append(x2);
    }
  }


  if(pop[i].heure === "8h30" && pop[i].jour === "jeudi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#J8').append(x3);
     }
    if(pop[i].type === 'tp' ){
x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+data.pop1[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';

      $('#J8').append(x2);
    }
  }

  if(pop[i].heure === "10h" && pop[i].jour === "jeudi"){
    if(pop[i].type === 'td' ){
        x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
    $('#J10').append(x3);
     }
    if(pop[i].type === 'tp' ){
x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';
      $('#J10').append(x2);
    }
  }
    if(pop[i].heure === "11h30" && pop[i].jour === "jeudi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#J11').append(x3);
     }
    if(pop[i].type === 'tp' ){
x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';
      $('#J11').append(x2);
    }
  }
       if(pop[i].heure === "13h30" && pop[i].jour === "jeudi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#J13').append(x3);
     }
    if(pop[i].type === 'tp' ){
x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';
      $('#J13').append(x2);
    }
  }
       if(pop[i].heure === "15h" && pop[i].jour === "jeudi"){
    if(pop[i].type === 'td' ){
      x3 = '<div class="modal-area-button tdTable" id="poptd'+pop[i].id+'"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nomG +' -- '+pop[i].nom+' </a></div>';
      $('#J15').append(x3);
     }
    if(pop[i].type === 'tp' ){
x2 = '<div class="modal-area-button tpTable" id="poptp'+pop[i].id+'"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-id="'+pop[i].id+'" data-ensn="'+pop[i].nom+'" data-ensp="'+pop[i].prenom+'"  data-grp="'+pop[i].nomG+'" data-seaj="'+pop[i].jour+'" data-seah="'+pop[i].heure+'" data-seas="'+pop[i].salle+'">'+pop[i].nom +' -- '+pop[i].nomG+' </a></div>';
      $('#J15').append(x2);
    }
  }
  
}

        }
        if(pop1.length !=0){
            for( i =0;i<pop1.length ;i++){
 
  if(pop1[i].heure === "8h30" && pop1[i].jour === "dimanche"){
    x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
 $('#D8').append(x1);
}
    if(pop1[i].heure === "10h" && pop1[i].jour === "dimanche"){
   x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
     $('#D10').append(x1);
    
  }
   if(pop1[i].heure === "11h30" && pop1[i].jour === "dimanche"){
   x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
    $('#D11').append(x1);
}
if(pop1[i].heure === "13h30" && pop1[i].jour === "dimanche"){
    x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
  $('#D13').append(x1); }

 if(pop1[i].heure === "15h" && pop1[i].jour === "dimanche"){
      x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
  $('#D15').append(x1);
}
if(pop1[i].heure === "8h30" && pop1[i].jour === "mardi"){
    x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
 $('#Ma8').append(x1); }

if(pop1[i].heure === "10h" && pop1[i].jour === "mardi"){
   x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
 $('#Ma10').append(x1);
 }
  if(pop1[i].heure === "11h30" && pop1[i].jour === "mardi"){
   x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
  $('#Ma11').append(x1); }

  if(pop1[i].heure === "13h30" && pop1[i].jour === "mardi"){
   x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
$('#Ma13').append(x1);
 }
 if(pop1[i].heure === "15h" && pop1[i].jour === "mardi"){
    x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
  $('#Ma15').append(x1);
   }

if(pop1[i].heure === "8h30" && pop1[i].jour === "lundi"){
   x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
    $('#L8').append(x1); }

  if(pop1[i].heure === "10h" && pop1[i].jour === "lundi"){
   x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
  $('#L10').append(x1);
  
  }
    if(pop1[i].heure === "11h30" && pop1[i].jour === "lundi"){
     x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
  $('#L11').append(x1); }

  if(pop1[i].heure === "13h30" && pop1[i].jour === "lundi"){
    x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
   $('#L13').append(x1);
     
  }
  if(pop1[i].heure === "15h" && pop1[i].jour === "lundi"){
   x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
    $('#L15').append(x1);
  
  }
  if(pop1[i].heure === "8h30" && pop1[i].jour === "mercredi"){
     x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
  $('#Me8').append(x1);
   
  }

  if(pop1[i].heure === "10h" && pop1[i].jour === "mercredi"){
   x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
   $('#Me10').append(x1);
   
  }
    if(pop1[i].heure === "11h30" && pop1[i].jour === "mercredi"){
       x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
   $('#Me11').append(x1);
   
  }
   if(pop1[i].heure === "13h30" && pop1[i].jour === "mercredi"){
     x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
  $('#Me13').append(x1);
 
  }
 if(pop1[i].heure === "15h" && pop1[i].jour === "mercredi"){
   x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
    $('#Me15').append(x1);
  
  }


  if(pop1[i].heure === "8h30" && pop1[i].jour === "jeudi"){
   x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
    $('#J8').append(x1);
   
  }

  if(pop1[i].heure === "10h" &&pop1[i].jour === "jeudi"){
    x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
   $('#J10').append(x1);
   
  }
    if(pop1[i].heure === "11h30" && pop1[i].jour === "jeudi"){
   x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
    $('#J11').append(x1);
   
  }
  if(pop1[i].heure === "13h30" && pop1[i].jour === "jeudi"){
    x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
   $('#J13').append(x1);
  
  }
   if(pop1[i].heure === "15h" && pop1[i].jour === "jeudi"){
    x1 = '<div class="modal-area-button courTable" id="courtd'+pop1[i].id+'">'+
 '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-id="'+pop1[i].id+'" data-ensn="'+pop1[i].nom+'" data-ensp="'+pop1[i].prenom+'"  data-sec="'+pop1[i].nomSec+'" data-seaj="'+pop1[i].jour+'" data-seah="'+pop1[i].heure+'" data-seas="'+pop1[i].salle+'">'+pop1[i].nom +' -- '+pop1[i].nomSec+' </a>'+
 '</div>';
    $('#J15').append(x1); }
    

}

            
        }

    };
$(document).on("click","#supBtn",function(){

$.ajax({
type: "POST",
data: $('#supSea').serialize(),                             // to submit fields at once
url: $('#supSea').attr('action'),                        // use the form's action url
success: function(data) {
 
$("#poptp"+data.id+"").remove();
$("#InformationTP").modal("hide"); 

$("#inf").addClass("active"); 
$("#sup").removeClass("active");
$("#desc").addClass("active in"); 
$("#supp").removeClass("active in");
$("#supBtn").css("display","none");
}

}); 
});
$(document).on("click","#supBtn2",function(){

$.ajax({
type: "POST",
data: $('#supSea2').serialize(),                             // to submit fields at once
url: $('#supSea2').attr('action'),                        // use the form's action url
success: function(data) {
   
$("#poptd"+data.id+"").remove();

$("#InformationTD").modal("hide"); 
$("#inf2").addClass("active"); 
$("#sup2").removeClass("active");
$("#desc2").addClass("active in"); 
$("#supp2").removeClass("active in");
$("#supBtn2").css("display","none");
}

}); 
});

$(document).on("click","#supBtn3",function(){

$.ajax({
type: "POST",
data: $('#supSea3').serialize(),                             // to submit fields at once
url: $('#supSea3').attr('action'),                        // use the form's action url
success: function(data) {
    
$("#courtd"+data.id+"").remove();

$("#InformationCour").modal("hide"); 
$("#inf1").addClass("active"); 
$("#sup1").removeClass("active");
$("#desc1").addClass("active in"); 
$("#supp1").removeClass("active in");
$("#supBtn3").css("display","none");
}

}); 
});

 $(document).on("click","#add",function(){
 
if($("#newType").val() == 0 || $("#newEns").val()== 0 || $("#newSeance").val()== 0){
     $('#newError').css("display","");
    
    }

else if($("#newType").val() === "Cour" &&  $("#newSec").val()== 0){
 $('#newError').css("display","");
 
}
else if(($("#newType").val() === "TP" || $("#newType").val() === "TD") &&  $("#newGrp").val()== 0){
 $('#newError').css("display","");
 
}else{
$('#newError').css("display","none");
   $.ajax({
type: "POST",
data: $('#addSeance').serialize(),                             // to submit fields at once
url: $('#addSeance').attr('action'),                        // use the form's action url
success: function(data) {
   
    if(data.c>0){
    $('#newError1').css("display","");    
    }else{
$(".chosen-select option:selected").removeAttr('selected');
$(".chosen-select").trigger('chosen:updated');
$("#nouvel").modal("hide"); 
$('#newError1').css("display","none");    
seance(data.emp);
}
}

}); 
}

});
  
$(document).on("click","#sup",function(){
$("#supBtn").css('display','');
});
$(document).on("click","#inf",function(){
$("#supBtn").css('display','none');
}); 
$(document).on("click","#sup1",function(){
$("#supBtn3").css('display','');
});
$(document).on("click","#inf1",function(){
$("#supBtn3").css('display','none');
}); 
$(document).on("click","#sup2",function(){
   
$("#supBtn2").css('display','');
});
$(document).on("click","#inf2",function(){
     
$("#supBtn2").css('display','none');
});
 var tp1 = 0;
/* this is our ajax function created for an arrayed forms */
var called = 0;
var nmbr=0 ;


 $("#PrimaryModalalert").modal("show");

 var nbr =$("#nbrSec").val();
var idmodule;
  
    var l=1;
    var i=0 ;
    while(l<=nbr)  {
       
           $(document).on("click","#ajouterTD"+l+"",function(){
            var kl = $(this).attr("id").substring(9);

            i++;
            var text ='<form class="formTD" method="post" id="groupe'+i+'" action="{{ url("empTD") }}">{!! csrf_field() !!}<fieldset class="dropzone dropzone-custom" style="border-color:grey; border-width: 3px;" ><div class="row"><div class="button-ap-list responsive-btn pull-right"><div class="button-style-four btn-mg-b-10"><button type="button" class="btn btn-custon-rounded-four btn-danger" id="'+i+'"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> </button></div></div></div><div class="row "><input class="hiddenid" type="hidden" name="idmodule" value=""><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Enseignant</label><div class="form-group"><div class="chosen-select-single mg-b-20"><select name="idensTD" class="chosen-select" tabindex="-1" id="ensTD'+i+'">@foreach($pro as $p)<option value="{{$p->idEns}}">{{$p->nom}} {{$p->prenom}}</option>@endforeach</select></div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Groupe</label><div class="form-group"><div class="chosen-select-single mg-b-20"><select id="grpTD'+i+'" name="idgrpTD" class="chosen-select" tabindex="-1">@foreach($groupes as $grp)<option value="{{$grp->idG}}">{{$grp->nomG}} </option>@endforeach</select></div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Séances </label><div class="form-group-inner"  id="module"><div class="chosen-select-single"><select name="idseaTD[]" data-placeholder="Choisir une seance" class="chosen-select" multiple="multiple" id="seaTD'+i+'">@foreach($seancesTD as $sea)<option value="{{$sea->idSea}}">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}</option>@endforeach</select></div></div></div></div></fieldset></form><div id="saute'+i+'"><br></div>';
              
           

  
$("#section"+kl+"").append(text);
//$('select').chosen('destroy');
$("select").chosen();  
$(".chosen-select").trigger('chosen:updated');

$('input[name="idmodule"]').val(idmodule);

       } );
l++;
} 



var tp=1;
   while(tp<=nbr)  {
        

      var s = $("#sectionTP"+tp+"").attr("id");
         
           $(document).on("click","#ajouterTP"+tp+"",function(){
            var ktp = $(this).attr("id").substring(9);
      
            i++;
            var text ='<form class="formTP" method="post" id="groupe'+i+'" action="{{ url("empTP") }}">{!! csrf_field() !!}<fieldset class="dropzone dropzone-custom" style="border-color:grey; border-width: 3px;" ><div class="row"><div class="button-ap-list responsive-btn pull-right"><div class="button-style-four btn-mg-b-10"><button type="button" class="btn btn-custon-rounded-four btn-danger" id="'+i+'"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> </button></div></div></div><div class="row "><input type="hidden" name="idmodule"  class="hiddenid" value="" ><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Enseignant</label><div class="form-group"><div class="chosen-select-single mg-b-20"><select name="idensTP" id="ensTP'+i+'" class="chosen-select" tabindex="-1" >@foreach($pro as $p)<option value="{{$p->idEns}}">{{$p->nom}} {{$p->prenom}}</option>@endforeach</select></div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Groupe</label><div class="form-group"><div class="chosen-select-single mg-b-20"><select id="grpTP'+i+'" name="idgrpTP" class="chosen-select" tabindex="-1">@foreach($groupes as $grp)<option value="{{$grp->idG}}">{{$grp->nomG}} </option>@endforeach</select></div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Séances </label><div class="form-group-inner"  id="module"><div class="chosen-select-single"><select name="idseaTP[]" id="seaTP'+i+'" data-placeholder="Choisir une seance" class="chosen-select" multiple="multiple"  >@foreach($seancesTP as $sea)<option value="{{$sea->idSea}}">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}</option>@endforeach</select></div></div></div></div></fieldset></form><div id="saute'+i+'"><br></div>';
               
            
$("#sectionTP"+ktp+"").append(text);
$(".chosen-select").chosen();

$('input[name="idmodule"]').val(idmodule);

        } );
tp++;
}







           $(document).on("click",".btn-danger",function(){
           
            var btn_id = $(this).attr("id");
         
            $("#groupe"+btn_id+"").remove();

            $("#saute"+btn_id+"").remove();
            
             i--;
            
             });

          




$(document).on('click','#subMod',function(){

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

  $("#PrimaryModalalert").modal("hide");
  $("#nameMod").val(mo2);
   
  $('input[name="idmodule"]').val(mo1);
  $('input[name="modhid"]').val(mo1);


idmodule = mo1;

  if(data.mo4>0){
    $("#tabEmpTemps").css('display','');
    $("#empForm").css('display','none');
    $("#popnew").css('display','');
   
 $('.ch > option').remove();
 $('.sea > option').remove();
  if(mo3 ==="CTT"){
    $('.ch').append('<option selected value="0">Type de séance</option><option > Cour </option><option > TD </option><option > TP </option>');
    $('.ch').trigger("chosen:updated");
     $('#newGrpRow').css('display','none');
      $('#newSecRow').css('display','none');
  }
    if(mo3 ==="CTd"){
$('.ch').append('<option selected value="0">Type de séance </option><option> Cour </option><option > TD </option>');
    $('.ch').trigger("chosen:updated");
     $('#newGrpRow').css('display','none');
      $('#newSecRow').css('display','none');
  }


    if(mo3 ==="Cour"){
    
    $('.ch').append('<option selected> Cour </option>');
    $('.ch').trigger("chosen:updated");
    $('#newGrpRow').css('display','none');
    $('#newSecRow').css('display','');
    $('.sea').append("<option selected value=\"0\">Type de séance</option>@foreach($cour as $sea)<option value=\"{{$sea->idSea}}\">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}  </option>@endforeach");
    $('.sea').trigger("chosen:updated");

  }

    if(mo3 ==="TP"){
      
     $('.ch').append('<option selected> TP </option>');
    $('.ch').trigger("chosen:updated");
    $('#newSecRow').css('display','none');
    $('#newGrpRow').css('display','');
    $('.sea').append("<option selected value=\"0\">Type de séance</option>@foreach($tp as $sea)<option value=\"{{$sea->idSea}}\">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}  </option>@endforeach");
    $('.sea').trigger("chosen:updated");
  }
emploi_du_temps(data.pop,data.pop1);

 }else{
$("#empForm").css('display','');
$("#tabEmpTemps").css('display','none');
$("#popnew").css('display','none');
  if(mo3 === 'Cour'){
  
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
 
}
}
});
}
 });


ajax_recaller = function(forms){
    var id = forms[called].attr("id").substring(6);
    
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



$(document).on('click','#popTab',function(){
 
$.ajax({
type: "POST",
data: $('#popEmp').serialize(),                             // to submit fields at once
url: $('#popEmp').attr('action'),                        // use the form's action url
success: function(data) {
  $("#tabEmpTemps").css('display','');
$("#empForm").css('display','none');

  $(".modal-area-button").each(function(){
   $(".courTable").remove();
   $(".tdTable").remove();
   $(".tpTable").remove();
});
  emploi_du_temps(data.pop,data.pop1);
$("#InformationproModalalert").modal("hide"); 

}
});
});






 $(document).on('change','#selMod',function(){
  
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
 
  $('.ch > option').remove();
 $('.sea > option').remove();
  if(mo3 ==="CTT"){
    $('.ch').append('<option value="0" selected> Choisir le type  </option><option > Cour </option><option > TD </option><option> TP </option>');
    $('.ch').trigger("chosen:updated");
  }
    if(mo3 ==="CTd"){
$('.ch').append('<option selected value="0"> Choisir le type </option><option > Cour </option><option > TD </option>');
$('.ch').trigger("chosen:updated");
  }
 

    if(mo3 ==="Cour"){
    
    $('.ch').append('<option selected> Cour </option>');
    $('.ch').trigger("chosen:updated");
    $('#newGrpRow').css('display','none');
    $('#newSecRow').css('display','');
    $('.sea').append("<option selected value=\"0\"> Choisir une séance </option>@foreach($cour as $sea)<option value=\"{{$sea->idSea}}\">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}  </option>@endforeach");
    $('.sea').trigger("chosen:updated");

  }

    if(mo3 ==="TP"){
       
     $('.ch').append('<option selected> TP </option>');
    $('.ch').trigger("chosen:updated");
    $('#newSecRow').css('display','none');
    $('#newGrpRow').css('display','');
    $('.sea').append("<option selected value=\"0\"> Choisir une séance </option>@foreach($tp as $sea)<option value=\"{{$sea->idSea}}\">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}  </option>@endforeach");
    $('.sea').trigger("chosen:updated");
  }

  $("#nameMod").val(mo2);   
  $('input[name="idmodule"]').val(mo1);
   $('input[name="modhid"]').val(mo1);
   idmodule = mo1;


 if(data.mo4>0){
    $("#tabEmpTemps").css('display','');
    $("#empForm").css('display','none');
    $("#popnew").css('display','');
  $(".modal-area-button").each(function(){
   $(".courTable").remove();
   $(".tdTable").remove();
   $(".tpTable").remove();
});

emploi_du_temps(data.pop,data.pop1);
    }else{
$("#empForm").css('display','');
$("#tabEmpTemps").css('display','none');
$("#popnew").css('display','none');
 if(mo3 === 'Cour'){
   
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
   $('.sea').append("<option selected value=\"0\">Select your option </option>@foreach($cour as $sea)<option value=\"{{$sea->idSea}}\">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}  </option>@endforeach");
    $('.sea').trigger("chosen:updated");
 }
  if(type === "TP"){
    $("#newSecRow").css('display','none');
    $("#newGrpRow").css('display','');
   $('.sea').append("<option selected value=\"0\">Select your option </option>@foreach($tp as $sea)<option value=\"{{$sea->idSea}}\">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}  </option>@endforeach");
    $('.sea').trigger("chosen:updated");
 }
   if(type === "TD"){
    $("#newSecRow").css('display','none');
    $("#newGrpRow").css('display','');
   $('.sea').append("<option selected value=\"0\">Select your option </option>@foreach($td as $sea)<option value=\"{{$sea->idSea}}\">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}  </option>@endforeach");
    $('.sea').trigger("chosen:updated");
 }
});

 
$(document).on('click','#submitCour',function(){
 
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
   $("#popnew").css("display","");
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
               <div id="InformationproModalalert" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                   
                                    <div class="modal-body">
                                        <i class="educate-icon educate-checked modal-check-pro" style="color: #8e44ad;"></i>
                                        <h2>Emplois du temps Enregistré</h2>
                                        
                                    </div>
                                    <div class="modal-footer info-md">
                                        
                                        <form action="{{url('popEmp')}}" method="post" id="popEmp">
                                      {!! csrf_field() !!}
                                      <input type="hidden" name="semestre" value="{{$semestre->idSem}}">
                                       <input type="hidden" name="modhid">
                                       
                                      </form>
                                       <a href="#" id="popTab" style="background: #8e44ad">Quitter</a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    
                                    <form action="{{url('empMod')}}" method="post" id="popMod">
                                      {!! csrf_field() !!}
                                       <input type="hidden" name="semestre" value="{{$semestre->idSem}}">
                                    <div class="modal-body">
                                  

                                        <i class="educate-icon educate-checked modal-check-pro"></i>
                                        <h2>Modules</h2>
                                        <div class="form-group-inner"><div class="chosen-select-single mg-b-20"><select name="moduleCh" class="chosen-select error" tabindex="-1" id="" >
                                         <option value="" disabled selected>Sélèctionner un module</option>
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
            <input type="hidden" name="semestre" value="{{$semestre->idSem}}">
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
                                              <div class="alert-wrap1 shadow-inner wrap-alert-b">
                                <div class="alert alert-danger alert-mg-b" role="alert" id="newError" style="display: none;">
                                <strong>Erreur!</strong> Vous devez remplir tous les champs.
                            </div>
                            <br>
                            <div class="alert alert-danger alert-mg-b" role="alert" id="newError1" style="display: none;">
                                <strong>Erreur!</strong> la séance est déjà prise!!
                            </div>
                          </div>
                                <form action="{{url('addSeance')}}" method="post" id="addSeance">
                                      {!! csrf_field() !!}  
                                   <input  type="hidden" name="idmodule" value="">
                                            <div class="row">

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><h4>Type </h4></div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                                        <div class="form-group-inner"><div class="chosen-select-single mg-b-20"><select  name="newType" class="chosen-select ch" id="newType" tabindex="-1"> <option value="" disabled selected>Type de séance</option>

                                   </select></div></div>
                                    </div></div>
                                
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><h4>Enseignant </h4></div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                                        <div class="form-group-inner"><div class="chosen-select-single mg-b-20"><select id="" name="newEns" class="chosen-select" id="newEns" tabindex="-1"> <option value="0" selected>Choisir un enseignant</option>
                                    @foreach($pro as $p)<option value="{{$p->idEns}}">{{$p->nom}} {{$p->prenom}} </option>@endforeach</select></div></div>
                                    </div></div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <h4>Séance </h4></div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="form-group-inner"  id="module">
                                            <div class="chosen-select-single mg-b-20">
                                                <select id="newSeance"  class="chosen-select sea"   name="newSeance">
                                                <option value="0">Choisir une séance</option>
                                            </select>
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
                                                     <option value="0"  selected>Choisir un groupe</option>
                                    @foreach($groupes as $s)<option value="{{$s->idG}}">{{$s->nomG}} </option>@endforeach</select></div></div></div></div>
                                              <div class="row" id="newSecRow" style="display: none;">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><h4>Section  </h4></div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <div class="form-group-inner">
                                                    <div class="chosen-select-single mg-b-20"><select id="newSec" name="newSec" class="chosen-select" id="group" tabindex="-1">
                                                     <option value="0" selected>Choisir une section</option>
                                    @foreach($sec as $s)<option value="{{$s->idSec}}">{{$s->nomSec}} </option>@endforeach</select></div></div></div></div>
                                        <div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                     <div class="login-btn-inner">       
                               <div class="login-horizental ">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="add">Ajouter</button>
          </div>
           </div>

                                        </div></div>
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
                                <strong>Erreur!</strong> Vous devez remplir tous les champs.
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
                        <div class="form-group-inner"><div class="chosen-select-single mg-b-20"><select name="idens" class="chosen-select" tabindex="-1" id="ensC{{$i}}" > <option value="" disabled selected>Choisir un enseignant</option>
                                  @foreach($pro as $p)<option value="{{$p->idEns}}">{{$p->nom}} {{$p->prenom}}</option>@endforeach</select></div></div></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="login2"> Section</label><div class="form-group-inner"><div class="chosen-select-single mg-b-20"><select id="secC{{$i}}" name="idsec" class="chosen-select" id="group" tabindex="-1"> <option value="" disabled selected>Choisir une section</option>
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
                                <strong>Erreur!</strong> Vous devez remplir tous les champs.
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
                                <strong>Erreur!</strong> Vous devez remplir tous les champs.
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
                                        <th>mercredi</th>
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
<br> <br>
                    <div id="InformationTP" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-2">
                                        <h4 class="modal-title"></h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
            <div class="modal-body">

                  <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active" id="inf"><a href="#desc">Information</a></li>
                                <li id="sup"><a href="#supp" > Suppression </a></li>
                            
                            </ul>
                <div id="myTabContent" class="tab-content custom-product-edit">
                  <div class="product-tab-list tab-pane fade active in" id="desc">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
               
           <span class="educate-icon educate-info modal-check-pro information-icon-pro"></span>
           <h2 style="color:#8e44ad ;">Travaux Pratique (TP)!</h2> <br>
                               <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Enseignant </h4></div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                            <p style="text-align: left" id="ens"></p></div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Seance </h4></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                            <p style="text-align: left" id="sea"></p>
                        </div>
                </div>
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <h4>Groupe  </h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left" id="grp"></p>
                    </div>
                </div>
                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="supp">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                               
                                               <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
           <h2 style="color:#8e44ad ;">Suppresion!</h2>
           <p>Voulez-Vous vraiment supprimer cette seance ?</p> <br> 
                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                  
                            </div>
                        </div>
      </div>
<div class="modal-footer info-md" >
    <form method="post" action="{{url('DeleteSea')}}" id="supSea">
        {!! csrf_field() !!}
        <input type="hidden" name="supID" id="supID">
         <input type="hidden" name="supType" value="3"></form>
         <a data-dismiss="modal" href="#" style="background-color: #8e44ad ;border-color: #8e44ad ;">OK</a>
<a  href="#" style="background-color: #8e44ad ;border-color: #8e44ad ; display: none;" id="supBtn">Supprimer</a>
</div>
</div>
</div>
</div>

<!--            modal mauve TD   -->

<div id="InformationTD" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-3" style="background-color: #65b12d ;border-color: #65b12d ;">
                                        <h4 class="modal-title"></h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
            <div class="modal-body">
                  <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                    <li class="active" id="inf2" ><a  href="#desc2" >Information</a></li>
                    <li  id="sup2"><a href="#supp2" > Suppression </a></li>
                            
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="desc2">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-content-section">
            <span class="educate-icon educate-info modal-check-pro information-icon-pro"></span>
                                    <h2 style="color:#65b12d ;">Travaux Dirigés (TD)!</h2>
                                    <br>
            
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4 style="color:#303030 ;">Enseignant </h4></div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                            <p style="text-align: left" id="ens"></p></div>
                        </div>
                        <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4 style="color:#303030 ;">Seance </h4></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left" >
                            <p style="text-align: left" id="sea"></p>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <h4 style="color:#303030 ;">Groupe  </h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left" id="grp"></p>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
                         </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="supp2">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                         <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
           <h2 style="color:#65b12d;">Suppresion!</h2>
           <p>Voulez-Vous vraiment supprimer cette seance ?</p> <br>     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                  
                            </div>
                        </div>
</div>
<div class="modal-footer info-md" >
    <form method="post" action="{{url('DeleteSea')}}" id="supSea2">
        {!! csrf_field() !!}
        <input type="hidden" name="supID" id="supID">
         <input type="hidden" name="supType" value="2"></form>
<a data-dismiss="modal" href="#" style="background-color: #65b12d ;border-color: #65b12d ;">OK</a>
<a href="#" id="supBtn2" style="background-color: #65b12d ;border-color: #65b12d ; display: none;">Supprimer
</a>
</div>
</div>
</div>
</div>


<!--            modal bleu Cour   -->

     <div id="InformationCour" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title"></h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
            <div class="modal-body">
                 <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                       <li class="active" id="inf1"><a href="#desc1">Information</a></li>
                                <li id="sup1"><a href="#supp1" > Suppression </a></li>
                            
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="desc1">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-content-section">
               <span class="educate-icon educate-info modal-check-pro information-icon-pro"></span>
                                    <h2 style="color:#006DF0 ;">Cour</h2>
                                    <br>
                                                                                
                        <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4 style="color:#303030 ;">Enseignant </h4></div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                            <p style="text-align: left" id="ens"></p></div>
                        </div>
                        <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4 style="color:#303030 ;">Seance </h4></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left" >
                            <p style="text-align: left" id="sea"></p>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <h4 style="color:#303030 ;">Section </h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left" id="sec"></p>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
     </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="supp1">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                               <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
           <h2 style="color:#006DF0 ;">Suppresion!</h2>
           <p>Voulez-Vous vraiment supprimer cette seance ?</p> <br>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                  
                            </div>
                        </div>

</div>
<div class="modal-footer info-md" >
    <form method="post" action="{{url('DeleteSea')}}" id="supSea3">
        {!! csrf_field() !!}
        <input type="hidden" name="supID" id="supID">
         <input type="hidden" name="supType" value="1">
    </form>
    <a data-dismiss="modal" href="#" >OK</a>
     <a  href="#" id="supBtn3" style="display: none;">Supprimer</a>
</div>
</div>
</div>
</div>





@endsection



             
                                               
                   