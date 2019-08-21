@extends('layouts.header')

@section('title','Semestres')
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
 $('#formEns').submit(function(e){
    e.preventDefault();
   // alert("hh");    
      var fd = new FormData($(this)[0]);
   
$.ajax({
  url:  $(this).attr('action'),
  type: "POST",
  data: fd,
  cache : false ,     
  processData: false,  // indique à jQuery de ne pas traiter les données
  contentType: false ,                 
success: function(data) {
    //alert(data.idG+"nn"+data.idSem);
window.location.reload();
},
error: function (dataErr) {

$('#error1').css("display","");
 var response = JSON.parse(dataErr.responseText);
       // alert(dataErr.errors)
        var errorString = '<ul>';
        $.each( response.errors, function( key, value) {

            errorString += '<li>' + value + '</li>';

        });
        errorString += '</ul>';
         $('#error1').html(errorString);
          }
});
       });


    $(document).on('click','#pwd',function(){
     $.ajax({
  type: "get",
  url: "{{url('random_pwd')}}/" ,
  success: function(data){
   $("#pwd").val(data.rand);
  }
});
    });
$("#delete").on('show.bs.modal', function(event) {
   
    var a = $(event.relatedTarget).data('id');
    var b = $(event.relatedTarget).data('nom');
    var c = $(event.relatedTarget).data('prenom');
    //alert(b);
     var m = $(this)
   // m.find('#editGrp').val(a);
    m.find("#idens").val(a);
    m.find("b").text(b+" "+c);
    //alert("groupe = "+m.find("#idGrpDel").val(b));
    //m.find('#prepend-big-btn').val(c);
});


$(document).on('click','#deleteBtn',function(){
       // alert("hhh");
        $.ajax({
type: "POST",
data: $('#deleteForm').serialize(),                             // to submit fields at once
url: $('#deleteForm').attr('action'),                        // use the form's action url
success: function(data) {
    $("#delete").modal("hide");
 //alert(data.id);
 $("#panel"+data.id+"").remove();
}
});
       });
//add btn
$(document).on('click','#ModBtn',function(e){
       // alert("hhh");
e.preventDefault();
$(this).html('création..');
    
 $.ajax({
          data: $("#formMod").serialize(),                             
          url:  $("#formMod").attr('action'),
          type: "POST",
         
      success: function (data) {
      $('#zoomInDown1').modal("hide");
     window.location.reload();
    },
      error: function (dataErr) {
   $('#ModBtn').html('Ajouter');
   $('#error').css("display","");
var response = JSON.parse(dataErr.responseText);
       // alert(dataErr.errors)
var errorString = '<ul>';
$.each( response.errors, function( key, value) {

  errorString += '<li>' + value + '</li>';

        });
  errorString += '</ul>';
        
         $('#error').html(errorString);
          }
      });
       });

});
</script>
    
@endsection

    
     @section('sidebar')
  
     @include('layouts.sidebarAdmin1')

     @endsection
    @section('mobileSidebar')
  
     @include('layouts.mobileSidebar1')

     @endsection

    
                                        @section('search')
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Enseignants</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">liste des enseignants</span>
                                            </li>
                                        </ul>
                                        @endsection
                                         @section('content')
    
             <div class="contacts-area mg-b-15">
            <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                            <h4>Comptes Enseignants </h4>
                          
                    <div class="add-product">
                                                <a class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown1">Nouveau Enseignant</a>
                                            </div>
                        <div id="zoomInDown1" class="modal modal-edu-general modal-zoomInDown fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-close-area modal-close-df">
                                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                        </div>
                                                        <div class="modal-body">
  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="admintab-wrap edu-tab1 mg-t-30">
                            <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                                <li class="active"><a data-toggle="tab" href="#TabProject"><span class="edu-icon edu-analytics tab-custon-ic"></span>Enseignant</a>
                                </li>
                                <li><a data-toggle="tab" href="#TabDetails"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span>Import</a>
                                </li>
                               
                            </ul>
                            <div class="tab-content">
                                <div id="TabProject" class="tab-pane in active animated flipInX custon-tab-style1">
                                    <br>
                                    
                                                            <div class="modal-login-form-inner">
                                            
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="basic-login-inner modal-basic-inner">
                                            <h3>Nouveau Enseignant</h3>
                            <p>Ajouter un nouveau enseignant</p>
                            <br>
      
     <input type="hidden" id="errImport" value="1" >
   <div class="alert-wrap1 shadow-inner wrap-alert-b" >
     <div class="alert alert-danger alert-mg-b" role="alert" id="error" style="display:none;">
  
          </div>
          </div>
     

         <form action="{{url('addEns')}}" method="post" id="formMod" >
                                  {{ csrf_field() }}
                         <div class="form-group-inner " id="divNom">
                  <div class="row">
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <label class="login2">Nom</label>
                                                                                     </div>
                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
 <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" placeholder="Nom "  name="nom" id="nom" value="{{ old('nom') }}" />
                               <br>
                    <p id="divNomp" style="color: #ed5565; display: none;"> nom nom</p>
                             
                              
                                </div>
                                       
                                                                                    </div>
                       
                                            </div>
         <div class="form-group-inner" id="divpreNom"> <div class="row">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Prenom</label>
                                                                                        </div>
               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
         <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" placeholder="Prenom" name="prenom" id="prenom" value="{{ old('prenom') }}"/>
                                                                                        </div>
                                                                                    </div>
</div>
                   <div class="form-group-inner"> <div class="row">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Email</label>
                                                                                        </div>
               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
         <input type="Email" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" placeholder="Email" name="email" id="email" value="{{ old('email') }}"/>
                                                                                        </div>
                                                                                    </div>
                                                 </div>
                       <div class="form-group-inner"> <div class="row">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Mot de passe</label>
                                                                                        </div>
               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
  <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" placeholder="Mot de passe" name="pwd" id="pwd"  />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                        
                         <div class="login-btn-inner">

         

                   <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="login-horizental">
         <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="ModBtn" >Ajouter</button>
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
                                <div id="TabDetails" class="tab-pane animated flipInX custon-tab-style1">
                                                           <div class="modal-login-form-inner">
                                            
                                                                <div class="row">
                              
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="basic-login-inner modal-basic-inner">
                                                                            <h3>Nouveaux Enseignants</h3>
                            <p>Vous pouvez ajouter touts les enseignants par importer un fichier excel qui contient le nom , prenom et l'email de l'enseignant</p>
                            <br>
  
     <input type="hidden" id="errImport" value="1" >
    <div class="alert-wrap1 shadow-inner wrap-alert-b">
     <div class="alert alert-danger alert-mg-b" role="alert" id="error1" style="display: none">
     
          </div>
          </div>
     

         <form action="{{url('addEnsExcel')}}" method="post" id="formEns" enctype="multipart/form-data" >
                                  {{ csrf_field() }}
                       <div class="login-btn-inner">
                           
                           <div class="row">
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                  <div class="file-upload-inner ts-forms">
                                                            <div class="input prepend-big-btn">
                                                            
                                                                <div class="file-button" >
                                                                    Browse
  <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;" name ="ens">
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                           </div>
                           <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <div class="file-upload-inner ts-forms">
                                                            <div class="input prepend-big-btn">
                                                               <label class="icon-right" for="prepend-big-btn">
                                                                        <i class="fa fa-download"></i>
                                                                    </label>
                                                                <input type="text" id="prepend-big-btn" placeholder="no file selected" >
                                                            </div>
                                                        </div>  
                           </div>
                         </div>
                                                        <br>

                   <div class="row">
           <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"></div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="login-horizental">
         <button class="btn btn-sm btn-primary login-submit-cs pull-left" type="submit" id="ModBtnExl">Ajouter</button>
                                                                             </div>
                                                                                        </div>
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
             <div class="login-horizental">
  <button data-dismiss="modal" href="#" class="btn btn-sm btn-primary login-submit-cs pull-left" type="button" >Annuler</button> </div>
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
                                                </div>
                                            </div>
                    </div>
                </div>
                  </div>
                        </div>
                </div>
                  </div>
                <br>
                <br>
                
                <div class="row">
                   @foreach($ens as $e)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                        <div class="hpanel hblue contact-panel contact-panel-cs res-tablet-mg-t-30 dk-res-t-pro-30" id="panel{{ $e->idEns }}">
                            <div class="panel-body custom-panel-jw">
                                <div class="social-media-in">
                               @if($e->ensUser1 != null)
                                    <a href="{{url('membreE/'.$e->ensUser1->id.'/details')}}"><i class="fa fa-eye"> </i></a>
                               
                                    <a href="{{url('membreE/'.$e->ensUser1->id.'/edite')}}"><i class="fa fa-edit"></i></a>
                                     @endif
                                    <a href="#" data-toggle="modal" data-id="{{$e->idEns}}" data-nom="{{$e->nom}}" data-prenom="{{$e->prenom}}"   data-target="#delete" ><i class="fa fa-trash" ></i></a>
                                   
                                </div>
                  <img alt="logo" class="img-circle m-b" src="{{ asset('img/profile/profil.png') }} ">
                                <h3><a href="">{{$e->nom}} {{$e->prenom}}</a></h3>
                                <p class="all-pro-ad">{{$e->grade}}
                                 </p>
                                <p>
                                    {{$e->profil}}
                                </p>
                            </div>
                            <div class="panel-footer contact-footer">
                                        <div class="professor-stds-int">
                                    <div class="professor-stds">
                                        <div class="contact-stat"> <strong>{{$e->nom}} {{$e->prenom}}</strong></div>
                                    </div>
                                 
                                </div>
                               
                            </div>
                            
                        </div>
                    </div>

                    @endforeach
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
                                        <p>Voulez-Vous vraiment supprimer l'enseignant : <b></b></p>
                                         </div>
                                                        </div>
                                       <div class="modal-footer danger-md">
     <form method="post"  action="{{ url('DeleteEns') }}" id="deleteForm">
    {{ csrf_field() }}

    <input type="hidden" name="idens" id="idens">
      
      <a data-dismiss="modal" href="#"  style="background: #d80027">Annuler</a>
      <a href="#" id="deleteBtn" style="background: #d80027">supprimer</a>
    </form>
                                        
                                    </div>
                                                    </div>
                                                </div>
                                            </div>
@endsection