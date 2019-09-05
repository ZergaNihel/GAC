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
<div class="row product-status mg-b-15">
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
                                         <th>Action</th>
                                    </tr>
                                    @php $var=1; @endphp
             @foreach(Auth::user()->unreadNotifications->where('type','App\Notifications\nouvelEtudiant') as $notification)
                      <tr style="background-color:#f5f5f5;">
                          <td>{{$var}}</td>
                          <td>{{$notification->data['nom']}}</td>
                          <td>{{$notification->data['prenom']}}</td>
                          <td>{{$notification->data['email']}}</td>
                          <td>{{$notification->data['matricule']}}</td>
                          <td>{{$notification->data['date_naissance']}}</td>
                          <td>{{$notification->data['type']}}</td>
                             <td>
                                        
  <a href="{{url('/CompteEtudiant/'.$notification->data['id_user'].'/'.$notification->id) }}">  <button data-toggle="tooltip" title="Détails" class="pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        </td>
                      </tr>
                      @php $var++; @endphp
                      @endforeach
            @foreach(Auth::user()->readNotifications->where('type','App\Notifications\nouvelEtudiant') as $notification)
                      <tr >
                          <td>{{$var}}</td>
                          <td>{{$notification->data['nom']}}</td>
                          <td>{{$notification->data['prenom']}}</td>
                          <td>{{$notification->data['email']}}</td>
                          <td>{{$notification->data['matricule']}}</td>
                          <td>{{$notification->data['date_naissance']}}</td>
                          <td>{{$notification->data['type']}}</td>
                             <td>
                                        
  <a href="{{url('/CompteEtudiant/'.$notification->data['id_user'].'/'.$notification->id) }}">  <button data-toggle="tooltip" title="Détails" class="pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        </td>
                      </tr>
                      @php $var++; @endphp
                      @endforeach
                                </table>
                            </div>
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
     @endsection