@extends('layouts.masterAnonym')

    
@section('path')
<ul class="breadcome-menu" >
    <li><a href="#">Erreur 403</a> 
    </li>
</ul>
@endsection
@section('content')
<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="content-error">
				<h1>Erreur de Serveur<span class="counter"> 403</span></h1>
				<p>Désolé ! Vous n'avez pas l'accés à cette page </p>
				<a href="{{url('Semestres/index')}}">Retour</a>
				
			</div>

		</div>   
    </div>
@endsection