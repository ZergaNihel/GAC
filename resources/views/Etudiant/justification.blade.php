@extends('layouts.header')

@section('title','Justification')
@section('js')
<script >
    $(document).ready(function(){
       $("#zoomInDown1").on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget).data('id');
    var m = $(this)
     m.find('#module').val(a);
     m.find('#idAbs option').remove();
   $.ajax({
  type: "get",
  url: "{{url('dates')}}/"+a+"/" ,
  success: function(data){
   // $('.stats-icon').css('display','');
    m.find('#idAbs').append('<option >Choisir une date</option>');
    for(var i =0;i<data.dates.length;i++){
     m.find('#idAbs').append('<option value="'+data.dates[i].idAbs+'">'+data.dates[i].date+'</option>');
    }//$('.stats-icon').css('display','none');}
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
                                            <li><a href="#">Abcences</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">liste des abcences</span>
                                            </li>
                                        </ul>
                                        @endsection
     @section('content')
      
          <div class="container-fluid">
       		          <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                               <div class="row">
                   <h2>Absences par Module </h2>
                                 </div>
                        </div>
                    </div>
                </div>
              </div>
               
               <div class="widgets-programs-area">
            <div class="container-fluid">
                <div class="row">
                	@foreach($mod as $m)
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
        <a href="{{url('/absences_Etudiant/details/'.$m->idMod)}}"><h4>{{$m->nom}} </h4> </a>
                                </div>
     
     
                               
 @if(App\Absence::where('id_Etu','=',Auth::user()->id_Etu)->where('etat','=',0)->where('justification','=',null)
                      ->join('td_tps','Absences.id_td_tp','td_tps.id')
                      ->where('td_tps.id_module','=',$m->idMod)
                      ->count()<= 0 and App\Exclu::where('Etu_exc',Auth::user()->id_Etu)->where('module_exc',$m->idMod)->count()==0)
                      
                           
                                <div class="m-t-xl widget-cl-1">
                       <h1 style="color:#65b12d;">
                       
{{App\Absence::where('id_Etu','=',Auth::user()->id_Etu)->where('etat','=',0)->where('justification','=',null)->join('td_tps','Absences.id_td_tp','td_tps.id')->where('td_tps.id_module','=',$m->idMod)->count()}} Absences non justifiés</h1>
 </div>@endif
                   @if(App\Absence::where('id_Etu','=',Auth::user()->id_Etu)->where('etat','=',0)->where('justification','=',null)->join('td_tps','Absences.id_td_tp','td_tps.id')->where('td_tps.id_module','=',$m->idMod)->count()==1 and App\Exclu::where('Etu_exc',Auth::user()->id_Etu)->where('module_exc',$m->idMod)->count()==0)
                    <div class="stats-icon pull-right" >
   <a href="#" data-toggle="modal" data-target="#zoomInDown1" data-id="{{$m->idMod}}" style="color:#006DF0;">  <i class="educate-icon educate-data-table"></i> </a>
                                </div>
                           
                                <div class="m-t-xl widget-cl-1">
                      <h1 class="text-success">
        {{App\Absence::where('id_Etu','=',Auth::user()->id_Etu)->where('etat','=',0)->where('justification','=',null)
                      ->join('td_tps','Absences.id_td_tp','td_tps.id')
                      ->where('td_tps.id_module','=',$m->idMod)
                      ->count()}} Absences non justifiés</h1></div>
                      @endif
      @if(App\Absence::where('id_Etu','=',Auth::user()->id_Etu)->where('etat','=',0)->where('justification','=',null)->join('td_tps','Absences.id_td_tp','td_tps.id')->where('td_tps.id_module','=',$m->idMod)->count()>= 2 and App\Exclu::where('Etu_exc',Auth::user()->id_Etu)->where('module_exc',$m->idMod)->count()<=0)
                       <div class="stats-icon pull-right" >
   <a href="#" data-toggle="modal" data-target="#zoomInDown1" data-id="{{$m->idMod}}" style="color:#ffb606;">  <i class="educate-icon educate-data-table"></i> </a>
                                </div>
                           
                                <div class="m-t-xl widget-cl-1">
                      <h1 style="color:#ffb606;">
        {{App\Absence::where('id_Etu','=',Auth::user()->id_Etu)->where('etat','=',0)->where('justification','=',null)
                      ->join('td_tps','Absences.id_td_tp','td_tps.id')
                      ->where('td_tps.id_module','=',$m->idMod)
                      ->count()}} Absences non justifiés</h1> </div>
                      @endif
        @if(App\Exclu::where('Etu_exc',Auth::user()->id_Etu)->where('module_exc',$m->idMod)->count()>0)
   <div class="m-t-xl widget-cl-1">
     <h1 class="text-danger">EXCLUS !!</h1></div>
  
   @endif
    
                                  
                                
                            </div>
                        </div>
                        <br>
                    </div>
      
           @endforeach
                @foreach($mod2 as $m)
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4>{{$m->nom}}</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <a href="#" data-toggle="modal" data-target="#zoomInDown1" data-id="{{$m->idMod}}">>  <i class="educate-icon educate-data-table"></i> </a>
                                </div>
                                <div class="m-t-xl widget-cl-1">
                                    <h1 class="text-success">
        {{App\Absence::where('id_Etu','=',Auth::user()->id_Etu)->where('etat','=',0)->where('justification','=',null)
                      ->join('td_tps','Absences.id_td_tp','td_tps.id')
                      ->where('td_tps.id_module','=',$m->idMod)
                      ->count()}} Absences</h1>
                                  
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
      
           @endforeach
                        
           <br>
           <br>
           <br>
           <br>
           <br>
            <br>
           <br>
           <br>
           <br>
           <br>
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
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="basic-login-inner modal-basic-inner">
                                                                            <h3>Ajouter une justification</h3>
                            <p>Vous pouvez ajouter une justification</p>
                             @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
      <form method="post" enctype="multipart/form-data" action="{{ url('add_justif') }}">
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
                         <div class="login-btn-inner">
                                                                                    
                   <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="login-horizental">
         <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Ajouter</button>
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
      @endsection
