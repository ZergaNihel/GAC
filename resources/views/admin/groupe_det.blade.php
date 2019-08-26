@extends('layouts.header')

@section('title','groupes')

@section('js')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

<script >

$(document).ready(function(){
 $("#birthday").val("");
 grp = $('#groupe').val();
     $('#laravel_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('groupe/index1') }}/"+grp,
        columns:[
            { data: "idEtu" , name: "idEtu" },
            { data: "nom" ,  name: "nom" },
            { data: "prenom" ,  name: "prenom" },
            { data: "matricule" ,  name: "matricule"},
            { data: "date_naissance" ,  name: "date_naissance" },
            { data: "type" ,  name: "type" },
            { data: "action" ,  name: "action" },
            
        ]
     });
     
     //------------------------------------nouveau---------------------------------
 $('body').on('click', '.new', function () {
$('.modal-basic-inner h3').html("Nouveau Etudiant");
          $('.modal-basic-inner p').html("Ajouter un nouveau étudiant");
          $('#newStud').css("display","");
          $('#updStud').css("display","none");
          $('#formEtud').trigger("reset");
          $("#birthday").val("");
          $("select option:selected").removeAttr('selected');
          $("select").trigger('chosen:updated');
          $("#module").css("display","none");
          $('#error').css("display","none");
          $('#zoomInDown1').modal('show');
 });
     //-------------------------------------editButton----------------------------
       $('body').on('click', '.edit', function () {
      var product_id = $(this).attr("id");
      $('#error').css("display","none");
      $.get("{{ url('edit_Student') }}" +'/' + product_id , function (data) {
          $('.modal-basic-inner h3').html("Modifier les informations");
          $('.modal-basic-inner p').html("Vous pouvez modifier les informations concernant chaque étudiant");
          $('#newStud').css("display","none");
          $('#updStud').css("display","");
          $('#zoomInDown1').modal('show');
          $("#id_stud").val(data.etu.idEtu);
          $('#nom').val(data.etu.nom);
          $('#prenom').val(data.etu.prenom);
          $('#matricule').val(data.etu.matricule);
          $('#birthday').val(data.etu.date_naissance);
     
    if(data.etu.type === "Répétitif(ve)" || data.etu.type === "Endétté(e)"){
      if(data.etu.type === "Répétitif(ve)") {
        $('input:radio[name=type]')[1].checked = true;
      }
       if(data.etu.type === "Endétté(e)") {
        $('input:radio[name=type]')[2].checked = true;
      }
      //
    //  alert(data.mods);
      $("#module").css('display','');
    var  m_array = new Array();
      $.each(data.mods, function (index, value) {
        m_array.push(value.module_end);
    });
 //$(".chosen-select").chosen(); 
$(".chosen-select").val(m_array).trigger("chosen:updated");
     
}else{
      $('input:radio[name=type]')[0].checked = true;
       $("#module").css('display','none');
    }
          
      })
   });

//----------------------------------------------------newStudent----------------------       
$('#newStud').click(function (e) {
        e.preventDefault();
        $(this).html('création..');
    
        $.ajax({
          data: $("#formEtud").serialize(),                             
          url:  $("#formEtud").attr('action'),
          type: "POST",
          success: function (data) {
     
              $('#formEtud').trigger("reset");
              $('#zoomInDown1').modal("hide");
              $('#newStud').html('Ajouter');
               $("#birthday").val("");
           $("select option:selected").removeAttr('selected');
           $("select").trigger('chosen:updated');
          $("#module").css("display","none");
              $('#laravel_datatable').DataTable().ajax.reload();

              //table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#newStud').html('Ajouter');
              $('#error').css("display","");
            
             
        var response = JSON.parse(data.responseText);
        alert(response.errors)
        var errorString = '<ul>';
        $.each( response.errors, function( key, value) {

            errorString += '<li>' + value + '</li>';

        });
        errorString += '</ul>';
         $('#error').html(errorString);
          }
      });
    });
//----------------------------------------------------update------------------------
$('#updStud').click(function (e) {
       // e.preventDefault();
        $(this).html('Modifier..');
    
        $.ajax({
          data: $("#formEtud").serialize(),                             
          url:  "{{url('update_student')}}",
          type: "POST",
          success: function (data) {
     
              $('#formEtud').trigger("reset");
              $('#zoomInDown1').modal("hide");
              $('#updStud').html('Modifier');
              $("#birthday").val("");
           $("select option:selected").removeAttr('selected');
           $("select").trigger('chosen:updated');
          $("#module").css("display","none");
              $('#laravel_datatable').DataTable().ajax.reload();
 },
          error: function (data) {
              console.log('Error:', data);
              $('#updStud').html('Modifier');
              $('#error').css("display","");
            
             
        var response = JSON.parse(data.responseText);
        alert(response.errors)
        var errorString = '<ul>';
        $.each( response.errors, function( key, value) {

            errorString += '<li>' + value + '</li>';

        });
        errorString += '</ul>';
         $('#error').html(errorString);
          }
      });
    });
//---------------------------------delete------------------------------
$("#delete").on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget).data('nom');
     var c = $(event.relatedTarget).data('prenom');
    var b = $(event.relatedTarget).data('id');
     var m = $(this)
    m.find("b").text(a+" "+c);
    m.find(".deleteBtn").attr("id",b);

    
});
//---------------------------------- deleteBtn -------------------------------
         $('body').on('click', '.deleteBtn', function () {
     $(this).html('suppression..');
        var product_id = $(this).attr("id");
        //confirm("Are You sure want to delete !");
    
        $.ajax({
            type: "get",
            url: "{{ url('supprime_etudiant') }}/"+product_id,
            success: function (data) {
              //alert("hii"+data.success);
                $('#laravel_datatable').DataTable().ajax.reload();
                $('#delete').modal("hide");
                //table.draw();
                
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

/*$(document).on('click','#newStud',function(){
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
        });*/
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
                                            <li><span class="bread-blod">liste des groupes/{{$grp->nomG}}</span>
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
                                    <h1>Groupe :  <span class="table-project-n">{{$grp->nomG}} - </span>  @foreach ($sec as $s)
      <span class="table-project-n">{{$s->section->nomSec}}</span>
                                     @endforeach</h1>
                                   
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                  
                                    <div class="add-product">
                                                <a class="zoomInDown mg-t new"  data-toggle="modal" ><i class="fa fa-plus"> </i> Nouveau étudiant</a>
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
                                <strong>Erreur!</strong> 
                            </div>
                            <br>
                           
                          </div>

                       <form action="{{url('NouveauEtudiant')}}"  method="post" id="formEtud">
                                {!! csrf_field() !!}
                      <input type="hidden" name="id_stud" id="id_stud" value="{{0}}">
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
                <input type="radio" value="Nouveau(elle)"  onchange="fct1();" id="type" name="type"> <i></i> Nouveau(elle)</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                       <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div >
                                                                                <label>
         <input type="radio" value="Répétitif(ve)"  onchange="fct2();" id="type" name="type"> <i></i> Répétitif(ve)</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                           <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div >
                                                                                <label>
               <input type="radio" value="Endétté(e)" name="type" onchange="fct2();" id="type"> <i></i> Endétté(e)</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                             
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                         
                                                    </div>


<input type="hidden" name="groupe" id="groupe" value="{{$id}}">



                  <div class="form-group-inner" style="display: none;" id="module">
                                    <div class="row">
                                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Modules</label>
                                                                                         </div> 
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                           <div class="chosen-select-single">
                                               
                                                <select data-placeholder="Module..." class="chosen-select" multiple="multiple" name="modules[]" id="module1">
                                                       
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
<button class="btn btn-sm btn-primary login-submit-cs" type="button"id="updStud" style="display:none;">Modifier</button>
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
                                    <table id="laravel_datatable" data-toggle="table"   data-resizable="true" data-cookie="true"
                                   
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                
                                                <th data-field="idEtu">ID</th>
                                                <th data-field="nom" data-editable="true">Nom</th>
                                                <th data-field="prenom" data-editable="true">Prénom</th>
                                                 <th data-field="matricule">Matricule</th>
                                                <th data-field="date_naissance" data-editable="true">Date de Naissance</th>
                                               
                                                <th data-field="type" data-editable="true">Type</th>
                                                <th data-field="action" data-editable="true">Action</th>
                                               
                                            </tr>
                                        </thead>
                              
                                    </table>
                                   



                                    <br>


    



 

                                </div>
                            </div>
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
                                        <p>Voulez-Vous vraiment supprimer l'étudiant : <b></b></p>
                                         </div>
                                                        </div>
                                       <div class="modal-footer danger-md">
      <a data-dismiss="modal" href="#"  style="background: #d80027">Annuler</a>
      <a href="#" class="deleteBtn" id="" style="background: #d80027">supprimer</a>
   
                                        
                                    </div>
                                                    </div>
                                                </div>
                                            </div>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
 @endsection