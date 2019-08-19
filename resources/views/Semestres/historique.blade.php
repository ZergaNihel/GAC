@extends('layouts.header')

@section('title','historiques')

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
     <li><a href="{{url('Semestres/historique')}}">Historiques</a>  </li>
                                           
                                        </ul>
                                        @endsection
     @section('content')

<div class="admintab-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details shadow-reset">
                            <h2>Historiques</h2>
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
                                       <th>Semestre</th>
                                        <th>année universitaire</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php $var =1; ?>
                                    @foreach ($sem as $s)
                                    <tr>
                                        <td>{{$var}}</td>
                                    
                                        <td>{{$s->nomSem}}</td>
                                       
                                        <td>{{$s->annee}}</td>
                                     
                                        <td>
                                        
  <a href="{{url('Semestres/historique/'.$s->idSem)}}">  <button data-toggle="tooltip" title="Détails" class="pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        </td>
                                    </tr>
                                <?php $var++; ?>
                                    @endforeach
                                </table>
                            </div>
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
                 

     @endsection