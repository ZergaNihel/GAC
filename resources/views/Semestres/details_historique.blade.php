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
                                            <li><a href="{{url('Semestres/historique')}}">Historiques</a> /détails
                                            </li>
                                           
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
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="admintab-wrap edu-tab1 mg-t-30">
                            <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                                <li class="active"><a data-toggle="tab" href="#TabProject"><span class="edu-icon edu-analytics tab-custon-ic"></span>Groupes</a>
                                </li>
                                <li><a data-toggle="tab" href="#TabDetails"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span>Modules</a>
                                </li>
                                <li><a data-toggle="tab" href="#Emp"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span>Emplois du temps</a>
                                </li>
                                 <li><a data-toggle="tab" href="#Delib"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span>Délibération</a>
                                </li>
                               
                            </ul>
                            <div class="tab-content">
                                <div id="TabProject" class="tab-pane in active animated flipInX custon-tab-style1">
                                 
                          
                            
                            <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                          
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>No</th>
                                        <th>Groupe</th>
                                        <th>Section</th>
                                        <th>N° étudints</th>
                                        <th>N° nouveaux</th>
                                        <th>N° répétitifs</th>
                                        <th>N° endétté</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                    <?php $var=1;?>
                                    @foreach ($groupe as $grp)
                                    <tr>
                                        <td>{{$var}}</td>
                                        <td>{{$grp->groupe1->nomG}}</td>
                                        <td>{{$grp->section->nomSec}}</td>
                                        <td>{{App\Etudiant::where('idG',$grp->groupe)->count()}}</td>
                                        <td>{{App\Etudiant::where('idG',$grp->groupe)->where('type','Nouveau(elle)')->count()}}</td>
                                        <td>{{App\Etudiant::where('idG',$grp->groupe)->where('type','Endétté(e)')->count()}}</td>
                                        <td>{{App\Etudiant::where('idG',$grp->groupe)->where('type','Répétitif(ve)')->count()}}</td>
                                        <td>
                                       
                              <a href="{{url('Semestres/historique/Groupes/'.$grp->groupe)}}">  <button  title="voir" class="pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <?php $var++;?>
                                </table>
                            </div>
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                </div>
                                <div id="TabDetails" class="tab-pane animated flipInX custon-tab-style1">
                               
                                <!-- accordion start-->
        <div class="edu-accordion-area mg-b-15">
            <div class="container-fluid">
              
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="admin-pro-accordion-wrap shadow-inner responsive-mg-b-30">
                           
                           
                            <div class="panel-group edu-custon-design" id="accordion">
                                
                                 
                        <div class="panel panel-default">
                                    <div class="panel-heading accordion-head">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse">
                                    </a>
                                        </h4>
                                    </div>
           <div id="collapse" class="panel-collapse panel-ic collapse">
                                        <div class="panel-body admin-panel-content animated bounce">
                                                <div class="ex-pro">
                                                            <ul>

  <a href=""><li style="color: #006DF0"><i class="fa fa-angle-right"></i>Sujet </li> </a>
  
                                                            </ul>
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
                           
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

     @endsection