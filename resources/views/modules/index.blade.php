@extends('layouts.header')

@section('title','Modules')
@section('js')
<script type="text/javascript">


 $(document).ready(function(){
//alert("hii");
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


//alert("id="+a+"  nom= "+b+" code= "+c+" type= "+d+" semestre= "+e+" responsable="+f+" ");
    var m = $(this)
    m.find('#idMod').val(a);
    m.find('#nom').val(b);
    m.find('#code').val(c);
    m.find("#type").val(d);
  //  $("select option:selected").AddAttr('selected');
    m.find("#type").trigger('chosen:updated');
    //m.find("#semestre").val(e);
   
   // alert("s1 = "+$('#s1').val()+ "s2 = "+$('#s2').val()+" Aucun = "+$('#auc').val());
    if(e == $('#s1').val()){
      $('input:radio[name=semestre1]')[0].checked = true;
      $("#enseignant1").css('display','');
       m.find("#enseignant12").val(f).trigger('chosen:updated');
       //m.find("select #enseignant12").trigger('chosen:updated');
    }else if(e == $('#s2').val()){
      $('input:radio[name=semestre1]')[1].checked = true;
      $("#enseignant1").css('display','');
       m.find("#enseignant12").val(f).trigger('chosen:updated');
       // m.find("select #enseignant12").trigger('chosen:updated');
    }else{
      $('input:radio[name=semestre1]')[2].checked = true;
      $("#enseignant1").css('display','none');
    }

   // alert(m.find("#idGroupe_etu").val());
    //m.find('#prepend-big-btn').val(c);
});

      //  alert("sem"+sem+"k"+k);
         //alert("s1"+s1+"s2"+s2);
       $(document).on('click','#ModBtn',function(){
      //  alert(""+$("#nom1").val()+""+$("#code1").val()+""+$("#type1").val()+""+$('input:radio[name=semestre]')[2].checked+""+$("select[name=enseignant]").val()+"");

          if($("#nom1").val() === "" || $("#code1").val() === "" || $("#type1").val() ==0 || ( $('input:radio[name=semestre]')[0].checked == false && $('input:radio[name=semestre]')[1].checked== false && $('input:radio[name=semestre]')[2].checked == false) ){
    //alert("cc1");
      $('#error').css("display","");
    //$("#module > option").attr("selected",false);
    
    }else if(($('input:radio[name=semestre]')[0].checked== true ||  $('input:radio[name=semestre]')[1].checked== true) && $("#enseignantN").val() == 0){
          $('#error').css("display","");
          //alert("cc2 = "+$("#enseignantN").val());
    }else{

         $('#error').css('display' ,"none");
        $.ajax({
type: "POST",
data: $('#formMod').serialize(),                             // to submit fields at 
url: $('#formMod').attr('action'),                        // use the form's action url
success: function(data) {
    $("#zoomInDown1").modal("hide");
    $('input:radio[name=semestre]')[0].checked = false;
    $('input:radio[name=semestre]')[1].checked = false;
    $('input:radio[name=semestre]')[2].checked = false;
    //$("select[name=enseignant]").val("");
    $("#type1 option:selected").removeAttr('selected');
    $("#type1").trigger('chosen:updated');
    $("select[name=enseignant] option:selected").removeAttr('selected');
    $("select[name=enseignant]").trigger('chosen:updated');
    //$("#type1").val("");
    $("#nom1").val("");
    $("#code1").val("");
     $("#enseignant1").css('display','none');

  //  alert(data.mod.semestre);
    if(data.mod.semestre == null ){
     text = '<button class="ds-setting">Désactivé</button>';
     text1 = 'Aucun';
    }else{
       //  alert(data.mod.semestre+" "+$("#s1").val());
        if(data.mod.semestre == $("#s1").val()){
           
             text1 = 'Semestre 1';
            text = '<button class="pd-setting">Active</button>';
        }
        if (data.mod.semestre == $("#s2").val()) {
             text1 = 'Semestre 2';
             text = '<button class="ps-setting">Active</button>';
        }



}

    

    $('table').append('<tr id="'+data.mod.idMod+'"><td id="nom'+data.mod.idMod+'">'+data.mod.nom+'</td><td id="code'+data.mod.idMod+'">'+data.mod.code+'</td><td id="type'+data.mod.idMod+'">'+data.mod.type+'</td><td id="active'+data.mod.idMod+'">'+text+'</td><td id="semestre'+data.mod.idMod+'">'+text1+'</td><td id="action'+data.mod.idMod+'"><a data-toggle="tooltip" href="{!! asset("modules/details/'+data.mod.idMod+'")!!}" title="Détails" class="btn btn-default" ><i class="fa fa-book" aria-hidden="true"></i></a><a id="edita" data-toggle="modal"  href="#" title="Modifier" class="btn btn-default" data-target="#EditModule" data-nom="'+data.mod.nom+'" data-code="'+data.mod.code+'" data-type="'+data.mod.type+'" data-semestre="'+data.mod.semestre+'" data-responsable="'+data.mod.ens_responsable+'" data-id="'+data.mod.idMod+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a><button data-toggle="tooltip" title="supprimer" class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true"></i></button></td></tr>');
    $("#var").val(k++);

var s1 =$("#action"+data.mod.idMod+"").find("button");
    s1.attr("id" , "deleteMod"+data.mod.idMod+"");
    
}
});
    }
       });

 $(document).on('click','#ModEditBtn',function(){
 
  if($("#nom").val() === "" || $("#code").val() === "" || $("#type").val() ==0 || ( $('input:radio[name=semestre1]')[0].checked == false && $('input:radio[name=semestre1]')[1].checked== false && $('input:radio[name=semestre1]')[2].checked == false) ){
   // alert("cc1");
      $('#error').css("display","");
    //$("#module > option").attr("selected",false);
    
    }else{
      $('#error').css("display","none");
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
      }
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

@endsection 

    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
 @section('sidebar')
  
     @include('layouts.sidebarAdmin1')

@endsection
    @section('mobileSidebar')
  
     @include('layouts.mobileSidebar1')

     @endsection

    
                                        @section('search')
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Modules</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">liste de Modules</span>
                                            </li>
                                        </ul>
                                        @endsection
        @section('content')
         <!-- start index -->
   
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Modules</h4>
                          
                    <div class="add-product">
                                                <a class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown1">Nouveau Module</a>
                                            </div>
               

                    <div class="asset-inner" id="asset-inner">
                     @include('modules.pagination')
                     
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
                            <br>
               <div class="alert alert-danger alert-block" style="display: none;" id="error">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>Vous devez remplisser tout les champs</strong>
   </div>
         <form action="{{url('addModule')}}" method="post" id="formMod" >
                                  {{ csrf_field() }}
                         <div class="form-group-inner">
                  <div class="row">
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <label class="login2">Intitulé</label>
                                                                                        </div>
                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                              <input type="text" class="form-control" placeholder="Nom de module"  name="nom" id="nom1" />
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
                                               
    <select data-placeholder="Choisir un type" class="chosen-select" tabindex="-1" name="type" id="type1">
        <option value="0" >Choisir un type ..</option>
          <option value="CTT">(CTT)Cours/Tp/TD</option>
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
                          @foreach ($sem1 as $key ) 
                                                                 <label>
                <input type="radio" value="{{$key->idSem}}"  id="s1" name="semestre"> <i></i> Semestre 1</label>
                @endforeach
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                       <div class="row">
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div >
                     @foreach ($sem2 as $key ) 
            <label>
         <input type="radio" value="{{$key->idSem}}"   id="s2" name="semestre"> <i></i> Semestre 2</label>
              @endforeach
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
                                               
    <select data-placeholder="Choisir un type" class="chosen-select" tabindex="-1" name="enseignant" id="enseignantN">
                    <option  value="0">Choisir un enseignant ..</option>                                           
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



   
        <br> <br>      

      
@endsection