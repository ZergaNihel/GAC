@extends('layouts.header')

@section('title','groupes')
@section('js')
<script >
       

  $(document).ready(function(){
 $('#formGrp').submit(function(e){
    e.preventDefault();
     
      var fd = new FormData($(this)[0]);
   
$.ajax({
  url:  $(this).attr('action'),
  type: "POST",
  data: fd,
  cache : false ,     
  processData: false,  // indique à jQuery de ne pas traiter les données
  contentType: false ,                 
success: function(data) {
   // alert(data.idG+"nn"+data.idSem);
window.location = "/groupe/detail/"+data.idG+"/"+data.idSem;
},
error: function (dataErr) {

$('.alert-block').css("display","");
 var response = JSON.parse(dataErr.responseText);
       // alert(dataErr.errors)
        var errorString = '<ul>';
        var k=1;
        $.each( response.errors, function( key, value) {

            errorString += '<li>' + k+'. '+value + '</li>';
k++;
        });
        errorString += '</ul>';
         $('.alert-block').html(errorString);
          }
});
       });
       $(document).on('click','#deleteBtn',function(){
       // alert("hhh");
        $.ajax({
type: "POST",
data: $('#deleteForm').serialize(),                             // to submit fields at once
url: $('#deleteForm').attr('action'),                        // use the form's action url
success: function(data) {
 //;
 $("#panel"+data.id+"").remove();
 $("#delete").modal("hide");
}
});
       });

   // alert($("#EditError").val());
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
    
     var m = $(this)
   // m.find('#editGrp').val(a);
    m.find("#idGrpDel").val(b);
     m.find("b").text(a);
    //alert("groupe = "+m.find("#idGrpDel").val(b));
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
    <style>
    .hover_img a { position:relative; }
    .hover_img a span { position:absolute; display:none; z-index:99; }
    .hover_img a:hover span { display:block;   height:448px !important; width: 1200px !important;}
    .product-status-wrap img { width:500px !important;}
</style>
@endsection

    
     @section('sidebar')
  
     @include('layouts.sidebarAdmin2')

     @endsection
    @section('mobileSidebar')
  
     @include('layouts.mobileSidebar2')

     @endsection

    
                                        @section('search')
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Groupes</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">liste des groupes</span>
                                            </li>
                                        </ul>
                                        @endsection
                                         @section('content')
  

         <div class="edu-accordion-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                            <h2>Groupe étudiants par section</h2>
                         
                        </div>
                           <div class="add-product pull-right">
                                                <a class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown1">Nouveau Groupe</a>
                                            </div>
                                          
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @if($message = Session::get('succ'))
 
 <div class="alert-icon shadow-inner res-mg-t-30 table-mg-t-pro-n" id="alertSuc1" >
                             <div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11" style="">
                              <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                  <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                </button>
                             
                              <p>  <i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"> </i><strong> Modification!</strong> {{ $message }}<b id="bjus"></b>.</p>
                          </div>
   </div>


 @endif
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
                            <p>Ajouter un nouveau groupe</p>
                           
   <div class="alert alert-danger alert-block" style="display: none" >
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong ></strong>
   </div>
   
      <form method="post" enctype="multipart/form-data" action="{{ url('groupes') }}" id="formGrp">
    {{ csrf_field() }}
    <input type="hidden" name="idsemestre" value="{{$semestre->idSem}}">
                 <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Section</label>
                                                            </div>
     <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="form-select-list"> <select class="form-control custom-select-value" name="section" placeholder="password" style="width: 80%;" id="nameSec">
               <option disabled >choisissez la section</option>
                         @foreach($sections as $sec)                                
  <option value="{{$sec->idSec}}">{{$sec->nomSec}}  </option>
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
                  
      <input name="groupe" type="text" placeholder="Nom de Groupe" class="form-control" id="nameGrp" style="width: 80%;"> </div>
  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner"  >
                                                        <div class="row">
                                                            
                                                               <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Liste d'étudiants</label>
                                                               </div>
                                                               <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 mg-tb-15">
                                                                  <div class="hover_img">
                                                                    <a href="#"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i><span><img src="{{asset('img/Etudiants.PNG')}}" alt="image" width="500px" height="300px" class="pull-left"/></span></a>
                                                                  </div>
                                                               </div>
                                                            <div class="col-lg-8 col-md-11 col-sm-11 col-xs-11">
                                                                <div class="file-upload-inner ts-forms">
                                                                    <div class="input prepend-small-btn">
                                                                       
                                                                        <div class="file-button">
                                                                          <i class="fa fa-download"></i>
                                                                          <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;" style="width:80%" name="select_file" id ="liste" >
                                                                        </div>
                                                                        <input type="text" id="prepend-big-btn" placeholder="no file selected" style="width:80%">
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
         <button class="btn btn-sm btn-primary login-submit-cs" type="submit" id="addGrp">Ajouter</button>
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
       
                    <?php $var=1; ?>
@foreach($section as $s)

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="admin-pro-accordion-wrap shadow-inner responsive-mg-b-30">
                            <div class="alert-title">
                                <h2>{{$s->section->nomSec}}</h2>
                              
                            </div>
                            <div class="panel-group edu-custon-design" id="accordion">
                               
                                @foreach(App\Groupe_etu::where('sem_groupe','=',$semestre->idSem)->where('sec_groupe','=',$s->sec_groupe)->select('groupe')->get() as $grp)
                           <div class="panel panel-default" id="panel{{$grp->groupe1->idG}}">      
                                    <div class="panel-heading accordion-head">
            <h4 class="panel-title" style="color:white;"><a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$var}}" > Groupe {{ $grp->groupe1->nomG }}  </a>
  <a class="zoomInDown mg-t" href="#" data-ids1="{{$s->section->idSec}}" data-toggle="modal" data-id="{{$grp->groupe1->idG}}" data-groupe="{{$grp->groupe1->nomG}}" data-section="{{$s->section->nomSec}}"   data-target="#edit"><i class="fa fa-edit pull-right"> </i> </a>
   
<a href="{{url('groupe/detail/'.$grp->groupe1->idG.'/'.$semestre->idSem)}}"> <i class="fa fa-eye pull-right"> </i></a>

<a  href="#" class="zoomInDown mg-t" data-toggle="modal" data-id="{{$grp->groupe1->idG}}" data-groupe="{{$grp->groupe1->nomG}}" data-section="{{$s->section->nomSec}}"   data-target="#delete" > <i class="fa fa-trash pull-right"> </i></a>
            
                                        </h4>
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
                     <p>Voulez-Vous vraiment supprimer le Groupe : <b></b></p>
                                         </div>
                                                        </div>
                                       <div class="modal-footer danger-md">
     <form method="post"  action="{{ url('DeleteGroupes') }}" id="deleteForm">
    {{ csrf_field() }}

    <input type="hidden" name="idGrpDel" id="idGrpDel">
      
      <a data-dismiss="modal" href="#"  style="background: #d80027">Annuler</a>
      <a href="#" id="deleteBtn" style="background: #d80027">supprimer</a>
    </form>
                                        
                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="edit" class="modal modal-edu-general modal-zoomInDown fade" role="dialog" >
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
                             <h3>Modifier le Groupe : {{$grp->groupe1->nomG}}</h3>
                            
     @if(count($errors) > 0)
    <div class="alert alert-danger">
     @php $var = 1; @endphp
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $var}}. {{ $error }}</li>
      @endforeach
     </ul>
    </div>
     <input type="hidden" name="EditError" value="1">
   @endif
   
  
      <form method="post"  action="{{ url('EditGroupes') }}">
    {{ csrf_field() }}
    <input type="hidden" name="idGrp" id="idGroupe">
      <input type="hidden" name="idGrp_etu" id="idGroupe_etu">
                 <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2">Section</label>
                                                            </div>
     <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="form-select-list"> <select class="form-control custom-select-value" name="section"  style="width: 80%;" >
             <option id="editSec" selected></option>
               <option disabled >choisissez la section</option>
                         @foreach($sections as $sec)                                
  <option value="{{$sec->idSec}}">{{$sec->nomSec}}  </option>
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
                  
      <input  type="text" value="" placeholder="Nom de Groupe" class="form-control" id="editGrp" style="width: 80%;" name="groupe"> </div>
  
                                                            </div>
                                                        </div>
                                                    </div>
                                       
                         <div class="login-btn-inner">
                                                                                    
                   <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="login-horizental">
         <button class="btn btn-sm btn-primary login-submit-cs" id="submitEdit" type="submit">Modifier</button>
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

                                         </div>   <br>
                                           <div class="alert-title">
                                         <h4 class="nbr{{$grp->groupe1->idG}}">Nombre d'étudiants : </h4>

                                         </div><br>
                                          <input type="hidden" id="groupe_id" class="groupe" name="group[]" value="{{$grp->groupe}}">
                                            <div class="charts-area mg-b-15">
                                                    <div class="charts-single-pro responsive-mg-b-30">
                                                     
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
        <br> <br>
        @endsection    
        <!-- accordion End-->
        