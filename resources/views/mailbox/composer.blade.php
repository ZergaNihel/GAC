@extends('layouts.header')

@section('title','comoposer un e-mail')
@section('js')
<script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
</script>
@endsection

    
     @section('sidebar')
  
     @include('layouts.sidebarAdmin1')

     @endsection
    @section('mobileSidebar')
  
     @include('layouts.mobileSidebar1')

     @endsection

    
                                        @section('search')
                                        <ul class="breadcome-menu" >
                                            <li><a href="#">Envoyer un email </a> 

                                            </li>
                                        </ul>
                                        @endsection
                                         @section('content')

<div class="mailbox-compose-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="hpanel shadow-inner responsive-mg-b-30">
                            <div class="panel-body">
                                <a href="mailbox_compose.html" class="btn btn-success compose-btn btn-block m-b-md">Compose</a>
                                <ul class="mailbox-list">
                                    <li>
                                        <a href="#">
                                                <span class="pull-right">12</span>
                                                <i class="fa fa-envelope"></i> Inbox
                                            </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-paper-plane"></i> Sent</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pencil"></i> Draft</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-trash"></i> Trash</a>
                                    </li>
                                </ul>
                                <hr>
                                <ul class="mailbox-list">
                                    <li>
                                        <a href="#"><i class="fa fa-plane text-danger"></i> Travel</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-bar-chart text-warning"></i> Finance</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-users text-info"></i> Social</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-tag text-success"></i> Promos</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-flag text-primary"></i> Updates</a>
                                    </li>
                                </ul>
                                <hr>
                                <ul class="mailbox-list">
                                    <li>
                                        <a href="#"><i class="fa fa-gears"></i> Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-info-circle"></i> Support</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="hpanel email-compose">
                            <div class="panel-heading hbuilt">
                                <div class="p-xs h4">
                                    New message
                                </div>
                            </div>
                            <div class="panel-heading hbuilt">
                                <div class="p-xs">
                 <form method="post" class="form-horizontal" action="{{url('send_email')}}">
                    {!! csrf_field() !!} 
                <div class="form-group-inner">
                    <label class="col-lg-1 control-label text-left">A:</label>
                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                    <div class="chosen-select-single mg-b-20">
                <select name="email" class="chosen-select" tabindex="-1"  >
                     <option value="" disabled selected>Select your option</option>
                                  @foreach($users as $u)
                                  @if($u->etudiant != null)
                                  <option value="{{$u->id}}">{{$u->etudiant->nom}} {{$u->etudiant->prenom}}</option>
                                  @endif
                                    @if($u->enseignant != null)
                                  <option value="{{$u->id}}">{{$u->enseignant->nom}} {{$u->enseignant->prenom}}</option>
                                  @endif
                                    @if($u->etudiant == null and $u->enseignant == null)
                                  <option value="{{$u->id}}">{{$u->name}}</option>
                                  @endif
                                  @endforeach
                    </select></div></div>
                </div>
                                      
                                        <div class="form-group">
                                            <label class="col-lg-1 control-label text-left">Subject:</label>
                                            <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control input-sm" placeholder="Subject" name="sujet">
                                            </div>
                                        </div>
                                   
                                </div>
                            </div>
                            <div class="panel-body no-padding">
                    <textarea name="msg" class="summernote"></textarea>
                            </div>
                  
                            <div class="panel-footer">
                                <div class="pull-right">
                                    <div class="btn-group active-hook">
                                        <button class="btn btn-default"><i class="fa fa-edit"></i> Save</button>
                                        <button class="btn btn-default"><i class="fa fa-trash"></i> Discard</button>
                                    </div>
                                </div>
                                <button class="btn btn-primary ft-compse" type="submit">Send email</button>
                                 </form>
                                <div class="btn-group active-hook mail-btn-sd">
                                    <button class="btn btn-default"><i class="fa fa-paperclip"></i> </button>
                                    <button class="btn btn-default"><i class="fa fa-image"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                         @endsection