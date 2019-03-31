@extends('layouts.masterEr')

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
                                                        <b>Paquet:</b> S101</span>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <span>
                                                        <br>
                                                        <b>Correcteur 1:</b> Mr Abbes</span>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <span>
                                                        <br>
                                                        <b>Correcteur 2:</b> Mme Abi-Ayad</span>
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
                                                        <input type="number" min="0" max="6" class="form-control" placeholder=" L'écart" value="" name="demo1">
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
                                                        <th data-field="Nom_Prenom" data-editable="true" title="Mr Abbes">Note1</th>
                                                        <th data-field="Date" data-editable="true" title=" Mme Abi-Ayad">Note2</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td>1</td>
                                                        <td>17009215</td>
                                                        <td>12</td>
                                                        <td>13</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>2</td>
                                                        <td>17009216</td>
                                                        <td>12</td>
                                                        <td>13</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>3</td>
                                                        <td>17009217</td>
                                                        <td>12</td>
                                                        <td>13</td>
                                                    </tr>
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
                                                        <b>Correcteur 1:</b> Mr Abbes</span>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <span>
                                                        <br>
                                                        <b>Correcteur 2:</b> Mme Abi-Ayad</span>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                        </div>
                                    </div>

                                    <div class="sparkline13-graph">
                                        <div class="datatable-dashv1-list custom-datatable-overright">
                                            <div id="toolbar2">
                                                <div class="row">
                                                    <div class="col-lg-12">
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
                                                data-show-export="true" data-toolbar="#toolbar2">
                                                <thead>
                                                    <tr>
                                                        <th data-field="state" data-checkbox="true"></th>
                                                        <th data-field="id">No</th>
                                                        <th data-field="Matricule">Code</th>
                                                        <th data-field="Nom_Prenom" data-editable="true" title="Mr Abbes">Note1</th>
                                                        <th data-field="Date" data-editable="true" title=" Mme Abi-Ayad">Note2</th>
                                                        <th data-field="Etat" data-editable="true">Note3</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td>1</td>
                                                        <td>17009215</td>
                                                        <td>12</td>
                                                        <td>13</td>
                                                        <td class="datatable-ct"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>2</td>
                                                        <td>17009216</td>
                                                        <td>12</td>
                                                        <td>13</td>
                                                        <td class="datatable-ct"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>3</td>
                                                        <td>17009217</td>
                                                        <td>12</td>
                                                        <td>13</td>
                                                        <td class="datatable-ct"></td>
                                                    </tr>
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
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <span>
                                                        <br>
                                                        <b>Paquet:</b> S101</span>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <span>
                                                        <br>
                                                        <b>Correcteur 1:</b> Mr Abbes</span>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <span>
                                                        <br>
                                                        <b>Correcteur 2:</b> Mme Abi-Ayad</span>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <div class="modal-area-button">
                                                        <a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#Valider">Valider</a>
                                                    </div>
                                                    <div id="Valider" data-keyboard="false" data-backdrop="static" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-close-area modal-close-df">
                                                                    <a class="close" data-dismiss="modal" href="#">
                                                                        <i class="fa fa-close"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h2>Voulez vous vraiment valider les notes?</h2>
                                                                    <p>(Vous ne pouvez plus les modifier aprés la validation)</p>
                                                                </div>
                                                                <div class="modal-footer warning-md">
                                                                    <a data-dismiss="modal" href="#">Annuler</a>
                                                                    <a href="#">Valider</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                        </div>
                                    </div>

                                    <div class="sparkline13-graph">
                                        <div class="datatable-dashv1-list custom-datatable-overright">
                                            <div id="toolbar3">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <select class="form-control dt-tb">
                                                            <option value="">Export Basic</option>
                                                            <option value="all">Exporter tout le tableau</option>
                                                            <option value="selected">Exporter les lignes selectionnées </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="row">
                                                            <select name="gender" class="form-control">
                                                                <option value="none" selected="" disabled="">Formule</option>
                                                                <option value="0">Min</option>
                                                                <option value="1">Max</option>
                                                                <option value="2">Moy</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true"
                                                data-show-refresh="true" data-key-events="true" data-show-toggle="true"
                                                data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                                                data-show-export="true" data-toolbar="#toolbar3">
                                                <thead>
                                                    <tr>
                                                        <th data-field="state" data-checkbox="true"></th>
                                                        <th data-field="id">No</th>
                                                        <th data-field="Matricule">Code</th>
                                                        <th data-field="Nom_Prenom" data-editable="true" title="Mr Abbes">Note1</th>
                                                        <th data-field="Date" data-editable="true" title=" Mme Abi-Ayad">Note2</th>
                                                        <th data-field="Etat" data-editable="true">Note finale</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td>1</td>
                                                        <td>17009215</td>
                                                        <td>12</td>
                                                        <td>13</td>
                                                        <td class="datatable-ct"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>2</td>
                                                        <td>17009216</td>
                                                        <td>12</td>
                                                        <td>13</td>
                                                        <td class="datatable-ct"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>3</td>
                                                        <td>17009217</td>
                                                        <td>12</td>
                                                        <td>13</td>
                                                        <td class="datatable-ct"></td>
                                                    </tr>
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
</div>
@endsection