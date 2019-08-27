@extends('layouts.header')

@section('title','Justification')
@section('js')
<script >
   $(document).ready(function(){
    $("#voir").on('show.bs.modal', function(event) {

    var a = $(event.relatedTarget).data('jus');
    alert(a);
    var m = $(this)
     m.find('img').attr('src',a);
    
});
    $("#edit").on('show.bs.modal', function(event) {

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
alert(data.abs.length);
var t;
var t1=" ";
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
$("#1").after('<tr><td> 1 </td> <td>'+data.abs[i].date+'</td><td>'+data.abs[i].jour+' '+data.abs[i].heure+' '+data.abs[i].salle+'</td><td>'+data.abs[i].type+'</td><td> '+t+' </td>  <td ><a  data-toggle="modal"  href="#" title="Voir" class="btn btn-default" data-target="#voir" data-jus="'+data.abs[i].justification+'" id="a'+data.abs[i].idAbs+'"><i class="fa fa-book" aria-hidden="true" ></i> </a> '+t1+'</td></tr>');
}

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
alert(data.img);
    $('#edit').modal('hide');
 $("#alertSuc").css("display","");  
   $("html, body").animate({
        scrollTop: 0
    },10);
   // alert($("#a"+data.id+"").attr('data-jus')) 
   $("#a"+data.id+"").data('jus',data.img);
}
});

       });
        $("#zoomInDown1").on('show.bs.modal', function(event) {

    var a = $(event.relatedTarget).data('id');
    var m = $(this)
     m.find('#module').val(a);
     m.find('#idAbs option').remove();
   $.ajax({
  type: "get",
  url: "{{url('dates')}}/"+a+"/" ,
  success: function(data){
    m.find('#idAbs').append('<option >Choisir une date</option>');
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
                                            <li><span class="bread-blod">liste des abcences</span>
                                            </li>
                                        </ul>
                                        @endsection
     @section('content')


                <div class="product-status mg-b-15" id="tabEmpTemps" >
            <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                            <h2>Absences de module : {{$mod->nom}} </h2>
                         
                        </div>
                           <div class="add-product pull-right">
 <a class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown1" data-id="   {{$mod->idMod}}"><i class="fa fa-plus"> </i> Justification</a>
                                            </div>
                                          
                    </div>
                </div>
                <div class="row">
                  
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                        <div class="alert-icon shadow-inner res-mg-t-30 table-mg-t-pro-n" id="alertSuc" style="display: none">
                               <div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11" style="">
                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                    <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                  </button>
                               
                                <p>  <i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"> </i><strong> Modifié!</strong> la justification a été bien enregistrer (voir Détail).</p>
                            </div>
                          </div>       

                          <div class="asset-inner table-responsive">
                                <table>
                                   <tr id="1">
                                        <th>No</th>
                                        <th>date</th>
                                        <th>seance</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                       <th>Actions</th>
                               </tr>
@foreach($absences as $a)
                                     <tr>
                                        <th >{{ $var++}}</th>
                                        <td >{{$a->date}}</td>
                                        <td >{{$a->jour}} {{$a->heure}} {{$a->salle}}</td>
                                        <td >{{$a->type}}</td>
                      <td>  @if($a->etat_just == 1)
                        <button class="pd-setting">Accepté</button> 
                            @endif
                            @if($a->etat_just == 2)
                            <button class="ps-setting">En attente</button>
                             @endif
                            @if($a->etat_just == 0)
                            <button class="ds-setting">Réfusé</button>
                             @endif

                    </td>
                                        <td >
                                            <a  data-toggle="modal"  href="#" title="Voir" class="btn btn-default" data-target="#voir" data-jus="{{ $a->justification}}" id="a{{$a->idAbs}}"><i class="fa fa-book" aria-hidden="true" ></i> </a>

                                           @if($a->etat_just == 2)
                                            <a  data-toggle="modal"  href="#" title="Modifier" class="btn btn-default" data-target="#edit" data-id="{{$a->idAbs}}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                            @endif
                                        </td>
                                  </tr>
                                    
@endforeach
                               
                          
                                
                           
                            
                                </table>
                            </div>
                     
                        </div>
                      </div>
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
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                                                    >
                       <div class="basic-login-inner modal-basic-inner">
                         <h3>Ajouter une justification</h3>
                 <p>Vous pouvez ajouter votre justification</p>
                             @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
<form method="post" enctype="multipart/form-data" action="{{ url('add_justif') }}" id="addForm">
    {{ csrf_field() }}
    <input type="hidden" name="idMod" id="module">
                 <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Absences (dates)</label>
                                                            </div>
     <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="form-select-list"> <select class="form-control custom-select-value" name="idAbs" placeholder="password" style="width: 80%;" id="idAbs">
               <option disabled >choisissez la section</option>

                     
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
            <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;" style="width:80%" name="select_file" >
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
           <h3>modifier la justification</h3>

<form method="post" enctype="multipart/form-data" action="{{ url('/edit_justif') }}" id="ff" >
    {{ csrf_field() }}
    <input type="hidden" name="idAbs" id="idAbs" >
          
                                          
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
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">La justification</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <img src="" alt="">
                                    </div>
                                    <div class="modal-footer">
                                        <a onclick="window.print();">Imprimer</a>
                                        <a href="/uploads/justifications/" download="">Télécharger</a>
                                    </div>
                                </div>
                            </div>
                        </div>                      

     @endsection