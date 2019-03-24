@extends('layouts.app')

@section('content')
    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center ps-recovered">
                <h3>PASSWORD RECOVER</h3>
                <p>Please fill the form to recover your password</p>
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
                            Enter your email address and your password will be reset and emailed to you.
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

                            <button class="btn btn-success btn-block">Reset password</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="text-center login-footer">
                
            </div>
        </div>   
    </div>
@endsection
