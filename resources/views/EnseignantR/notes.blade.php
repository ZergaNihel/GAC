@extends('layouts.masterEr')

@section('script1')
<!-- modals jquery
    ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endsection

@section('path')
    <li>
        <span class="bread-blod">Liste des paquets</span>
    </li>
@endsection


@section('content')

<div class="edu-accordion-area mg-b-15">
    <div class="container-fluid">
        @if($message = Session::get('succ'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>

        @endif
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="admin-pro-accordion-wrap shadow-inner responsive-mg-b-30">
                <div class="panel-group edu-custon-design" id="accordion">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="white-box res-mg-t-30 table-mg-t-pro-n">
                            <h2 class="box-title">Controle</h2>
                            
                            <ul class="country-state">
                                    <?php $j=0; $i=0; $var=1; $l='up'; ?>
                                @foreach ($controle as $c)
                                    @if( $tauxCC[$j] < 50 ) 
                                        <?php $x='inverse'; $l='down'; ?>
                                    @elseif( $tauxCC[$j] > 50 ) 
                                        <?php $x='info'; $l='up'; ?>
                                    @else
                                        <?php $x='warning'; $l='up'; ?>
                                    @endif
                                    
                                    <li>
                                        <a href="{{url('notes/'.$semestre->idSem.'/'.$c->idPaq)}}"><h2><span class="counter">Paquet {{$c->salle}}</span></h2></a>
                                         <small> {{$nbEtuCC[$i++]}} étudiant(s)</small>
                                        <div class="pull-right">{{number_format($tauxCC[$j])}}% de réussite<i class="fa fa-level-{{$l}} ctn-ic-{{$var}}"></i></div>
                                        <div class="progress progress-bt">
                                            <div class="progress-bar progress-bar-{{$x}}" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{$tauxCC[$j]}}%;"> <span>{{$tauxCC[$j++]}} % de réussite</span></div>
                                        </div>
                                    </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

           
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="admin-pro-accordion-wrap shadow-inner responsive-mg-b-30">
                <div class="panel-group edu-custon-design" id="accordion">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="white-box res-mg-t-30 table-mg-t-pro-n">
                            <h2 class="box-title">Examen</h2>
                            <ul class="country-state">
                                    <?php $j=0; $i=0; $var=1; $l='up'; ?>
                                @foreach ($examen as $c)
                                    @if( $tauxEx[$j] < 50 ) 
                                        <?php $x='inverse'; $l='down'; ?>
                                    @elseif( $tauxEx[$j] > 50 ) 
                                        <?php $x='info'; $l='up'; ?>
                                    @else
                                        <?php $x='warning'; $l='up'; ?>
                                    @endif
                                    
                                    <li>
                                        <h2><span class="counter">Paquet {{$c->salle}}</span></h2> <small> {{$nbEtuEx[$i++]}} étudiant(s)</small>
                                        <div class="pull-right">{{$tauxEx[$j]}}% <i class="fa fa-level-{{$l}} ctn-ic-{{$var}}"></i></div>
                                        <div class="progress progress-bt">
                                            <div class="progress-bar progress-bar-{{$x}} ctn-vs-{{$var++}}" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{$tauxEx[$j]}}%;"> <span>{{$tauxEx[$j++]}} % de réussite</span></div>
                                        </div>
                                    </li>
                                @endforeach
                                
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>

           
        </div>
    </div>
</div>
@endsection