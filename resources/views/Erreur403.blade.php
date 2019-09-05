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
                @if(Auth::user()->role == '0')
                    <a href="{{url('/absences_Etudiant')}}">Retour</a>
                @elseif(Auth::user()->role == '1')
                    <a href="{{url('Semestres/index')}}">Retour</a>
                @elseif(Auth::user()->role == '2')
                    <a href="{{url('anonymat/paquets')}}">Retour</a>
                @elseif(Auth::user()->role == '3')
                    <a href="{{url('semestre/choix')}}">Retour</a>
                @endif
				
			</div>

		</div>   
    </div>
@endsection