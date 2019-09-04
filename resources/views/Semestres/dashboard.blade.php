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
       backgroundColor: '#65b12d;',
      },
      {
        label: 'absence',
        data: [50,20,10,40,15,25],
        backgroundColor: '#D80027',
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
         <div class="income-order-visit-user-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-edu-rate">
                                      
    <h3>Nouveaux <span > </span><span class="counter" style="color: #006DF0;">{{$nouveaux}}   </span> </h3>
                                   </div>
                                     
                                    
                                
                                </div>
                                <div class="income-range">
                                    <p>{{ $semestre->nomSem }}</p>
                                    <span class="income-percentange bg-green"><span class="counter">{{$nouveaux_prc}}</span>% <i class="fa fa-bolt"></i>
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-edu-rate">
                           <h3>Endéttés <span class="counter" style="color:#933EC5;" > {{$endettes}}</span></h3>
                                    </div>
                                    
                                </div>
                                <div class="income-range order-cl">
                                    <p>{{ $semestre->nomSem }}</p>
                                    <span class="income-percentange bg-red"><span class="counter">{{$endettes_prc}}</span>% <i class="fa fa-level-up"></i>
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-edu-rate">
                <h3>Répétitifs <span class="counter" style="color: #65b12d;"> {{$rep}}</span></h3>
                                    </div>
                                    
                                </div>
                                <div class="income-range visitor-cl">
                                    <p>{{ $semestre->nomSem }}</p>
                                    <span class="income-percentange bg-blue"><span class="counter">{{$rep_prc}}</span>% <i class="fa fa-level-up"></i>
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total res-mg-t-30 dk-res-t-pro-30">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-edu-rate">
             <h3>Exclus <span class="counter" style="color: #D80027;"> {{$exclus}}</span></h3>
                                        
                                    </div>
                                    
                                </div>
                                <div class="income-range low-value-cl">
                                    <p>{{ $semestre->nomSem }}</p>
                                    <span class="income-percentange bg-purple"><span class="counter">{{$exclus_prc}}</span>% <i class="fa fa-level-down"></i>
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<input type="hidden" id="curr_sem" value="{{$semestre->idSem}}">
       
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    
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
       backgroundColor: '#C8E6C9',
      },
      {
        label: 'absence',
        data: data.abs,
        backgroundColor: '#FFCDD2',

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