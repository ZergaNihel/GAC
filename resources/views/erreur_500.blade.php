@extends('layouts.header')
@section('title','ERROR 500')

     @section('sidebar')
  
     @include('layouts.sidebarAdmin1')

     @endsection
    @section('mobileSidebar')
  
     @include('layouts.mobileSidebar1')

     @endsection

    
                                        @section('search')
                                        <ul class="breadcome-menu" >
                                            <li><a href="#">Error 500</a> 
                                            </li>
                                        </ul>
                                        @endsection
@section('content')
<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="content-error">
				<h1>Erreur de Serveur<span class="counter"> 500</span></h1>
				<p>Désolé ! Vous n'avez pas l'accés a cette page </p>
				<a href="{{url('Semestres/index')}}">Retour</a>
				
			</div>

		</div>   
    </div>
@endsection