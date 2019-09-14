@extends('layouts.masterAnonym')

@section('script1')


@endsection

    
                                        @section('path')
                                        <ul class="breadcome-menu" >
                                            <li><a href="#">boite de réception  </a> 

                                            </li>
                                        </ul>
                                        @endsection
                                         @section('content')
        <div class="mailbox-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
           @include('layouts.composer')
                    <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="hpanel">
                            <div class="panel-heading hbuilt mailbox-hd">
                                <div class="text-center p-xs font-normal">
                                 
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                   
                                  
                                </div>
                                <div class="table-responsive ib-tb">
                                    <table class="table table-hover table-mailbox">
                                        <tbody>
                                       @foreach(Auth::user()->unreadNotifications->where('type','App\Notifications\MsgNotification') as $notification)
                                            <tr class="active unread">
                                                <td class="">
                                                    <div class="checkbox">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="{{url('/emails/view/'.$notification->data['id_msg'].'/'.$notification->id)}}">
                                                    @if( App\User::find($notification->data['id_emt'])->role == 1 or App\User::find($notification->data['id_emt'])->role == 2 )
                                                    {{ App\User::find($notification->data['id_emt'])->name}}
                                                    @endif
                                                    @if( App\User::find($notification->data['id_emt'])->role == 0 )
                        {{ App\User::find($notification->data['id_emt'])->etudiant->nom}}
                         {{ App\User::find($notification->data['id_emt'])->etudiant->prenom}}
   @endif
   @if( App\User::find($notification->data['id_emt'])->role == 3)
                       {{ App\User::find($notification->data['id_emt'])->enseignant->nom}}
            {{ App\User::find($notification->data['id_emt'])->enseignant->prenom}}


   @endif



                                                </a> <span class="label label-danger">Nouveau</span></td>
                                                <td><a href="{{url('/emails/view/'.$notification->data['id_msg'].'/'.$notification->id)}}">
                    @if($notification->data['sujet'] )
                                     {{ $notification->data['sujet'] }}
                                     @else
                                      Aucun Sujet
                                     @endif

                                                </a></td>
                                                <td>@if($notification->data['nbr_att'] >0)
                                                    <i class="fa fa-paperclip">
                                                        @endif</td>
                                                <td class="text-right mail-date">{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</td>
                                            </tr>
                                            @endforeach
                        @foreach(Auth::user()->readNotifications->where('type','App\Notifications\MsgNotification') as $notification)
                                            <tr class="unread">
                                                <td class="">
                                                    <div class="checkbox checkbox-single checkbox-success">
                                                        <input type="checkbox" checked>
                                                        <label></label>
                                                    </div>
                                                </td>
<td><a href="{{url('/emails/view/'.$notification->data['id_msg'].'/'.$notification->id)}}">
@if( App\User::find($notification->data['id_emt'])->role == 1 or  App\User::find($notification->data['id_emt'])->role == 2)
{{ App\User::find($notification->data['id_emt'])->name}}
@endif
@if(App\User::find($notification->data['id_emt'])->role == 0)
{{ App\User::find($notification->data['id_emt'])->etudiant->nom}} {{ App\User::find($notification->data['id_emt'])->etudiant->prenom}}
@endif
@if(App\User::find($notification->data['id_emt'])->role == 3)
{{ App\User::find($notification->data['id_emt'])->enseignant->nom}} {{ App\User::find($notification->data['id_emt'])->enseignant->prenom}}
@endif
</a> </td>
                <td><a href="{{url('/emails/view/'.$notification->data['id_msg'].'/'.$notification->id)}}">
                                                @if($notification->data['sujet'] )
                                     {{ $notification->data['sujet'] }}
                                     @else
                                      Aucun Sujet
                                     @endif
                                                </a></td>
                                                <td>@if($notification->data['nbr_att'] >0)
                                                    <i class="fa fa-paperclip">
                                                        @endif
                                                    </td>
                                                <td class="text-right mail-date">{{\Carbon\Carbon::parse($notification->created_at)->toFormattedDateString()}}</td>
                                            </tr>
                                      
                                         @endforeach
                                            
                            <tr></tr>
                               
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="panel-footer ib-ml-ft">
                                <i class="fa fa-eye">  </i> {{ Auth::user()->unreadNotifications->where('type','App\Notifications\MsgNotification')->count() }} unread
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                                         @endsection