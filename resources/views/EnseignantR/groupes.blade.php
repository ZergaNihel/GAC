@extends('layouts.masterEr')

@section('script1')
<!-- modals jquery
    ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="">

        $(document).ready(function(){
            $(document).on('click','#deleteBtn',function(){
            alert("hhh");
            $.ajax({
                type: "POST",
                data: $('#deleteForm').serialize(),                             // to submit fields at once
                url: $('#deleteForm').attr('action'),                        // use the form's action url
                success: function(data) {
                        $("#delete").modal("hide");
                        alert(data.success);
                        $("#panel"+data.id+"").remove();
                    }
                });
            });

    
     if( $("#EditError").val() == 1){
         $("#edit").modal("show");
        }

var groupe;
  $("input:hidden.groupe").each(function() {
      // alert( $(this).val());
   groupe = $(this).val();
$.ajax({
  type: "get",
  url: "{{url('enseignant/statGroupe')}}/"+groupe+"/" ,
  success: function(data){
   //alert("groupe = "+data.id+"nbr = "+data.nbr);
     $(".nbr"+data.id+"").append(data.nbr);
    var ctx = document.getElementById("piechart"+data.id+"");
    var piechart = new Chart(ctx, {
        type: 'pie',
        data: {
        labels: ["Endetté", "Répétitif", "Nouveau"],
            datasets: [{
                label: 'pie Chart',
                backgroundColor: [
                    
                    '#65b12d',
                    '#D80027',
                    '#ffde0a'
                ],
                data: [data.endette,data.repetitif, data.nouveau]
            }]
        },
        options: {
            responsive: true
        }
    });
  
  }
});

 });
          });
    </script>
@endsection

@section('path')
    <li>
        <span class="bread-blod">Groupes</span>
    </li>
@endsection

@section('content')
{{-- <!-- accordion start-->
<div class="edu-accordion-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            @if($groupes1)
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="admin-pro-accordion-wrap shadow-inner responsive-mg-b-30">

                    <div class="alert-title">
                        <h2>{{$module1}}</h2>
                    </div>
                    @foreach($groupes1 as $groupe)
                    <div class="panel-group edu-custon-design" id="accordion{{$groupe->id_groupe}}">
                        <div class="panel panel-default">                           
                            <div class="panel-heading accordion-head">
                                <div class="row">
                                    <div class="col-lg-11">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion{{$groupe->id_groupe}}" href="#collapse{{$groupe->id_groupe}}"> Groupe: {{$groupe->id_groupe}} </a>
                                    </h4></div>
                                    <div class="col-lg-1">
                                        <a href="" data-toggle="modal" data-target="#add"><i class="fa fa-user-plus" style="color:white;"></i></a>
                                        <div id="add" class="modal modal-edu-general modal-zoomInDown fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-close-area modal-close-df">
                                                        <a class="close" data-dismiss="modal" href="#">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="modal-login-form-inner">
    
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="basic-login-inner modal-basic-inner">
                                                                        <h3>Nouveau Etudiant</h3>
                                                                        <p>Ajouter un nouveau étudiant</p>
                                                                        <form action="#">
                                                                            <div class="form-group-inner">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <label class="login2">Nom</label>
                                                                                    </div>
                                                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                        <input type="text" class="form-control" placeholder="Enter Email" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group-inner">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <label class="login2">Prénom</label>
                                                                                    </div>
                                                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                        <input type="text" class="form-control" placeholder="password" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group-inner">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <label class="login2">Matricule</label>
                                                                                    </div>
                                                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                        <input type="text" class="form-control" placeholder="password" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group-inner">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <label class="login2">email</label>
                                                                                    </div>
                                                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                        <input type="email" class="form-control" placeholder="password" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group-inner">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <label class="login2">Date de naissance</label>
                                                                                    </div>
                                                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                        <div class="sparkline16-graph">
                                                                                            <div class="date-picker-inner">
                                                                                                <div class="form-group data-custon-pick" id="data_1">
                                                                                                    <div class="input-group date">
                                                                                                        <span class="input-group-addon">
                                                                                                            <i class="fa fa-calendar"></i>
                                                                                                        </span>
                                                                                                        <input type="text" class="form-control" value="10/04/2017">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group-inner">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                                        <label class="login2">Type </label>
                                                                                    </div>
                                                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                                                        <div class="bt-df-checkbox pull-left">
    
                                                                                            <script type="text/javascript">
                                                                                                function fct1() {
                                                                                                    document.getElementById('module').style.display = "none";
                                                                                                }
                                                                                                function fct2() {
    
                                                                                                    document.getElementById('module').style.display = "";
                                                                                                }
                                                                                            </script>
    
                                                                                            <div class="row">
                                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                    <div>
                                                                                                        <label>
                                                                                                            <input type="radio" value="1" name="a" onchange="fct1();" id="n">
                                                                                                            <i></i> Nouveau
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                    <div>
                                                                                                        <label>
                                                                                                            <input type="radio" value="2" name="a" onchange="fct2();" id="r">
                                                                                                            <i></i> Répétitif</label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                    <div>
                                                                                                        <label>
                                                                                                            <input type="radio" value="3" name="a" onchange="fct2();" id="e">
                                                                                                            <i></i> Endétté</label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
    
    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
    
                                                                            </div>
    
    
    
    
    
    
                                                                            <div class="form-group-inner" style="display: none;" id="module">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                        <label class="login2">Modules</label>
                                                                                    </div>
                                                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                        <div class="chosen-select-single">
    
                                                                                            <select data-placeholder="Choose a Country..." class="chosen-select" multiple="" tabindex="-1">
                                                                                                <option value="">Select</option>
    
                                                                                                <option value="Monaco">Monaco</option>
                                                                                                <option value="Mongolia">Mongolia</option>
                                                                                                <option value="Montenegro">Montenegro</option>
                                                                                                <option value="Montserrat">Montserrat</option>
                                                                                                <option value="Morocco">Morocco</option>
    
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="login-btn-inner">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
    
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                        <div class="login-horizental">
                                                                                            <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Sign In</button>
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
                                    </div>
                                </div>
                            </div>

                            <div id="collapse{{$groupe->id_groupe}}" class="panel-collapse panel-ic collapse">
                                <div class="panel-body admin-panel-content animated bounce">
                                    <!-- Charts Start-->
                                        <div class="charts-area mg-b-15">
                                            <div class="charts-single-pro responsive-mg-b-30">
                                                <div class="alert-title">
                                                    <h2>{{$groupe->id_groupe}}</h2>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @if($groupes2)
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="admin-pro-accordion-wrap shadow-inner responsive-mg-b-30">
                    <div class="alert-title">
                        <h2>{{$module2}}</h2>
                    </div>

                    @foreach($groupes2 as $groupe)
                    <div class="panel-group edu-custon-design" id="accordion{{$groupe->id_groupe}}">
                        <div class="panel panel-default">                           
                            <div class="panel-heading accordion-head">
                                <div class="row">
                                    <div class="col-lg-11">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion{{$groupe->id_groupe}}" href="#collapse2{{$groupe->id_groupe}}"> Groupe: {{$groupe->id_groupe}} </a>
                                    </h4></div>
                                    <div class="col-lg-1">
                                        <a href="" data-toggle="modal" data-target="#add"><i class="fa fa-user-plus" style="color:white;"></i></a>
                                        <div id="add" class="modal modal-edu-general modal-zoomInDown fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-close-area modal-close-df">
                                                            <a class="close" data-dismiss="modal" 
                                                            href="#">
                                                                <i class="fa fa-close"></i>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="modal-login-form-inner">
        
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="basic-login-inner modal-basic-inner">
                                                                            <h3>Nouveau Etudiant</h3>
                                                                            <p>Ajouter un nouveau étudiant</p>
                                                                            <form action="#">
                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                            <label class="login2">Nom</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <input type="text" class="form-control" placeholder="Enter Email" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                            <label class="login2">Prénom</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <input type="text" class="form-control" placeholder="password" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                            <label class="login2">Matricule</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <input type="text" class="form-control" placeholder="password" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                            <label class="login2">email</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <input type="email" class="form-control" placeholder="password" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                            <label class="login2">Date de naissance</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <div class="sparkline16-graph">
                                                                                                <div class="date-picker-inner">
                                                                                                    <div class="form-group data-custon-pick" id="data_1">
                                                                                                        <div class="input-group date">
                                                                                                            <span class="input-group-addon">
                                                                                                                <i class="fa fa-calendar"></i>
                                                                                                            </span>
                                                                                                            <input type="text" class="form-control" value="10/04/2017">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                                            <label class="login2">Type </label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                                                            <div class="bt-df-checkbox pull-left">
        
                                                                                                <script type="text/javascript">
                                                                                                    function fct1() {
                                                                                                        document.getElementById('module').style.display = "none";
                                                                                                    }
                                                                                                    function fct2() {
        
                                                                                                        document.getElementById('module').style.display = "";
                                                                                                    }
                                                                                                </script>
        
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                        <div>
                                                                                                            <label>
                                                                                                                <input type="radio" value="1" name="a" onchange="fct1();" id="n">
                                                                                                                <i></i> Nouveau
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                        <div>
                                                                                                            <label>
                                                                                                                <input type="radio" value="2" name="a" onchange="fct2();" id="r">
                                                                                                                <i></i> Répétitif</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                        <div>
                                                                                                            <label>
                                                                                                                <input type="radio" value="3" name="a" onchange="fct2();" id="e">
                                                                                                                <i></i> Endétté</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
        
        
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
        
                                                                                </div>
        
        
        
        
        
        
                                                                                <div class="form-group-inner" style="display: none;" id="module">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                            <label class="login2">Modules</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <div class="chosen-select-single">
        
                                                                                                <select data-placeholder="Choose a Country..." class="chosen-select" multiple="" tabindex="-1">
                                                                                                    <option value="">Select</option>
        
                                                                                                    <option value="Monaco">Monaco</option>
                                                                                                    <option value="Mongolia">Mongolia</option>
                                                                                                    <option value="Montenegro">Montenegro</option>
                                                                                                    <option value="Montserrat">Montserrat</option>
                                                                                                    <option value="Morocco">Morocco</option>
        
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="login-btn-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <div class="login-horizental">
                                                                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Sign In</button>
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
                                    </div>
                                </div>
                            </div>

                            <div id="collapse2{{$groupe->id_groupe}}" class="panel-collapse panel-ic collapse">
                                <div class="panel-body admin-panel-content animated bounce">
                                    <!-- Charts Start-->
                                        <div class="charts-area mg-b-15">
                                            <div class="charts-single-pro responsive-mg-b-30">
                                                <div class="alert-title">
                                                    <h2>{{$groupe->id_groupe}}</h2>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- accordion End--> --}}
<div class="edu-accordion-area mg-b-15">
    <div class="container-fluid">
        @if($message = Session::get('succ'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>

        @endif
        <?php $var=1; ?>
        @foreach($section as $s)
        <?php $v=1; ?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="admin-pro-accordion-wrap shadow-inner responsive-mg-b-30">
                <div class="alert-title">
                    <h2>{{$s->section->nomSec}}</h2>

                </div>
                <div class="panel-group edu-custon-design" id="accordion">

                    @foreach(App\Groupe_etu::where('sem_groupe','=',$semestre->idSem)->where('sec_groupe','=',$s->sec_groupe)->select('groupe')->get()
                    as $grp)
                    <div class="panel panel-default" id="panel{{$grp->groupe1->idG}}">
                        <div class="panel-heading accordion-head">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion"href="#collapse{{$var}}"> Groupe {{$grp->groupe1->nomG}} </a>
                            </h4>
                        </div>
                        <?php if($v== 1){ ?>
                        <div id="collapse{{$var}}" class="panel-collapse panel-ic collapse in">
                            <?php }else{ ?>
                            <div id="collapse{{$var}}" class="panel-collapse panel-ic collapse">
                                <?php } ?>
                                <div class="panel-body admin-panel-content animated bounce">
                                    <div class="alert-title">
                                        <h4 class="nbr{{$grp->groupe1->idG}}">Nombre d'étudiants : </h4>
                                    </div><br>
                                    <input type="hidden" id="groupe_id" class="groupe" name="group[]"
                                        value="{{$grp->groupe}}">
                                    <div class="charts-area mg-b-15">
                                        <div class="charts-single-pro responsive-mg-b-30">
                                            <div id="pie-chart">
                                                <canvas id="piechart{{$grp->groupe1->idG}}"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <?php $var++; ?>
                        <?php $v++; ?>

                        @endforeach
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection