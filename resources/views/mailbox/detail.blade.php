@extends('layouts.header')

@section('title','e-mail détails')
@section('js')

@endsection

    
     @section('sidebar')
  
     @include('layouts.sidebarAdmin1')

     @endsection
    @section('mobileSidebar')
  
     @include('layouts.mobileSidebar1')

     @endsection

    
                                        @section('search')
                                        <ul class="breadcome-menu" >
                                            <li><a href="#">boite de réception / </a> 

                                            </li>
                                        </ul>
                                        @endsection
                                         @section('content')
<div class="mailbox-view-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
              @include('layouts.composer')
                    <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="hpanel email-compose mailbox-view">
                            <div class="panel-heading hbuilt">

                                <div class="p-xs h4">
                                    <small class="pull-right view-hd-ml">
                                            08:26 PM (16 hours ago)
                                        </small> Email view

                                </div>
                            </div>
                            <div class="border-top border-left border-right bg-light">
                                <div class="p-m custom-address-mailbox">

                                    <div>
                                        <span class="font-extra-bold">Subject: </span>  {{  $message->sujet   }}
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">De: </span>
                                        <a href="">{{$message->Rcp->name}}</a>
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">Date: </span> {{$message->created_at->format('d/m/Y')}}
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body panel-csm">
                                <div>
                          {!!  $message->msg    !!}
                                </div>
                          
                            </div>
@if($nbr>0)
                            <div class="border-bottom border-left border-right bg-white mg-tb-15">
                                <p class="m-b-md">
                                    <span><i class="fa fa-paperclip"></i> {{$nbr}} piéces jointes </span>
                                   
                                </p>

                                <div>

                                    <div class="row">
                                        @foreach($medias as $m)
                                         @if($m->ex == 'pdf')
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="hpanel vw-mb">
                                                <div class="panel-body file-body incon-ctn-view">
                                                    <i class="fa fa-file-pdf-o text-danger"></i>
                                                </div>
                                                <div class="panel-footer ft-pn">
                                                   <label>{{$m->file_name}}</label>    
                                                  <a href="/uploads/attachements/{{$m->att}}" download="{{$m->att}}"> <i class="fa fa-download pull-right"></i></a>
                                                </div>
                                            </div>
                                             <br>
                                        </div>
                                        @endif
                                          @if($m->ex == 'docx')
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="hpanel vw-mb res-mg-t-30 table-mg-t-pro-n">
                                                <div class="panel-body file-body incon-ctn-view">
                                                    <i class="fa fa-file-word-o text-info"></i>
                                                </div>
                                                <div class="panel-footer ft-pn">
                                                   <label>{{$m->file_name}}</label>    
                                                  <a href="/uploads/attachements/{{$m->att}}" download="{{$m->att}}"> <i class="fa fa-download pull-right"></i></a>
                                                </div>
                                            </div>
                                             <br>
                                        </div>
                                         @endif
                                          @if($m->ex == 'xlsx')
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <div class="hpanel vw-mb res-mg-t-30 table-mg-t-pro-n">
                                                <div class="panel-body file-body incon-ctn-view">
                                                    <i class="fa fa-file-excel-o text-success"></i>
                                                </div>
                                                <div class="panel-footer ft-pn">
                                                   <label>{{$m->file_name}}</label>    
                                                  <a href="/uploads/attachements/{{$m->att}}" download="{{$m->att}}"> <i class="fa fa-download pull-right"></i></a>
                                                </div>
                                            </div>
                                             <br>
                                        </div>
                                         @endif
                                       @if($m->ex == 'jpg' or $m->ex == 'PNG' or $m->ex == 'bmp')
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <div class="hpanel vw-mb res-mg-t-30 table-mg-t-pro-n">
                                                <div class="panel-body file-body incon-ctn-view">
                                                    <i class="fa fa-file-photo-o text-warning"></i>
                                                </div>
                                                <div class="panel-footer ft-pn">
                                                   <label>{{$m->file_name}}</label>    
                                                  <a href="/uploads/attachements/{{$m->att}}" download="{{$m->att}}"> <i class="fa fa-download pull-right"></i></a>
                                                </div>
                                            </div>
                                             <br>
                                        </div>
                                         @endif
                                                  @if($m->ex == 'zip' or $m->ex == 'rar')
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <div class="hpanel vw-mb res-mg-t-30 table-mg-t-pro-n">
                                                <div class="panel-body file-body incon-ctn-view">
                                                    <i class="fa fa-file-zip-o text-primary"></i>
                                                </div>
                                                <div class="panel-footer ft-pn">
                                                    <label>{{$m->file_name}}</label>    
                                                  <a href="/uploads/attachements/{{$m->att}}" download="{{$m->att}}"> <i class="fa fa-download pull-right"></i></a>
                                                   
                                                </div>
                                            </div>
                                          <br>
                                        </div>
                                         @endif
                                                  @if($m->ex == 'pptx')
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                          <div class="hpanel vw-mb res-mg-t-30 table-mg-t-pro-n">
                                                <div class="panel-body file-body incon-ctn-view">
                                                    <i class="fa fa-file-powerpoint-o text-danger"></i>
                                                </div>
                                                <div class="panel-footer ft-pn">
                                                   <label>{{$m->file_name}}</label>    
                                                  <a href="/uploads/attachements/{{$m->att}}" download="{{$m->att}}"> <i class="fa fa-download pull-right"></i></a>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                         @endif
                                          @endforeach
                                    </div>
                             
                                </div>
                            </div>
@endif
                            <div class="panel-footer text-right ft-pn">
                                <div class="btn-group active-hook">
                                    <button class="btn btn-default"><i class="fa fa-reply"></i> Répondre</button>
                                    <button class="btn btn-default"> <a href="/boite_de_reception"><i class="fa fa-arrow-right"></i> Précédent</a></button>
                                    <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Imprimer</button>
                                    <button class="btn btn-default"><i class="fa fa-trash-o"></i> Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                                         @endsection