<!DOCTYPE >
<html>
<head>
	<title></title>
</head>
<body>
<form  method="post" action="{{ url('empCour') }}"> 
	{!! csrf_field() !!}
	 <fieldset class="dropzone dropzone-custom" style="border-color:grey; border-width: 3px;" ><div class="row"><div class="button-ap-list responsive-btn pull-right"><div class="button-style-four btn-mg-b-10"><button type="button" class="btn btn-custon-rounded-four btn-danger" id="'+i+'"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> </button></div></div></div><div class="row "><div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"><label class="login2"> Module</label><div class="form-group">@foreach($mod as $m)<input type="hidden" name="idmodule" value="{{$m->idMod}}"><input name="nameasset" type="text" class="form-control" value="{{$m->nom}}" readonly></div>@endforeach</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"><label class="login2"> Enseignant</label><div class="form-group"><div class="chosen-select-single mg-b-20"><select name="idens" class="chosen-select" tabindex="-1" id="ETD">@foreach($pro as $p)<option value="{{$p->idEns}}">{{$p->nom}} {{$p->nom}}</option>@endforeach</select></div></div></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"><label class="login2"> Section</label><div class="form-group"><div class="chosen-select-single mg-b-20"><select  name="idsec" class="chosen-select" id="group" tabindex="-1">@foreach($sec as $s)<option value="{{$s->idSec}}">{{$s->nomSec}} </option>@endforeach</select></div></div></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"><label class="login2"> Séances </label><div class="form-group-inner"  id="module"><div class="chosen-select-single"><select data-placeholder="Choisir une seance" class="chosen-select" multiple="multiple" id="seance" name="idsea[]">@foreach($seances as $sea)<option value="{{$sea->idSea}}">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}</option>@endforeach</select></div></div></div></div></fieldset>
	 <button type="submit" > submit</button>
	</form>
	

</body>
</html>