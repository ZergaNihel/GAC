@extends('layouts.header')

@section('title','comptes étudiant')

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
<div class="admintab-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details shadow-reset">
                            <h2>Comptes étudiants</h2>
                            <p></p>
                        </div>
                    </div>
                </div>
<div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                          
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>No</th>
                                       <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Email</th>
                                         <th>matricule</th>
                                         <th>date de naissance</th>
                                         <th>type</th>
                                    </tr>
                      
                                </table>
                            </div>
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
     @endsection