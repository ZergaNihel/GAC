@extends('layouts.masterAnonym')
@section('script1')
<style>

/* effect-shine */
a.effect-shine:hover {
  -webkit-mask-image: linear-gradient(-75deg, rgba(0,0,0,.6) 30%, #000 50%, rgba(0,0,0,.6) 70%);
  -webkit-mask-size: 200%;
  animation: shine 2s infinite;
}

@-webkit-keyframes shine {
  from {
    -webkit-mask-position: 150%;
  }
  
  to {
    -webkit-mask-position: -50%;
  }
}
</style>

@endsection

@section('path')
    <li>
        <span class="bread-blod">Choix du semestre</span>
    </li>
@endsection

@section('content')
{{-- <div class="edu-accordion-area mg-b-15">
    <div class="container-fluid">

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
                                        <h5 style="color: grey;text-align: center"> Aucun Semestre créé</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                </div>
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
                                        <h5> {{$s->nomSem}} - {{$s->annee}}</h5>
                                    </div>
                                </div>
                                <h2>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div
                                                class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                                                <ul class="list-inline two-part-sp">
                                                    <li>
                                                        <div id="sparklinedash"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
                                            <a class="btn btn-success  widget-btn-1 btn-sm pull-right"
                                                href="{{url('Semestres/dashboard/'.$s->idSem)}}">Explorer</a></div>
                                    </div>
                                </h2>

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
                                        <h5> {{$s->nomSem}} - {{$s->annee}}</h5>
                                    </div>
                                </div>
                                <h2>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div
                                                class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                                                <ul class="list-inline two-part-sp">
                                                    <li>
                                                        <div id="sparklinedash2"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
                                            <a class="btn btn-info widget-btn-2 btn-sm pull-right"
                                                href="{{url('Semestres/dashboard/'.$s->idSem)}}">Explorer</a></div>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
                                            <button class="btn btn-info widget-btn-2 btn-sm pull-left">Archiver</button>
                                        </div>
                                    </div>
                                </h2>

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
</div> --}}


<div class="error-pagewrap ">
    <div class="error-page-int">
        <div class="text-center text-decoration">
            <h2>Choisissez un semestre</h2> <br><br>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body poss-recover">
                    @foreach($sem1 as $s )
                    <div class="container-fluid" style="text-align:center;">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                            <a class="effect-shine" style="background-color:white; color:black; "
                                href="{{url('enseignant/groupes/'.$s->idSem)}}"><h4> {{$s->nomSem}} - {{$s->annee}}</h4></a>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    @foreach($sem2 as $s )
                    <div class="container-fluid" style="text-align:center;">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                            <a class="effect-shine" style="background-color:white; color:black;"
                                href="{{url('enseignant/groupes/'.$s->idSem)}}"><h4> {{$s->nomSem}} - {{$s->annee}}</h4></a>
                        </div> 
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>   
</div>
@endsection