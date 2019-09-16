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
                                                <th data-field="type" >Code</th>
                                                <th data-field="nom" >Nom</th>
                                                <th data-field="prenom" >Prénom</th>
                                                 <th data-field="matricule">Matricule</th>
                                                <th data-field="date_naissance" >Date de Naissance</th>
                                               
                                                <th data-field="type" >Type</th>
                                                <th data-field="nomG" >Groupe</th>
                                               
                                                <th data-field="notefinale" >Note</th>
                                               
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $var=1; ?>
                                            @foreach($notes as $a)
                                            <tr>
                                        <td></td>
                                        <td> {{ $var}}</td>
                                        <td>{{$a->code}}</td>
                                            <td>{{$a->nom}}</td>
                                            <td>{{$a->prenom}}</td>
                                            <td>{{$a->matricule}}</td>
                                            <td>{{$a->date_naissance}}</td>
                                             <td>{{$a->type}}</td>
                                             <td>{{$a->nomG}}</td>
                                             <td> {{$a->notefinale}}</td>
                                            </tr>
                                            <?php $var++; ?>
                                            @endforeach
                                             
                                        </tbody>
                              
                                    </table>
                                   
</div>
</div>
</div>


     @endsection