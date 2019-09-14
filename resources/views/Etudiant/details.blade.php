@extends('layouts.header')

@section('title','Justification')
@section('js')
<style>
 @media screen and (max-width: 1225px) and (min-width: 1045px) {
		.priority-1{
			display:none;
		}
	}
	
	@media screen and (max-width: 1045px) and (min-width: 835px) {
		.priority-1{
			display:none;
		}
		.priority-4{
			display:none;
		}
	}
	
	@media screen and (max-width: 565px) and (min-width: 300px) {
		.priority-1{
			display:none;
		}
		.priority-4{
			display:none;
		}
        .resp{
			display:none;
		}
       
	}
	
	@media screen and (max-width: 300px) {
		.priority-1{
			display:none;
		}
		.priority-4{
			display:none;
		}
        .resp{
			display:none; }
       
	
	}

</style>
<script >
   $(document).ready(function(){

  $("#trash").on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget).data('date');
    var b = $(event.relatedTarget).data('id');
  
     var m = $(this)
  m.find("#trashJus").val(b);
 m.find("b").text(a);
    
});


    $("#voir").on('show.bs.modal', function(event) {
 var a = $(event.relatedTarget).data('jus');
 
   $('.pdf-single-pro a').attr('href',a);
 
});


 $(document).on("click","#deleteBtn",function(){
 // alert("hii");
   $.ajax({
type: "post",
data: $("#deleteForm").serialize(),
url:  $("#deleteForm").attr('action'),              
success: function(data) {
  $("#trash").modal('hide');
  $("#"+data.abs.idAbs+"").remove();
  $("#sjus").text(data.abs.date);
  $("#alertSuc2").css("display",""); 
  $("#justification").css("display","");  
  $("html, body").animate({
        scrollTop: 0
    },10);
    $("#aucune").css("display","");
}
});
   });

 $("#edit").on('show.bs.modal', function(event) {
    $('#error2').css("display","none");
    var a = $(event.relatedTarget).data('id');
    //alert(a);
    var m = $(this)
     m.find('#idAbs').val(a);
    
});
 $(document).on("click","#addBtn",function(){
   var form = $("#addForm");
  var data = new FormData(form[0]);
        $.ajax({
type: "post",
data: data,                             // to submit fields at once
url: $("#addForm").attr('action'),  
processData: false,
contentType: false,                      // use the form's action url
success: function(data) {
    $("#aucune").css("display","none");
//alert(data.abs.length);
var t;
var t1=" ";
if(data.num <= 0){
$("#justification").css("display","none");
}
for(var i =0;i<data.abs.length;i++){
if(data.abs[i].etat_just == 1){
    t='<button class="pd-setting">Accepté</button>'; }
    if(data.abs[i].etat_just == 2){ 
         t='<button class="ps-setting">En attente</button>';
        t1=  '<a  data-toggle="modal"  href="#" title="Modifier" class="btn btn-default" data-target="#edit" data-id="'+data.abs[i].idAbs+'" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>';
     }
         if(data.abs[i].etat_just == 0){
     t='<button class="ds-setting">Réfusé</button>';}
    $('#zoomInDown1').modal('hide');
$("#1").after('<tr id="'+data.abs[i].idAbs+'"><td class="priority-1"> 1 </td> <td class="priority-2">'+data.abs[i].date+'</td><td class="priority-3">'+data.abs[i].jour+' '+data.abs[i].heure+' '+data.abs[i].salle+'</td><td class="priority-4">'+data.abs[i].type+'</td><td class="priority-5"> '+t+' </td>  <td class="priority-6"><a  data-toggle="modal"  href="#" title="Voir" class="btn btn-default" data-target="#detail'+data.abs[i].idAbs+'" data-jus="'+data.abs[i].justification+'" id="a'+data.abs[i].idAbs+'"><i class="fa fa-book" aria-hidden="true" ></i> </a> '+t1+'<a   data-toggle="modal"  href="#" title="supprimer" class="btn btn-danger" data-target="#trash" data-id="'+data.abs[i].idAbs+'" data-date="'+data.abs[i].date+'" ><i class="fa fa-trash-o" aria-hidden="true"></i> </a></td></tr>');
$("#bjus").text(data.abs[i].date);
}
$("#alertSuc1").css("display","");  

   $("html, body").animate({
        scrollTop: 0
    },10);

},
error: function (dataErr) {

$('#error1').css("display","");
 var response = JSON.parse(dataErr.responseText);
       //alert(dataErr.errors)
        var errorString = '<ul>';
        $.each( response.errors, function( key, value) {

            errorString += '<li>' + value + '</li>';

        });
        errorString += '</ul>';
         $('#error1').html(errorString);
          }
});

       });
//$(document).on("submit","#ff",function(){ });
 $(document).on("click","#editBtn",function(){
   var form = $("#ff");
  var data = new FormData(form[0]);
        $.ajax({
type: "post",
data: data,                             // to submit fields at once
url: "{{url('/edit_justif')}}",  
processData: false,
contentType: false,                      // use the form's action url
success: function(data) {
//alert(data.img);
    $('#edit').modal('hide');
 $("#alertSuc").css("display","");  
   $("html, body").animate({
        scrollTop: 0
    },10);
   // alert($("#a"+data.id+"").attr('data-jus')) 
   $("#a"+data.id+"").data('jus',data.img);
},
error: function (dataErr) {

$('#error2').css("display","");
 var response = JSON.parse(dataErr.responseText);
       //alert(dataErr.errors)
        var errorString = '<ul>';
        $.each( response.errors, function( key, value) {

            errorString += '<li>' + value + '</li>';

        });
        errorString += '</ul>';
         $('#error2').html(errorString);
  }
});

       });
        $("#zoomInDown1").on('show.bs.modal', function(event) {
            $('#error1').css("display","none");
            $('#prepend-big-btn').val("");
            $('#select_file').val("");

    var a = $(event.relatedTarget).data('id');
    var m = $(this)
     m.find('#module').val(a);
     m.find('#idAbs option').remove();
   $.ajax({
  type: "get",
  url: "{{url('dates')}}/"+a+"/" ,
  success: function(data){
    m.find('#idAbs').append('<option disabled>Choisir une date</option>');
    for(var i =0;i<data.dates.length;i++){
     m.find('#idAbs').append('<option value="'+data.dates[i].idAbs+'">'+data.dates[i].date+'</option>');
    }
  }
});

});
 });
</script>
@endsection

    
     @section('sidebar')
  
     @include('layouts.sidebarEtudiant')

     @endsection
    @section('mobileSidebar')
  
     @include('layouts.sidebarEtudiantMobile')

     @endsection

    
                                        @section('search')
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Absences</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">liste des absences</span>
                                            </li>
                                        </ul>
                                        @endsection
     @section('content')


                <div class="product-status mg-b-15" id="tabEmpTemps" >
            <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                            <h2>Absences du module : {{$mod->nom}} </h2>
                            
    @if(App\Exclu::where('Etu_exc',Auth::user()->id_Etu)->where('module_exc',$mod->idMod)->count()>0)
                             <div class="m-t-xl widget-cl-1">
                         <h1 class="text-danger">EXCLUS !!</h1></div>
                         @endif
                        </div>
     @if(App\Exclu::where('Etu_exc',Auth::user()->id_Etu)->where('module_exc',$mod->idMod)->count()== 0) 
     @if (App\Absence::where('id_Etu','=',Auth::user()->id_Etu)->where('etat','=',0)->whereNull('justification')->join('td_tps','Absences.id_td_tp','td_tps.id')->where('td_tps.id_module','=',$mod->idMod)->count()> 0) 
                           <div class="pull-right" id="justification">
 <a class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown1" data-id="{{$mod->idMod}}"><i class="fa fa-plus"> </i> Justification </a>
                                            </div>
                                             @endif
                                            @endif
                                          
                    </div>
                </div>
                <div class="row">
                  
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                                 <div class="alert-icon shadow-inner res-mg-t-30 table-mg-t-pro-n" id="alertSuc1" style="display: none">
                               <div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11" style="">
                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                    <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                  </button>
                               
                                <p>  <i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"> </i><strong> Justification ajoutée!</strong> Vous avez ajouté la justification de la date <b id="bjus"></b>.</p>
                            </div>
                          </div>
                        <div class="alert-icon shadow-inner res-mg-t-30 table-mg-t-pro-n" id="alertSuc" style="display: none">
                               <div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11" style="">
                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                    <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                  </button>
                               
                                <p>  <i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"> </i><strong> Justification Modifiée!</strong> la justification a été bien enregistré (voir Détail).</p>
                            </div>
                          </div>   
                               <div class="alert-icon shadow-inner res-mg-t-30 table-mg-t-pro-n" id="alertSuc2" style="display: none">
                               <div class="alert alert-danger alert-danger-style1 alert-st-bg alert-st-bg11" style="">
                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                    <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                  </button>
                               
                                <p>  <i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"> </i><strong> Justification supprimée!</strong> Vous avez supprimé la justification de la date <b id="sjus"></b>
                            </div>
                          </div> 
        

                          <div class="asset-inner table table-responsive" >
                                <table>
                                   <tr id="1">
                                        <th class="priority-1">No</th>
                                        <th class="priority-2">date</th>
                                        <th class="priority-3">seance</th>
                                        <th class="priority-4">Type</th>
                                        <th class="priority-5">Status</th>
                                       <th class="priority-5">Actions</th>
                               </tr>
@foreach($absences as $a)
                                     <tr id="{{$a->idAbs}}">
                                        <th class="priority-1">{{ $var++}}</th>
                                        <td class="priority-2">{{$a->date}}</td>
                                        <td class="priority-3">{{$a->jour}} {{$a->heure}} {{$a->salle}}</td>
                                        <td class="priority-4">{{$a->type}}</td>
                      <td class="priority-5">  @if($a->etat_just == 1)
                        <span class="pd-setting">Acceptée</span> 
                            @endif
                            @if($a->etat_just == 2)
                            <span class="ps-setting">En attente</span>
                             @endif
                            @if($a->etat_just == 0)
                            <span class="ds-setting">Refusée</span>
                             @endif

                    </td>
                                        <td class="priority-5">
                                            <a  href="#" title="Voir" class="btn btn-default" data-toggle="modal" data-target="#detail{{$a->idAbs}}" id="a{{$a->idAbs}}"><i class="fa fa-book" aria-hidden="true" ></i> </a>

                                           @if($a->etat_just == 2)
                                            <a  data-toggle="modal"  href="#" title="Modifier" class="btn btn-default" data-target="#edit" data-id="{{$a->idAbs}}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                            <a   data-toggle="modal"  href="#" title="supprimer" class="btn btn-danger" data-target="#trash" data-id="{{$a->idAbs}}" data-date="{{$a->date}}" ><i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                                            @endif
                                        </td>

                                        <div id="detail{{$a->idAbs}}" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-close-area modal-close-df">
                                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                    </div>
                                                    <div class="modal-body" id="modalbody">
                                                        <div id="liensPDF" class="pdf-viewer-area pdf-single-pro">
                                                            <a class="media" href="{{asset($a->justification)}}"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                  </tr>
                                    
@endforeach
                           
                          
                                
                           
                            
                                </table>
                            </div>
            <div style="display:none;"  id="aucune">
            <br> <br>
 <br >    <h3 style="text-align: center;color: #8d9498;">Aucune justification n'a été ajoutée</h3>
 <br> <br><br><br><br>
  </div>
                        @if($absences->count()==0)
                        <br> <br>
 <br >    <h3 style="text-align: center;color: #8d9498;">Aucune justification n'a été ajoutée</h3>
 <br> <br><br><br><br>
    @endif 
                        </div>
                      </div>
                    </div>
 </div>
                    </div>
                    <br>
                    <br>
                    
                     

                    <div id="zoomInDown1" class="modal modal-edu-general modal-zoomInDown fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                   <div class="modal-close-area modal-close-df">
                                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="modal-login-form-inner">
                                            
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                                                    >
                       <div class="basic-login-inner modal-basic-inner">
                         <h3>Ajouter une justification</h3>
                 <p class="resp">Vous pouvez ajouter votre justification</p>
                             <div class="alert-wrap1 shadow-inner wrap-alert-b">
     <div class="alert alert-danger alert-mg-b" role="alert" id="error1" style="display: none">
     
          </div>
          </div>
<form method="post" enctype="multipart/form-data" action="{{ url('add_justif') }}" id="addForm">
    {{ csrf_field() }}
    <input type="hidden" name="idMod" id="module">
                 <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Absences (dates)</label>
                                                            </div>
     <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="form-select-list"> <select class="form-control custom-select-value" name="idAbs"  style="width: 80%;" id="idAbs">
       

                     
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                          
                               <div class="form-group-inner"  >
              <div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <label class="login2 pull-right pull-right-pro">Justification</label>
                                                            </div>
             <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
       <div class="file-upload-inner ts-forms">
        <div class="input prepend-small-btn">
                                                                       
           <div class="file-button">
     <i class="fa fa-download"></i>
            <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;" style="width:80%" name="select_file" id="select_file" >
                        </div>
                         <input type="text" id="prepend-big-btn" placeholder="no file selected" style="width:80%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                     
                                                                            </form>
                                                 <div class="login-btn-inner">
                                                                                    
                   <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="login-horizental">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="addBtn">Ajouter</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                      
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                    <!-- ------------------------edit-------------------------->
                    
   <div id="edit" class="modal modal-edu-general modal-zoomInDown fade" role="dialog">
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
           <h3>Modifier la justification</h3>
                    <div class="alert-wrap1 shadow-inner wrap-alert-b">
     <div class="alert alert-danger alert-mg-b" role="alert" id="error2" style="display: none">
     
          </div>
          </div>
<form method="post" enctype="multipart/form-data" action="{{ url('/edit_justif') }}" id="ff" >
    {{ csrf_field() }}
    <input type="hidden" name="idAbs" id="idAbs" >
          
                                          
                               <div class="form-group-inner"  >
              <div class="row">
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <label class="login2 pull-right pull-right-pro">Justification</label>
                                                            </div>
             <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
       <div class="file-upload-inner ts-forms">
        <div class="input prepend-small-btn">
                                                                       
           <div class="file-button ">
     <i class="fa fa-download"></i>
            <input type="file" onchange="document.getElementById('prepend-big-btn1').value = this.value;" style="width:80%" name="select_file1" >
                        </div>
                         <input type="text" id="prepend-big-btn1" placeholder="no file selected" style="width:80%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   </form>
                                                                              <div class="login-btn-inner">
                                                                                    
                   <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="login-horizental">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="editBtn">Modifier</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 

                   <!-- ------------------------voir-------------------------->
       <div id="voir" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-close-area modal-close-df">
                                                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                            </div>
                                            <div class="modal-body" id="modalbody">
                                                <div id="liensPDF" class="pdf-viewer-area pdf-single-pro">
                                      <a class="media" href="" id="media"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            </div> 
                    
          
             <div id="trash" class="modal modal-edu-general modal-zoomInDown fade" role="dialog" >
             <div class="modal-dialog">
             <div class="modal-content">
                              <div class="modal-close-area modal-close-df">
                                                            <a class="close" data-dismiss="modal" href="#"  style="background: #d80027"><i class="fa fa-close"></i></a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="modal-login-form-inner">
                                            <span class="educate-icon educate-danger modal-check-pro information-icon-pro" style="color: #d80027"></span>
                                        <h2 >Suppression </h2>
             <p>Voulez-Vous vraiment supprimer la justification de la date : <b></b></p>
                                         </div>
   </div>
   <form method="post"  action="{{ url('Deletejust') }}" id="deleteForm">
    {{ csrf_field() }}
    <input type="hidden" name="trashJus" id="trashJus">
       </form>
                                       <div class="modal-footer danger-md">
    
      <a data-dismiss="modal" href="#"  style="background: #d80027">Annuler</a>
      <a href="#" id="deleteBtn" style="background: #d80027">supprimer</a>
   
                                        
                                    </div>
                                                    </div>
                                                </div>
                                            </div>                     

     @endsection