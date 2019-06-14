
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
                                            <li><span class="bread-blod"></span>
                                            </li>
                                        </ul>
                                        @endsection

   @section('content')

 <div class="pdf-viewer-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-1 col-md-2 col-sm-1 col-xs-1">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <div class="pdf-single-pro">
                            @if($sc == 1)
                            <a class="media" href="{{ asset($pdf->sujet) }}"></a>
                            @else
                            <a class="media" href="{{ asset($pdf->corrige_type) }}"></a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-1 col-xs-1">
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('pdf')

    <script src="{{asset('js/pdf/jquery.media.js')}}"></script>
    <script src="{{asset('js/pdf/pdf-active.js')}}"></script>
@endsection