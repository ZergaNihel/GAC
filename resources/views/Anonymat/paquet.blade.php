@extends('layouts.masterAnonym')

@section('path')
    <li>
        <span class="bread-blod">/Détail paquet</span>
    </li>
@endsection

{{-- @section('logo')
<div class="col-lg-2 mg-tb-15">
    <a href="{{url('anonymat/paquets')}}"><img class="main-logo" src="{{asset('img/logo/logosn.png')}}" alt=""  height="40px" width="30px"/></a>
</div> 
@endsection --}}

@section('content')
<div class="static-table-area"  >
    <div class="container-fluid" style="width:1200px; left:150px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline8-list">
                    <div class="sparkline8-graph">
                        <a href="{{url('anonymat/paquets')}}"><i class="fa fa-arrow-left"></i>  choisir un autre paquet</a>
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <select class="form-control dt-tb">
                                    <option value="">Export Basic</option>
                                    <option value="all">Exporter tout le tableau</option>
                                    <option value="selected">Exporter les lignes selectionnées </option>
                                </select>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true"  data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">No</th>
                                        <th data-field="Code">Code</th>
                                        <th data-field="Matricule">Matricule</th>
                                        <th data-field="Nom_Prenom">Nom_Prenom</th>
                                        <th data-field="Date">Date de naissance</th>
                                        <th data-field="Etat">Etat</th>
                                    </tr>
                                </thead>
                                <tbody id="bodytablePopup">
                                    @php $No=1 @endphp
                                    @foreach($etudiants as $etudiant)
                                    <tr>
                                        <td></td>
                                        <td>{{$No++}}</td>
                                        <td>{{$etudiant->code}}</td>
                                        <td>{{$etudiant->matricule}}</td>
                                        <td>{{$etudiant->nom}} {{$etudiant->prenom}}</td>
                                        <td>{{$etudiant->date_naissance}}</td>
                                        <td class="datatable-ct">{{$etudiant->type}}</td>
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
<br><br>
@endsection