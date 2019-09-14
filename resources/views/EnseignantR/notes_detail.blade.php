@extends('layouts.masterEr')

@section('script1')
<!-- modals jquery
    ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
            $(window).resize(function(){     
        
            if ($('header').width() <= 500 ){
        
                $('button[name=toggle]').click();
            }
        
            
        
            });
    </script>
@endsection

@section('path')
    <li>
        <span class="bread-blod">Détail paquet {{$paquet->salle}}</span>
    </li>
@endsection


@section('content')
<!-- Static Table Start -->
    <div class="col-lg-12">
        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <span>
                                <br>
                                <h3>Paquet: {{$paquet->salle}}</h3>  </span>
                        </div>
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
                                        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-cookie="true"
                                            data-cookie-id-table="saveId" data-show-export="true"  data-toolbar="#toolbar3">
                                            <thead>
                                                <tr>
                                                    <th data-field="state" data-checkbox="true"></th>
                                                    <th data-field="id">No</th>
                                                    <th data-field="Matricule">Matricule</th>
                                                    <th data-field="Nom_Prenom">Nom_Prenom</th>
                                                    <th data-field="Date">Date de naissance</th>
                                                    <th data-field="Etat">Etat</th>
                                                    <th data-field="Groupe">Groupe</th>
                                                    <th data-field="absences">Note Finale</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $No=1 @endphp
                                                @php $N=0 @endphp
                                                @foreach($etudiants as $etudiant)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{$No++}}</td>
                                                        <td>{{$etudiant->matricule}}</td>
                                                        <td>{{$etudiant->nom}} {{$etudiant->prenom}}</td>
                                                        <td>{{$etudiant->date_naissance}}</td>
                                                        <td>{{$etudiant->type}}</td>
                                                        <td>{{$etudiant->nomG}}</td>
                                                        <td>{{number_format($etudiant->notefinale, 2, '.', '')}}</td>
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