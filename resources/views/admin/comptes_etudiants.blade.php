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

     @endsection