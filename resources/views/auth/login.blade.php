@extends('layouts.app')

@section('content')


<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center m-b-md custom-login">
                <h3>PLEASE LOGIN TO APP</h3>
                
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="username">{{ __('E-Mail Address') }}</label>
                                 
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                               
                           
                            <div class="form-group">
                                <label class="control-label" for="password">{{ __('Password') }}</label>
                               <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        

                        
                            <div class="checkbox login-checkbox">
                                <label>
                                         <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }} </label>

                                          @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                
                            </div>
                           
                            
                             <button class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-default btn-block" href="{{ route('register') }}">Register</a>
                            
                        </form>
                    </div>
                 </div>
             </div>
             </div>
               
            
            
         
    </div>

    <!-- jquery
        ============================================ -->
   
</body>

</html>
@endsection
