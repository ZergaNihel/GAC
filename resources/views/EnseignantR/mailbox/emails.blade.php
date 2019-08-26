{{-- @extends('layouts.header')
@if($b == 1)
@section('title','Brouillon')
@endif
@if($b == 0)
@section('title','Messages envoyés')
@endif
@if($b == 2)
@section('title','Corbeille')
@endif
@section('title','Messages envoyés')
@section('js')

@endsection --}}

@extends('layouts.masterAnonym')

@section('content')
<div class="mailbox-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.composer')
            <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                <div class="hpanel">
                    <div class="panel-heading hbuilt mailbox-hd">
                        <div class="text-center p-xs font-normal">
                            <div class="input-group">
                                <input type="text" class="form-control input-sm"
                                    placeholder="Search email in your inbox..."> <span
                                    class="input-group-btn active-hook"> <button type="button"
                                        class="btn btn-sm btn-default">Search
                                    </button> </span></div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-md-6 col-sm-6 col-xs-8">

                            </div>
                            <div class="col-md-6 col-md-6 col-sm-6 col-xs-4 mailbox-pagination">
                                <div class="btn-group ib-btn-gp active-hook mail-btn-sd mg-b-15">
                                    <button class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i></button>
                                    <button class="btn btn-default btn-sm"><i class="fa fa-arrow-right"></i></button>
                                </div>
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
                                                {{ $e->Rcp->name}}</a>
                                            @else

                                            <a href="{{url('/emails/view/'.$e->id.'/0')}}">
                                                Aucun</a>
                                            @endif
                                        </td>
                                        <td><a href="{{url('/emails/view/'.$e->id.'/0')}}">
                                                {{ $e->sujet}}
                                            </a></td>
                                        <td>

                                            <i class="fa fa-paperclip">

                                        </td>
                                        <td class="text-right mail-date">
                                            {{\Carbon\Carbon::parse($e->created_at)->toFormattedDateString()}}</td>
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
