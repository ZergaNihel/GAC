@extends('layouts.header')

@section('title','historiques')

@section('js')
@endsection

     @section('sidebar')
  
     @include('layouts.sidebarAdmin1')

     @endsection
    @section('mobileSidebar')
  
     @include('layouts.mobileSidebar1')

     @endsection

    
        @section('search')
        <ul class="breadcome-menu">
     <li><a href="{{url('Semestres/historique')}}">Historiques</a>  </li>
                                           
                                        </ul>
                                        @endsection
     @section('content')

<div class="admintab-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details shadow-reset">
                            <h2>Historiques</h2>
                            <p></p>
                        </div>
                    </div>
                </div>
<div class="product-status mg-b-15">
            <div class="container-fluid">
            
                <div class="row">
                            <div class="dashtwo-order-area mg-tb-30">
                        <div class="container-fluid">
                            <div class="row" id="hist">
                            
                                @foreach ($sem as $s)
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <div class="analytics-edu-wrap res-tablet-mg-t-30 dk-res-t-pro-30">
                                            @if($s->nomSem == 'Semestre 1')
                                            <div class="skill-content-3 analytics-edu analytics-edu1">
                                                @else 
                                                <div class="skill-content-3 analytics-edu analytics-edu4">
                                                @endif
                                                <div class="skill">
                                                    <div class="progress progress-bt">
                                                        <div class="lead-content">
                                                        @if($s->nomSem == 'Semestre 1') 
                                                            <h3> <a href="{{url('Semestres/historique/'.$s->idSem)}}"  style="color:#006DF0;"> {{$s->annee}} </a> </h3>
                                                        @else 
                                                        <h3> <a href="{{url('Semestres/historique/'.$s->idSem)}}" style="color:#933EC5;"> {{$s->annee}} </a> </h3>
                                                        @endif
                                                            <p> {{$s->nomSem}}</p>
                                                        </div>
                                                        <div class="progress-bar wow fadeInLeft" data-progress="80%" style="width: 80%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>80%</span> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
                 

     @endsection