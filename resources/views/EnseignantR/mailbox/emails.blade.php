@extends('layouts.masterAnonym')

@section('script1')


@endsection

    
                                        @section('path')
                                        <ul class="breadcome-menu" >
                                         @if($b == 1)
                                            <li><a href="{{url('/brouillons')}}">/Brouillon </a> 
                                        @endif
                                          @if($b == 0)
                                           <li><a href="{{url('/envoye')}}">/Messages envoyés </a> 
                                         @endif
                                        @if($b == 2)
                                        <li><a href="{{url('/corbeille')}}">/Corbeille  </a> 
                                        @endif

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
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-8">
                                
                                    </div>
                                </div>
                                <div class="table-responsive ib-tb">
                                    <table class="table table-hover table-mailbox">
                                        <tbody>
                  @foreach($emails as $e)
                                            <tr class="unread">
                                                <td class="">
                                                    <div class="checkbox checkbox-single checkbox-success">
                                                        <input type="checkbox" checked>
                                                        <label></label>
                                                    </div>
                                                </td>
                                             <td>
                                                @if ($e->Rcp)
                                                <a href="{{url('/emails/view/'.$e->id.'/0')}}">
                                                @if( $e->Rcp->role == 1)
                                                {{ $e->Rcp->name}}
                                                @endif
                                                @if($e->Rcp->role == 2)
                                                {{ $e->Rcp->name}}
                                                @endif
                                                @if($e->Rcp->role == 0)
                                                {{App\Etudiant::find($e->Rcp->id_Etu)->nom}}  {{App\Etudiant::find($e->Rcp->id_Etu)->prenom}}
                                                @endif
                                                @if($e->Rcp->role == 3)
                                                {{App\Enseignant::find($e->Rcp->id_Ens)->nom}}  {{App\Enseignant::find($e->Rcp->id_Ens)->prenom}}
                                                @endif
                                                </a>
                                                @else

                                <a href="{{url('/emails/view/'.$e->id.'/0')}}">
                                                Aucun</a>
                                                @endif
                                                </td>
                                                <td><a href="{{url('/emails/view/'.$e->id.'/0')}}">
                      @if ($e->sujet) {{ $e->sujet}}  @else Aucun sujet @endif
                                                </a></td>
                                                <td>
                                             @if(App\Media::where('id_msg',$e->id)->count()>0) 
                                                    <i class="fa fa-paperclip">
                                             @endif      
                                                    </td>
                                                <td class="text-right mail-date">{{\Carbon\Carbon::parse($e->created_at)->toFormattedDateString()}}</td>
                                            </tr>
                                      
                                         @endforeach
                                            
                            
                               
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="panel-footer ib-ml-ft">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                                         @endsection