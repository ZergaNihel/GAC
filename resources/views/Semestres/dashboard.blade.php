@extends('layouts.header')

@section('title','Dashboard')
@section('js')
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js')}}"></script>
<script >
   var ctx = document.getElementById('chart');

var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["algo","fre","jfh","algo","fre","jfh"],
    datasets: [
      {
        label: 'présence',
        data: [30,200,100,400,150,250],
       backgroundColor: '#D6E9C6',
      },
      {
        label: 'absence',
        data: [50,20,10,40,15,25],
        backgroundColor: '#FAEBCC',
      },
    
  },
  options: {
    scales: {
      xAxes: [{ stacked: true }],
      yAxes: [{ stacked: true }]
    }
  }
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
                                            <li><a href="#">Semestres</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">{{ $semestre->nomSem }} / Dashboard</span>
                                            </li>
                                        </ul>
                                        @endsection
                                         @section('content')

<input type="hidden" id="curr_sem" value="{{$semestre->idSem}}">
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                               <a href=""><h5>Nombre d'Absences </h5></a> 
                                <h2><span class="counter">{{$abs}}</span> <span class="tuition-fees">semestre actuel</span></h2>
                                <span class="text-success">20%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Enseignants</h5>
                                <h2><span class="counter">{{$ens}}</span> <span class="tuition-fees">semestre actuel</span></h2>
                                <span class="text-danger">30%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
         
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                              <a href=""> <h5>Etudiants Exclus</h5></a> 
                                <h2><span class="counter">{{$exclus}}</span> <span class="tuition-fees">semestre actuel</span></h2>
                                <span class="text-inverse">10%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">230% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                             <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title"> Etudiants nouveax</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">{{$nouveaux}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Nombre d'absence/présence par module</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp graph-rp-dl">
                                            <p>{{$semestre->nomSem}} - {{$semestre->annee}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
               
                            <br>
                            <canvas id="chart"></canvas>
                        </div>
                        
                       
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                   
               
                    
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Etudiants Endettés</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right graph-three-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-info">{{$endettes}}</span></li>
                            </ul>
                        </div>
                        <div class="white-box analytics-info-cs table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Etudiants Répétitifs</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right graph-four-ctn"><i class="fa fa-level-down" aria-hidden="true"></i> <span class="text-danger"><span class="counter">{{$rep}}</span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     



<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js" ></script>
<script >
    $(document).ready(function(){ 
        var semestre = $("#curr_sem").val();
        alert(semestre);
        $.ajax({
  type: "get",
  url: "{{url('statdash')}}/"+semestre+"/" ,
  success: function(data){
 var ctx = document.getElementById('chart');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: data.modules,
    datasets: [
      {
        label: 'présence',
        data: data.pre,
       backgroundColor: '#006DF0',
      },
      {
        label: 'absence',
        data: data.abs,
        backgroundColor: '#933EC5',

      }]
    
  },
  options: {
    scales: {
      xAxes: [{ stacked: true }],
      yAxes: [{ stacked: true }]
    }
  }
});
}
});
});
</script>

@endsection