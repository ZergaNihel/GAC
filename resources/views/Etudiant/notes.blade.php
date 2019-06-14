@extends('layouts.header')

@section('title','Notes')
@section('js')
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
                                            <li><a href="#">Abcences</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">liste des abcences</span>
                                            </li>
                                        </ul>
                                        @endsection
     @section('content')
       <div class="row">
       	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"> </div>
       	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
       		          <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                               <div class="row">
                   <h2>Semestre 1 </h2>
                                 </div>
                        </div>
                    </div>
                </div>
                <div class="row">
               <div class="widgets-programs-area">
            <div class="container-fluid">
                <div class="row">
                	
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
        <a href="{{url('')}}"><h4>module </h4> </a>
                                </div>
                                <div class="stats-icon pull-right">
                                    <a href="#" data-toggle="modal" data-target="#zoomInDown1" data-id=""> <i class="fa fa-lock"></i> 
                      <span class="indicator-ms"></span>
                                    </a>

                                </div>
                                <div class="m-t-xl widget-cl-1">
                                    <h1 class="text-success"></h1>
                                  
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
      
  
                        
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
                </div>
       	</div>
     <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
          <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                               <div class="row">
                   <h2>Semestre 2 </h2>
                                 </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
        <a href="{{url('')}}"><h4>module </h4> </a>
                                </div>
                                <div class="stats-icon pull-right">
                                    <a href="#" data-toggle="modal" data-target="#zoomInDown1" data-id=""> <i class="fa fa-unlock"></i> </a>
                                </div>
                                <div class="m-t-xl widget-cl-1">
                                    <h1 class="text-success"></h1>
                                  
                                </div>
                            </div>
                        </div>
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
                            <p>Register User can get sign in from here</p>
                             @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
     
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
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
      @endsection
