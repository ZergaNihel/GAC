@extends('layouts.header')

@section('title','Modules/détails')


    
     @section('sidebar')
  
     @include('layouts.sidebarAdmin1')

     @endsection
    @section('mobileSidebar')
  
     @include('layouts.mobileSidebar1')

     @endsection

    
                                        @section('search')
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Modules</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">{{$module->nom}}</span>
                                            </li>
                                        </ul>
                                        @endsection

   @section('content')
    


     <div class="admintab-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details shadow-reset">
                            <h2>{{$module->nom}}</h2>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="admintab-wrap edu-tab1 mg-t-30">
                            <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                                <li class="active"><a data-toggle="tab" href="#TabProject"><span class="edu-icon edu-analytics tab-custon-ic"></span>Informations</a>
                                </li>
                                <li><a data-toggle="tab" href="#TabDetails"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span>Sujets & Corrections</a>
                                </li>
                               
                            </ul>
                            <div class="tab-content">
                                <div id="TabProject" class="tab-pane in active animated flipInX custon-tab-style1">
                                 
                           <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Module</b><br /> {{$module->nom}}</p>
                                                        </div>
                                                    </div>
                                                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Type</b><br /> {{$module->type}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Code</b><br /> {{$module->code}}</p>
                                                        </div>
                                                    </div>
                                                  
                                                   
                            </div>
                            <br>
                           <div class="row">
                              
                                                    @if($module->sem1 != null)
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Semetre</b><br /> {{$module->sem1->nomSem}}</p>
                                                        </div>
                                                    </div>
                                                    @if($module->sem1->nomSem == 'Semestre 1')
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <div class="product-status-wrap">
                                                            <p><b>Status</b></br>
                                                     
                                                        <button class="pd-setting">Active</button> 
                                                   
                                                            </p>
                                                             </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <div class="product-status-wrap">
                                                            <p><b>Status</b></br>
                                                                
                                                 
                                                <button class="ps-setting">Active</button>
                                         
                                      
                                                 </p>
                                                   </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @else
                                                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Semetre</b><br /> /</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                        <div class="address-hr biography">
                                                             <div class="product-status-wrap">
                                                            <p><b>Status</b><br>
                                                               
                                                                <button class="ds-setting">Désactivé</button> </p></div>
                                                        </div>
                                                    </div>
                                                    @endif
                                              
                            </div>
                            <br>
                           <div class="row">
                                                 
                                                   @if($module->sem1 != null)
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Année Universitaire</b><br />
                                                            {{$module->sem1->annee}} </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Enseignant Responsable</b><br /> {{$module->ens_R->nom}} {{$module->ens_R->prenom}}</p>
                                                        </div>
                                                    </div>
                                                    @else
                                                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Année Universitaire</b><br />
                                                            / </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Enseignant Responsable</b><br /></p>
                                                        </div>
                                                    </div>
                                                    @endif
                                                     
                            </div>
<br>
                                </div>
                                <div id="TabDetails" class="tab-pane animated flipInX custon-tab-style1">
                               
                                <!-- accordion start-->
        <div class="edu-accordion-area mg-b-15">
            <div class="container-fluid">
              
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="admin-pro-accordion-wrap shadow-inner responsive-mg-b-30">
                            <div class="alert-title">
                                <h2>Sujets</h2>
                                <p>Vous trouvez ici les sujets d'examens et contrôles pour chaque année</p>
                            </div>
                           
                            <div class="panel-group edu-custon-design" id="accordion">
                                <?php $var = 0;?>
                                  @foreach($exams as $e)
                        <div class="panel panel-default">
                                    <div class="panel-heading accordion-head">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$var}}">
                                    {{ $e->sem_ann->annee }}</a>
                                        </h4>
                                    </div>
                         <div id="collapse{{$var}}" class="panel-collapse panel-ic collapse">
                                        <div class="panel-body admin-panel-content animated bounce">
                                                <div class="ex-pro">
                                                            <ul>
@foreach($ex as $e1)
  <a href="{{ url('modules/pdf/'.$e1->idExam.'/1') }}"><li style="color: #006DF0"><i class="fa fa-angle-right"></i>Sujet {{$e1->type}} -  {{ $e->sem_ann->annee}}</li> </a>
  @endforeach
                                                            </ul>
                                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $var++;?>
                                 @endforeach
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="admin-pro-accordion-wrap shadow-inner">
                            <div class="alert-title">
                                <h2>Corrigés</h2>
                                <p>Vous trouvez ici les corrections d'examens et contrôles pour chaque année</p>
                            </div>
                            <div class="panel-group edu-custon-design" id="accordion2">
                               
          @foreach($exams as $e)
                        <div class="panel panel-default">
                                    <div class="panel-heading accordion-head">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapse{{$var}}">
                                    {{ $e->sem_ann->annee }}</a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$var}}" class="panel-collapse panel-ic collapse">
                                        <div class="panel-body admin-panel-content animated bounce">
                                                <div class="ex-pro">
                                                            <ul>
@foreach($ex as $e1)
  <a href="{{ url('modules/pdf/'.$e1->idExam.'/2') }}"><li style="color: #006DF0"><i class="fa fa-angle-right"></i>Corrigé {{$e1->type}} -  {{ $e->sem_ann->annee}}</li> </a>
  @endforeach
                                                            </ul>
                                                        </div>
                                        </div>
                                    </div>
                                </div>
                                 <?php $var++;?>
                                 @endforeach
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

        