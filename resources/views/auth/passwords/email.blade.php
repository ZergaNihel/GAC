@extends('layouts.app')

@section('content')
    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center ps-recovered">
                <h3>MOT DE PASSE RECUPERER</h3>
                <p>Veuillez remplir le formulaire pour récupérer votre mot de passe</p>
            </div>
            <div class="content-error">
                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="hpanel">
                    <div class="panel-body poss-recover">
                        <p>
                            Entrez votre adresse e-mail et votre mot de passe sera réinitialisé et envoyé par courrier électronique.
                        </p>
                        <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <button class="btn btn-success btn-block">réinitialisé le mot de passe </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="text-center login-footer">
                
            </div>
        </div>   
    </div>
@endsection
