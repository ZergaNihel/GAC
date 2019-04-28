@extends('layouts.header')

@section('title','Semestres')
@section('js')
<script >


          $(document).ready(function(){
// -----------------------------------semestres---------------------------
     $.ajax({
  type: "get",
  url: "{{url('new_sem')}}/" ,
  success: function(data){
  // alert(data.test);
    if(data.test){
    $("#new").prop("disabled",true);
    }
    else{
 $("#new").prop("disabled",false);
    }
  }
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
                                            <li><a href="#">Semestres</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">liste de semestres</span>
                                            </li>
                                        </ul>
                                        @endsection
                                         @section('content')
                                 
          <div class="edu-accordion-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                               <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <h2>Semestres </h2>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <div class="login-btn-inner pull-right">
                               <div class="login-horizental">
      <button class="btn btn-sm btn-primary login-submit-cs" href="#" data-toggle="modal" data-target="#zoomInDown1"  type="button" id="new">Nouveau Semestre</button>
                               </div>
                           </div>
   </div>  </div>
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
                                                                            <h3>Année Universitaire</h3>
                            <p> Nouvelle Année Universitaire</p>
                            <br>
               <div class="alert alert-danger alert-block" style="display: none;" id="error">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>Vous devez remplisser tout les champs</strong>
   </div>
         <form action="{{url('addSem')}}" method="post" id="formSem" >
                                  {{ csrf_field() }}
                    
    
                                          <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2">Année Universitaire</label>
                                                            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                               <div class="chosen-select-single mg-b-20">
                                               
    <select data-placeholder="Choisir un type" class="chosen-select" tabindex="-1" name="anne" id="anne" required>
        <option >Choisir un type ..</option>
          <option value="2017/2018">2017/2018</option>
          <option value="2018/2019">2018/2019</option>
          <option value="2019/2020">2019/2020</option>
          <option value="2020/2021">2020/2021</option>
          <option value="2021/2022">2021/2022</option>
                                                                          
                                                    </select>
                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                         <div class="login-btn-inner">
              

                   <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="login-horizental">
         <button class="btn btn-sm btn-primary login-submit-cs" type="submit" id="SemBtn">Ajouter</button>
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
                                                    </div>
                                                </div>
                                            </div>

                <div class="analytics-sparkle-area">
            <div class="container-fluid" id="semestre">
  @if($sem1->isEmpty() and $sem2->isEmpty())
        <div class="row">
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                 <div class="row"> 
             
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "> 
          <h5 style="color: grey;text-align: center">  Aucun Semestre crée</h5>
                            </div>
                                </div>
                        
                             
                            </div>
                        </div>
                         <br>
        <br>
         <br>
        <br>
         
       
                    </div>
       <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
        </div>
        <br>
        <br>
        <br>
         <br>
        <br>
         <br>
        <br>
        @else      
 @foreach($sem1 as $s )
                <div class="row">
                   <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                     <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                 <div class="row"> 
                                     <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"> 
                                   <div class="m icon-box">
                                        <i class="educate-icon educate-miscellanous"></i>
                                    </div>
                                </div>
                                    <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 pull-left"> 
                              <h5>  {{$s->nomSem}} - {{$s->annee}}</h5>
                            </div>
                                </div>
                                <h2>
                                    <div class="row"> 
                              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
                                       <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                                     <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li></ul></div>
                                </div>  <div  class="col-xs-3 col-sm-3 col-md-3 col-lg-3 "> 
                                    <a class="btn btn-success  widget-btn-1 btn-sm pull-right" href="{{url('Semestres/dashboard/'.$s->idSem)}}">Explorer</a></div>
                                    <div  class="col-xs-3 col-sm-3 col-md-3 col-lg-3 "> 
                                    <button class="btn btn-success  widget-btn-1 btn-sm pull-left">Archiver</button></div></div>  </h2>
                             
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                        
                    </div>
                </div>
                <br>
@endforeach
 @foreach($sem2 as $s )
                <div class="row">
                   <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                     <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                 <div class="row"> 
                                     <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"> 
                                   <div class="m icon-box">
                                        <i class="educate-icon educate-miscellanous"></i>
                                    </div>
                                </div>
                                    <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 pull-left"> 
                              <h5>  {{$s->nomSem}} - {{$s->annee}}</h5>
                            </div>
                                </div>
                                <h2>
                                    <div class="row"> 
                              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
                                       <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                                     <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li></ul></div>
                                </div>  <div  class="col-xs-3 col-sm-3 col-md-3 col-lg-3 "> 
                                    <a class="btn btn-info widget-btn-2 btn-sm pull-right" href="{{url('Semestres/dashboard/'.$s->idSem)}}">Explorer</a></div>
                                    <div  class="col-xs-3 col-sm-3 col-md-3 col-lg-3 "> 
                                    <button class="btn btn-info widget-btn-2 btn-sm pull-left">Archiver</button></div></div>  </h2>
                             
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                        
                    </div>
                </div>
                <br>
@endforeach
@endif
                </div>
              </div>
            </div>
        </div>
        @endsection

        