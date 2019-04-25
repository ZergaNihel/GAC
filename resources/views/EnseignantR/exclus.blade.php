@extends('layouts.masterEr')

@section('script1')
<!-- modals jquery
    ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      $(document).on("click",".btn-danger",function(){
        var btn_id = $(this).attr("id");
        var i=btn_id.substring(6,btn_id.length);
        alert(i);
        alert(btn_id);
        var data = $('#exclusform'+i).serialize();
        $.ajax({
                type:'post',
                data:data,
                url:'exclure/etudiant',
                success:function(data){
                     $('#row'+i).remove();
                }
        });

       });
    </script>
@endsection

@section('path')
    <li>
        <span class="bread-blod">Présence</span>
    </li>
@endsection

@section('content')
    <!-- Static Table Start -->
    <div class="col-lg-12">
        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">

                    <div class="data-table-area mg-b-15">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="sparkline13-list">
                                        
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <div id="toolbar3">
                                                    <select class="form-control dt-tb">
                                                        <option value="">Export Basic</option>
                                                        <option value="all">Exporter tout le tableau</option>
                                                        <option value="selected">Exporter les lignes selectionnées </option>
                                                    </select>
                                                </div>
                                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                                    data-cookie-id-table="saveId" data-show-export="true"  data-toolbar="#toolbar3">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="state" data-checkbox="true"></th>
                                                            <th data-field="id">No</th>
                                                            <th data-field="Matricule">Matricule</th>
                                                            <th data-field="Nom_Prenom">Nom_Prenom</th>
                                                            <th data-field="Date">Date de naissance</th>
                                                            <th data-field="Etat">Etat</th>
                                                            <th data-field="absences">Nombre d'absences</th>
                                                            <th data-field="action">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $N=0 @endphp
                                                        @foreach($exclus as $e)
                                                        <tr>
                                                            <td></td>
                                                            <td>1</td>
                                                            <td> {{$e[0]->matricule}} </td>
                                                            <td>{{$e[0]->nom}} {{$e[0]->prenom}}</td>
                                                            <td>{{$e[0]->date_naissance}}</td>
                                                            <td class="datatable-ct">{{$e[0]->type}}</td>
                                                            <td class="datatable-ct">{{$abs[$N++]}}</td>
                                                            <td class="datatable-ct">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                        <div class="button-ap-list responsive-btn">
                                                                            <div class="button-style-three">
                                                                                <form id="exclusform{{$e[0]->idEtu}}">
                                                                                    <input type="hidden" id="etudiant" name="etudiant" value="{{$e[0]->idEtu}}">
                                                                                    <button type="button" id="exclus{{$e[0]->idEtu}}" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Exclure</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </td>
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