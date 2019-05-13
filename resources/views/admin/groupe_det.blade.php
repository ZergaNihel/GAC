@extends('layouts.header')

@section('title','groupes')
@section('js')
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


 @endsection