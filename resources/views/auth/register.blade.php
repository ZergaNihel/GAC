@extends('layouts.app')

@section('content')

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center custom-login">
                <h3>Registration</h3>
                
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                       <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="row">
                                   <div class="form-group col-lg-6">
                                   <label>Matricule</label>

                           
                                <input id="matricule" type="text" class="form-control{{ $errors->has('matricule') ? ' is-invalid' : '' }}" name="matricule" value="{{ old('matricule') }}" required autofocus>

                                @if ($errors->has('matricule'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('matricule') }}</strong>
                                    </span>
                                @endif
                           
                                </div>
                               
                                 <div class="form-group col-lg-6">
                                    <label>Email Address</label>
                                     <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Password</label>

                            
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Repeat Password</label>
                                   <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                               
                               <!-- <div class="form-group col-lg-6">
                                    <label>Repeat Email Address</label>
                                    <input class="form-control">
                                </div>-->
                                
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success loginbtn"> {{ __('Register') }}</button>
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>   
    </div>
    
    
</body>

</html>
@endsection
