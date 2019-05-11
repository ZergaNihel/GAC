@extends('layouts.masterEr')

@section('path')
    <li>
        <span class="bread-blod">Présence</span>
    </li>
@endsection

@section('content')
    <!-- Static Table Start -->
    <div class="col-lg-12">
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span> <br> <b>Section:</b> </span></div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span> <br> <b>Salle:</b> </span></div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span> <br> <i class="fa fa-calendar"></i> {{$abs[0]->date}} </span></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="sparkline13-graph">
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
                                                <th data-field="Matricule" data-editable="true">Matricule</th>
                                                <th data-field="Nom_Prenom" data-editable="true">Nom_Prenom</th>
                                                <th data-field="Date" data-editable="true">Date de naissance</th>
                                                <th data-field="Etat" data-editable="true">Etat</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodytablePopup">
                                            @php $No=1 @endphp
                                            @foreach($abs as $abs)
                                            <tr id="">
                                                <td></td>
                                                <td>{{$No++}}</td>
                                                <td>{{$abs->matricule}}</td>
                                                <td>{{$abs->nom}} {{$abs->prenom}}</td>
                                                <td>{{$abs->date_naissance}}</td>
                                                <td>{{$abs->type}}</td>
                                                <td>
                                                    <div class="btn-group btn-custom-groups btn-custom-groups-one">
                                                        <div class="row" style="width:90px;">
                                                            <div class="col-lg-5">
                                                                <button type="button" name="present" id=""  class="pd-setting-ed" @if($abs->etat==1) style="background-color:green;" @endif><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i></button>
                                                            </div>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="col-lg-3">
                                                                <button type="button" name="absent" id=""   class="pd-setting-ed" @if($abs->etat==0) style="background-color:red;" @endif><i class="fa fa-times edu-danger-error" aria-hidden="true"></i></button>
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
@endsection