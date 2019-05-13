@extends('layouts.masterEr')

@section('script1')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- modals jquery
============================================ -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).on("change",".txt",function(){

        var btn_id = $(this).attr("id");
        var i=btn_id.substring(4,btn_id.length);
        $.ajax({
            type:'get',
            data:'code=' + $('#code'+i).val() + '&note=' + $('#note'+i).val(),
            url:'/attribuer/note/finale',
            success:function(data){
                $('#Nfinale'+data.code).text(data.notefinale);
            }
        });
        });

    $(document).on("change","#ecart",function(){
        var data = $('#formEcart').serialize();
        var ecart=$('#ecart').val();
        $('#ecartFormule').val(ecart);
        $.ajax({
            type:'get',
            data:data,
            url:'/choix/ecart',
            success:function(data){
                $('.rowcorr').remove();
                for (var i = 0; i < data.length; i++)
                {
                    $('.Nfinale').text(' ');
                    $('#tablecorr').append(
                        "<tr class='rowcorr'>"+
                            "<td>"+ (i+1) +"</td>"+
                            "<td>"+ data[i].code +"</td>"+
                            "<td>"+ data[i].note1 +"</td>"+
                            "<td>"+ data[i].note2 +"</td>"+
                            "<form id='formN"+data[i].id+"'>"+
                                "<td style='text-align:center;width:80px;'>"+
                                    "<input type='hidden' id='code"+data[i].id+"' name='code' value='"+data[i].id+"'>"+
                                    "<input class='txt w3-input' type='text' name='note' id='note"+data[i].id+"' value=''/>"+
                                "</td>"+
                            "</form>"+
                        "</tr>"
                    );
                }             
                    
            }
        });
    });

    $(document).on("change","#formule",function(){
        var data = $('#formFormule').serialize();
        $.ajax({
            type:'get',
            data:data,
            url:'/choix/formule',
            success:function(data){   
                for (var i = 0; i < data.length; i++)
                { 
                    $('#Nfinale'+data[i].code).text(data[i].notefinale);
                }
            }
        });
    });

</script>
@endsection

@section('path')
    <li>
        <span class="bread-blod">Groupe</span>
    </li>
@endsection

@section('content')
 <!-- Static Table Start -->
 <div class="col-lg-12">
    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
        <ul id="myTabedu1" class="tab-review-design">
            <li class="active">
                <a href="#Comparaison">Comparaison</a>
            </li>
            <li>
                <a href="#TroisièmeC">Troisième correction</a>
            </li>
            <li>
                <a href="#Nfinale"> Note finale</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content custom-product-edit">
            <div class="product-tab-list tab-pane fade active in" id="Comparaison">
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
                                                        <b>Paquet:</b> {{$paquet->salle}} </span>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <span>
                                                        <br>
                                                        <b>Correcteur 1:</b> {{$correcteurs[0]->nom}} {{$correcteurs[0]->prenom}} </span>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <span>
                                                        <br>
                                                        <b>Correcteur 2:</b> {{$correcteurs[1]->nom}} {{$correcteurs[1]->prenom}}</span>
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
                                                    <div class="col-lg-4">
                                                        <form id="formEcart">
                                                            <input type="hidden" name="paquet" id="paquet" value="{{$paquet->idPaq}}">
                                                            <input type="hidden" name="corr1" id="corr1" value="{{$correcteurs[0]->idEns}}">
                                                            <input type="hidden" name="corr2" id="corr2" value="{{$correcteurs[1]->idEns}}">
                                                            <input type="number" min="0" max="6" class="form-control" placeholder=" L'écart" value="" name="ecart" id="ecart">
                                                        </form>
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
                                                        <th data-field="Matricule">Code</th>
                                                        <th data-field="Nom_Prenom" title="{{$correcteurs[0]->nom}} {{$correcteurs[0]->prenom}}">Note1</th>
                                                        <th data-field="Date" title="{{$correcteurs[1]->nom}} {{$correcteurs[1]->prenom}}">Note2</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < count($codes); $i++)
                                                        <tr id="idRow{{$codes[$i]}}">
                                                            <td></td>
                                                            <td>{{$i+1}}</td>
                                                            <td>{{$codes[$i]}}</td>
                                                            <td>@if(count($notes1)>$i) {{$notes1[$i]}} @endif</td>
                                                            <td>@if(count($notes2)>$i) {{$notes2[$i]}} @endif</td>
                                                        </tr>
                                                    @endfor
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
            <div class="product-tab-list tab-pane fade " id="TroisièmeC">
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
                                                        <b>Paquet:</b> S101</span>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <span>
                                                        <br>
                                                        <b>Correcteur 1:</b> {{$correcteurs[0]->nom}} {{$correcteurs[0]->prenom}}</span>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <span>
                                                        <br>
                                                        <b>Correcteur 2:</b> {{$correcteurs[1]->nom}} {{$correcteurs[1]->prenom}}</span>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                        </div>
                                    </div>

                                    <div class="static-table-list">
                                        <table  class="table">
                                            <thead>
                                                <tr>
                                                    <th data-field="id">No</th>
                                                    <th data-field="Code">Code</th>
                                                    <th data-field="Note1" data-editable="true" title="{{$correcteurs[0]->nom}} {{$correcteurs[0]->prenom}}">Note1</th>
                                                    <th data-field="Note2" data-editable="true" title="{{$correcteurs[1]->nom}} {{$correcteurs[1]->prenom}}">Note2</th>
                                                    <th data-field="Note3" data-editable="true">Note3</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablecorr">
                                                    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-tab-list tab-pane fade " id="Nfinale">
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
                                                        <b>Paquet:</b> S101</span>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <span>
                                                        <br>
                                                        <b>Correcteur 1:</b> {{$correcteurs[0]->nom}} {{$correcteurs[0]->prenom}}</span>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <span>
                                                        <br>
                                                        <b>Correcteur 2:</b> {{$correcteurs[1]->nom}} {{$correcteurs[1]->prenom}}</span>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-lg-4">
                                            <form id="formFormule">
                                                <input type="hidden" id="ecartFormule" name="ecartFormule" value="0">
                                                <input type="hidden" name="paquet" id="paquet" value="{{$paquet->idPaq}}">
                                                <input type="hidden" name="corr1" id="corr1" value="{{$correcteurs[0]->idEns}}">
                                                <input type="hidden" name="corr2" id="corr2" value="{{$correcteurs[1]->idEns}}">
                                                <select name="formule" id="formule" class="form-control">
                                                    <option value="none" selected="" disabled="">Formule</option>
                                                    <option value="0">Min</option>
                                                    <option value="1">Max</option>
                                                    <option value="2">Moy</option>
                                                </select>
                                            </form>
                                        </div>
                                        <div class="col-lg-6">
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="modal-area-button">
                                                <a class="Warning Warning-color" href="#" data-toggle="modal" data-target="#Valider">Valider</a>
                                            </div>
                                            <div id="Valider" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-close-area modal-close-df">
                                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h3>Voulez-vous vraiment valider les notes?</h3>
                                                            <p>(Vous ne pouvez plus les modifier aprés la validation)</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a data-dismiss="modal" href="#">Annuler</a>
                                                            <a href="#">Valider</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="static-table-list">
                                            <table  class="table">
                                                <thead>
                                                    <tr>
                                                        <th data-field="id">No</th>
                                                        <th data-field="Matricule">Code</th>
                                                        <th data-field="Nom_Prenom" title="{{$correcteurs[0]->nom}} {{$correcteurs[0]->prenom}}">Note1</th>
                                                        <th data-field="Date" title="{{$correcteurs[1]->nom}} {{$correcteurs[1]->prenom}}">Note2</th>
                                                        <th data-field="Etat">Note finale</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < count($codes); $i++)
                                                        <tr>
                                                            <td>{{$i+1}}</td>
                                                            <td>{{$codes[$i]}}</td>
                                                            <td>@if(count($notes1)>$i) {{$notes1[$i]}} @endif</td>
                                                            <td>@if(count($notes2)>$i) {{$notes2[$i]}} @endif</td>
                                                            <td id="Nfinale{{$codes[$i]}}" class="Nfinale"> </td>
                                                        </tr>
                                                    @endfor   
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
</div>
@endsection