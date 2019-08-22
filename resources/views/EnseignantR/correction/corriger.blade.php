@extends('layouts.masterEr')

@section('script1')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- modals jquery
============================================ -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

    // $('#note').change(function(){
    //     alert("bjr");
    // });

    $(document).on("change",".txt",function(){

        var btn_id = $(this).attr("id");
        var i=btn_id.substring(4,btn_id.length);
        $.ajax({
            type:'get',
            data:'code=' + $('#code'+i).val() + '&note=' + $('#note'+i).val(),
            url:'/attribuer/note',
            success:function(data){
            }
        });
    });

    

</script>
@endsection

@section('path')
    <li>
        <span class="bread-blod">Correction/Paquet</span>
    </li>
@endsection
@section('content')
 <!-- Static Table Start -->
 <div class="col-lg-12">
    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="">
                                    <div class="row container-fluid">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span>
                                                <br>
                                                <h3>Paquet: {{$paquet->salle}}</h3>  </span>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mg-t-30">
                                            <form action="/valider/correction" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="semestre" value="{{$semestre->idSem}}">
                                                <input type="hidden" name="auth" value="{{Auth::user()->enseignant->idEns}}">
                                                <input type="hidden" name="paquetens" value="{{$paquet->idPaq}}">
                                                <button type="submit" class="btn btn-primary mg-tb-10 pull-right" id="valider" title="Valider"> valider </button>
                                            </form>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>

                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar1">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <select class="form-control dt-tb">
                                                    <option value="">Export Basic</option>
                                                    <option value="all">Exporter tout le tableau</option>
                                                    <option value="selected">Exporter les lignes selectionnées </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true"
                                        data-show-refresh="true" data-key-events="true" data-show-toggle="true"
                                        data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                                        data-show-export="true" data-toolbar="#toolbar1  ">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">No</th>
                                                <th>Code</th>
                                                <th data-field="note">Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $No=1 @endphp
                                            @foreach($codes as $code)
                                            <tr>
                                                <td></td>
                                                <td>{{$No++}}</td>
                                                <td> {{$code->code}}</td>
                                                <form id="formN{{$code->idC}}" >
                                                    <td class="pull-center">
                                                        <input type="hidden" id="code{{$code->idC}}" name="code" value="{{$code->idC}}">
                                                        <input class="txt w3-input" type="text" name="note" id="note{{$code->idC}}" value="@foreach(App\Correction::where('code_etu','=',$code->idC)->where('correcteur','=',Auth::user()->enseignant->idEns)->get() as $c){{$c->note}}@endforeach" style="width:50px; text-align:center;"/>
                                                    </td>
                                               </form>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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