@extends('layouts.header')

@section('title','hitoriques')

@section('js')
@endsection

     @section('sidebar')
  
     @include('layouts.sidebarAdmin1')

     @endsection
    @section('mobileSidebar')
  
     @include('layouts.mobileSidebar1')

     @endsection

    
        @section('search')
        <ul class="breadcome-menu">
                                            <li><a href="#">Groupes</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">liste des groupes</span>
                                            </li>
                                        </ul>
                                        @endsection
     @section('content')
       <div class="sparkline13-list">
<div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true"  data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>     
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="idEtu">ID</th>
                                                <th data-field="nom" >Nom</th>
                                                <th data-field="prenom" >Prénom</th>
                                                 <th data-field="matricule">Matricule</th>
                                                <th data-field="date_naissance" >Date de Naissance</th>
                                               
                                                <th data-field="type" >Type</th>
                                                <th data-field="etat" >Etat</th>
                                                <th data-field="etat_just" >Etat de la justification</th>
                                               
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $var=1; ?>
                                            @foreach($abs as $a)
                                            <tr>
                                        <td></td>
                                        <td> {{ $var}}</td>
                                            <td>{{$a->etu->nom}}</td>
                                            <td>{{$a->etu->prenom}}</td>
                                            <td>{{$a->etu->matricule}}</td>
                                            <td>{{$a->etu->date_naissance}}</td>
                                             <td>{{$a->etu->type}}</td>
                                             <td>@if($a->etat== 1 )
                                             Présent @else Absent @endif </td>
                                             <td>
                                            
                        <div class="product-status-wrap drp-lst">
                      
                                            @if($a->justification != null and $a->etat_just == 2 )
                                             <button class="ps-setting">En attente</button>
                                            @elseif($a->etat_just == 1 )
                                            <button class="pd-setting">Accepté</button>
                                            @elseif($a->etat_just == 0 )
                                            <button class="ds-setting">Réfusé</button>
                                            @else
                                            <button class="ds-setting" style="background-color:orange;">Non justifié</button>
                                            @endif
                                            </div>
                                            </td>
                                            </tr>
                                            <?php $var++; ?>
                                            @endforeach
                                             
                                        </tbody>
                              
                                    </table>
                                   
</div>
</div>
</div>


     @endsection