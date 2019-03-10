@extends('layouts.masterEr')

@section('path')
    <li>
        <span class="bread-blod">Présence</span>
    </li>
@endsection

@section('content')
    <!-- Static Table Start -->
    <div class="col-lg-12">
        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
            <ul id="myTabedu1" class="tab-review-design">
                <li class="active"><a href="#description">Présence</a></li>
                <li><a href="#justification">Justification</a></li>
                <li><a href="#exclus"> Liste des exclus</a></li>
                <li><a href="#historique">Historique</a></li>
            </ul>
            <div id="myTabContent" class="tab-content custom-product-edit">
                <div class="product-tab-list tab-pane fade active in" id="description">
                    <!-- Static Table Start -->
                    <div class="data-table-area mg-b-15">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="sparkline13-list">
                                        <div class="sparkline13-hd">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span> <br> <b>Section:</b> B</span></div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span> <br> <b>Salle:</b> 007</span></div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <div class="sparkline16-graph">
                                                            <div class="date-picker-inner">
                                                                <div class="form-group data-custon-pick" id="data_2">
                                                                    <div class="input-group date">
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                        <input type="text" class="form-control" value="08/09/2017">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <br><br>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <div class="advanced-form-area mg-b-15">
                                                            <select data-placeholder="Type..." class="chosen-select" tabindex="-1">
                                                                <option value="">Type</option>
                                                                <option value="">TD</option>
                                                                <option value="">TP</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <div class="advanced-form-area mg-b-15">
                                                            <select data-placeholder="Module..." class="chosen-select" tabindex="-1">
                                                                    <option value="">Module</option>
                                                                    <option value="">Algorithmique</option>
                                                                    <option value="">Analyse</option>
                                                                    <option value="">Algèbre</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <div class="advanced-form-area mg-b-15">
                                                            <select data-placeholder="Groupe..." class="chosen-select" tabindex="-1">
                                                                    <option value="">Groupe</option>
                                                                    <option value="">A1</option>
                                                                    <option value="">A2</option>
                                                                    <option value="">A3</option>
                                                            </select>
                                                        </div>
                                                    </div>
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
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td>1</td>
                                                            <td>17009215</td>
                                                            <td>Kalfat Hind</td>
                                                            <td>03/03/1998</td>
                                                            <td class="datatable-ct">N</td>
                                                            <td class="datatable-ct">
                                                                <div class="btn-group btn-custom-groups btn-custom-groups-one">
                                                                        <button type="button" id="pr" onclick="presence(1);" class="pd-setting-ed"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i></button>
                                                                        <button type="button" id="abs" onclick="presence(0);" class="pd-setting-ed"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i></button>
                                                                </div> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>2</td>
                                                            <td>17009216</td>
                                                            <td>Bachiri Wahiba</td>
                                                            <td>27/04/1997</td>
                                                            <td class="datatable-ct">N</td>
                                                            <td class="datatable-ct">
                                                                <div class="btn-group btn-custom-groups btn-custom-groups-one setting-panel-area">
                                                                        <button type="button" id="pr" onclick="presence(1);" class="pd-setting-ed" ><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i></button>
                                                                        <button type="button" id="abs" onclick="presence(0);" class="pd-setting-ed"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i></button>
                                                                        
                                                                </div> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>3</td>
                                                            <td>17009217</td>
                                                            <td>Zerga Nihel</td>
                                                            <td>26/02/1998</td>
                                                            <td class="datatable-ct">N</td>
                                                            <td>
                                                                <div class="btn-group btn-custom-groups btn-custom-groups-one">
                                                                        <button type="button" id="pr" onclick="presence(1);" class="pd-setting-ed" ><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i></button>
                                                                        <button type="button" id="abs" onclick="presence(0);" class="pd-setting-ed" ><i class="fa fa-times edu-danger-error" aria-hidden="true"></i></button>
                                                                </div> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>4</td>
                                                            <td>17009218</td>
                                                            <td>kyum@frok.com</td>
                                                            <td>+8801962066547</td>
                                                            <td class="datatable-ct">R </td>
                                                            <td class="datatable-ct"> 
                                                                <div class="btn-group btn-custom-groups btn-custom-groups-one">
                                                                        <button type="button" class="pd-setting-ed" ><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i></button>
                                                                        <button type="button" class="pd-setting-ed"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i></button>
                                                                </div> 
                                                            </td>
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

                <div class="product-tab-list tab-pane fade" id="justification">
                    <!-- Static Table Start -->
                    <div class="data-table-area mg-b-15">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="sparkline13-list">
                                            
                                            <div class="sparkline13-graph">
                                                <div class="datatable-dashv1-list custom-datatable-overright">
                                                    <div id="toolbar2">
                                                        <select class="form-control dt-tb">
                                                            <option value="">Export Basic</option>
                                                            <option value="all">Exporter tout le tableau</option>
                                                            <option value="selected">Exporter les lignes selectionnées </option>
                                                        </select>
                                                    </div>
                                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                                        data-cookie-id-table="saveId" data-show-export="true"  data-toolbar="#toolbar2">
                                                        <thead>
                                                            <tr>
                                                                <th data-field="state" data-checkbox="true"></th>
                                                                <th data-field="id">No</th>
                                                                <th data-field="Matricule" data-editable="true">Matricule</th>
                                                                <th data-field="Nom_Prenom" data-editable="true">Nom_Prenom</th>
                                                                <th data-field="Date" data-editable="true">Date de naissance</th>
                                                                <th data-field="Etat" data-editable="true">Etat</th>
                                                                <th data-field="absences">date d'absence</th>
                                                                <th data-field="action">Justification</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td>1</td>
                                                                <td>17009215</td>
                                                                <td>Kalfat Hind</td>
                                                                <td>03/03/1998</td>
                                                                <td class="datatable-ct">N</td>
                                                                <td class="datatable-ct">03/10/2019</td>
                                                                <td class="datatable-ct">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="button-ap-list responsive-btn">
                                                                                <div class="button-style-three">
                                                                                    <button type="button" class="btn btn-custon-rounded-four btn-primary" data-toggle="modal" data-target="#detail"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i> Détail</button>
                                                                                    <button type="button" class="btn btn-custon-rounded-three btn-success"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Accepter</button>
                                                                                    <button type="button" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Refuser</button>
                                                                                </div>
                                                                            </div>
                                                                    </div> 
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>2</td>
                                                                <td>17009216</td>
                                                                <td>Bachiri Wahiba</td>
                                                                <td>27/04/1997</td>
                                                                <td class="datatable-ct">N</td>
                                                                <td class="datatable-ct">03/11/2019</td>
                                                                <td class="datatable-ct">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="button-ap-list responsive-btn">
                                                                                <div class="button-style-three">
                                                                                    <button type="button" class="btn btn-custon-rounded-four btn-primary" data-toggle="modal" data-target="#detail"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i> Détail</button>
                                                                                    <button type="button" class="btn btn-custon-rounded-three btn-success"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Accepter</button>
                                                                                    <button type="button" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Refuser</button>
                                                                                </div>
                                                                            </div>
                                                                    </div> 
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>3</td>
                                                                <td>17009217</td>
                                                                <td>Zerga Nihel</td>
                                                                <td>26/02/1998</td>
                                                                <td class="datatable-ct">N</td>
                                                                <td class="datatable-ct">07/10/2019</td>
                                                                <td>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="button-ap-list responsive-btn">
                                                                                <div class="button-style-three">
                                                                                    <button type="button" class="btn btn-custon-rounded-four btn-primary" data-toggle="modal" data-target="#detail"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i> Détail</button>
                                                                                    <button type="button" class="btn btn-custon-rounded-three btn-success"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Accepter</button>
                                                                                    <button type="button" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Refuser</button>
                                                                                </div>
                                                                            </div>
                                                                    </div> 
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>4</td>
                                                                <td>17009218</td>
                                                                <td>kyum@frok.com</td>
                                                                <td>+8801962066547</td>
                                                                <td class="datatable-ct">R </td>
                                                                <td class="datatable-ct">3</td>
                                                                <td class="datatable-ct"> 
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="button-ap-list responsive-btn">
                                                                                <div class="button-style-three">
                                                                                    <button type="button" class="btn btn-custon-rounded-four btn-primary" data-toggle="modal" data-target="#detail"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i> Détail</button>
                                                                                    <button type="button" class="btn btn-custon-rounded-three btn-success"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Accepter</button>
                                                                                    <button type="button" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Refuser</button>
                                                                                </div>
                                                                            </div>
                                                                    </div> 
                                                                </td>
                                                            </tr>
                                                            <div id="detail" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-close-area modal-close-df">
                                                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="pdf-viewer-area pdf-single-pro">
                                                                                <a class="media" href="pdf/mamunur.pdf"></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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

                <div class="product-tab-list tab-pane fade" id="exclus">
                    <!-- Static Table Start -->
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
                                                            <th data-field="Matricule" data-editable="true">Matricule</th>
                                                            <th data-field="Nom_Prenom" data-editable="true">Nom_Prenom</th>
                                                            <th data-field="Date" data-editable="true">Date de naissance</th>
                                                            <th data-field="Etat" data-editable="true">Etat</th>
                                                            <th data-field="absences">Nombre d'absences</th>
                                                            <th data-field="action">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td>1</td>
                                                            <td>17009215</td>
                                                            <td>Kalfat Hind</td>
                                                            <td>03/03/1998</td>
                                                            <td class="datatable-ct">N</td>
                                                            <td class="datatable-ct">3</td>
                                                            <td class="datatable-ct">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                        <div class="button-ap-list responsive-btn">
                                                                            <div class="button-style-three">
                                                                                <button type="button" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Exclure</button>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>2</td>
                                                            <td>17009216</td>
                                                            <td>Bachiri Wahiba</td>
                                                            <td>27/04/1997</td>
                                                            <td class="datatable-ct">N</td>
                                                            <td class="datatable-ct">5</td>
                                                            <td class="datatable-ct">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="button-ap-list responsive-btn">
                                                                        <div class="button-style-three">
                                                                            <button type="button" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Exclure</button>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>3</td>
                                                            <td>17009217</td>
                                                            <td>Zerga Nihel</td>
                                                            <td>26/02/1998</td>
                                                            <td class="datatable-ct">N</td>
                                                            <td class="datatable-ct">8</td>
                                                            <td>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="button-ap-list responsive-btn">
                                                                        <div class="button-style-three">
                                                                            <button type="button" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Exclure</button>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>4</td>
                                                            <td>17009218</td>
                                                            <td>kyum@frok.com</td>
                                                            <td>+8801962066547</td>
                                                            <td class="datatable-ct">R </td>
                                                            <td class="datatable-ct">3</td>
                                                            <td class="datatable-ct"> 
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="button-ap-list responsive-btn">
                                                                        <div class="button-style-three">
                                                                            <button type="button" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Exclure</button>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </td>
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

                <div class="product-tab-list tab-pane fade" id="historique">
                    <div class="calender-area mg-b-15">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="calender-inner">
                                        <div id='calendar'></div>
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