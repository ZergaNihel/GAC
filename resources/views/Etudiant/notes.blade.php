@extends('layouts.header')

@section('title','Notes')
@section('js')
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script >
    $(document).ready(function(){
       $("#zoomInDown1").on('show.bs.modal', function(event) {

    var a = $(event.relatedTarget).data('note');
    var b = $(event.relatedTarget).data('type');
    var c = $(event.relatedTarget).data('module');
    var n = $(event.relatedTarget).data('id');
    var m = $(this)
    m.find('h3').text(c+" - "+b);
    m.find('#b1').text(a);
    m.find('h3').css('color','#006DF0');
    m.find('h4').css('color','#006DF0');
       $.ajax({
  type: "get",
  url: "{{url('readNotif')}}/"+n+"/" ,
  success: function(data){
  $('#new').css('display','none');
    $('#unlock').removeClass();
    $('#unlock').addClass("fa fa-unlock");
 }
});
   
   //$('#Tmod').css('color','black');
  
   
    
     
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
                                            <li><a href="#">Notes</a> <span class="bread-slash">  </span>
                                            </li>
                                           
                                        </ul>
                                        @endsection
     @section('content')
      
     <div class="container-fluid">
       		<div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                               <div class="row">
                   <h2>Notes d'Examens et contrôle </h2>
                                 </div>
                        </div>
       </div>
      </div>

       

     </div>
  
                 <div class="income-order-visit-user-area">
            <div class="container-fluid">
                <div class="row">
@foreach( Auth::user()->unreadNotifications->where('type','App\Notifications\ValideNotes') as $notification)

                                 <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-edu-rate">
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <h3 id="Tmod" style="color:#006DF0;"><span>{{$notification->data['module']}} </span></h3></div>
                               <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

                                           <div class="stats-icon ">
<a  href="#" data-toggle="modal" data-target="#zoomInDown1" data-id="{{$notification->id}}" data-note="{{$notification->data['note']}}" data-type="{{$notification->data['typeExam']}}" data-module="{{$notification->data['module']}}" style="color:#006DF0;"> <i id="unlock" class="fa fa-lock"></i> 
                      <span class="indicator-ms"></span>
                                    </a>

                                </div>
                                </div>
                                    </div>
                                
                                </div>
                                <br>
                                <div class="income-range">
                                  <br>
                                    <p><b>{{$notification->data['typeExam']}}</b></p>
                                    <span id="new" class="income-percentange bg-green">Nouvel <i class="fa fa-bolt"></i>
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                     @foreach( Auth::user()->readNotifications->where('type','App\Notifications\ValideNotes') as $notification)
                                 <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-edu-rate">
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <h3 ><span>{{$notification->data['module']}} </span></h3></div>
                               <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

                                           <div class="stats-icon ">
<a  href="#" data-toggle="modal" data-target="#zoomInDown1" data-note="{{$notification->data['note']}}" data-type="{{$notification->data['typeExam']}}" data-module="{{$notification->data['module']}}" style="color:#006DF0;"> <i id="unlock" class="fa fa-unlock"></i> 
                      <span class="indicator-ms"></span>
                                    </a>

                                </div>
                                </div>
                                    </div>
                                
                                </div>
                                <br>
                                <div class="income-range">
                                  <br>
                                    <p><b>{{$notification->data['typeExam']}}</b></p>
                                   
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                       </div>
                        </div>
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
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="basic-login-inner modal-basic-inner">
                            <h3></h3>
                            <br>
  <p>Vous avez eu  : <h4 id="b1"></h4>  </p>
                            
                   
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
      @endsection
