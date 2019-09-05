@extends('layouts.header')

@section('title','paramètres')
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
    <li><a href="#">Profil / {{$membreE->enseignant->nom}} /{{$membreE->enseignant->prenom}} </a>

    </li>
</ul>
@endsection
@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="profile-info-inner">
                    <div class="profile-img">
                        @if($membreE->photo)
                        <img class="profile-user-img img-responsive img-fluid" src="{{asset($membreE->photo)}}"
                            alt="User profile picture" />
                        @else
                        <img class="profile-user-img img-responsive img-fluid" src="{{asset('img/profile/profil.png')}}"
                            alt="User profile picture" />
                        @endif
                    </div>

                    <div class="profile-details-hr">



                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Profil</a></li>

                        <li><a href="#INFORMATION">Modifier le profil</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Nom</strong>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="text-muted">
                                                    {{$membreE->enseignant->nom}}
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <strong>Prenom</strong>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="text-muted">
                                                    {{$membreE->enseignant->prenom}}
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <strong>grade</strong>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="text-muted">
                                                    {{$membreE->enseignant->grade}}
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <strong>profil</strong>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="text-muted">
                                                    {{$membreE->enseignant->profil}}
                                                </p>
                                            </div>



                                            <div class="col-md-3">
                                                <strong>email</strong>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="text-muted">
                                                    {{$membreE->email}}
                                                </p>
                                            </div>
                                        </div>





                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-tab-list tab-pane fade" id="INFORMATION">
                            <form action=" {{url('membreE/'. $membreE->id) }} " method="post"
                                 id="demo1-upload"
                                enctype="multipart/form-data">

                                <input type="hidden" name="_method" value="PUT">
                                {{ csrf_field() }}
                                <fieldset>


                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <!-- -->
                                                        <div class="form-group">
                                                            <input name="nom" type="text" class="form-control"
                                                                value="{{$membreE->enseignant->nom}}">
                                                            <span class="help-block">
                                                                @if($errors->get('nom'))
                                                                @foreach($errors->get('nom') as $message)
                                                                <li> {{ $message }} </li>
                                                                @endforeach
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <!-- -->

                                                        <div class="form-group">
                                                            <input name="prenom" type="text" class="form-control"
                                                                value="{{$membreE->enseignant->prenom}}">
                                                            <span class="help-block">
                                                                @if($errors->get('prenom'))
                                                                @foreach($errors->get('prenom') as $message)
                                                                <li> {{ $message }} </li>
                                                                @endforeach
                                                                @endif
                                                            </span>
                                                        </div>


                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="grade"
                                                                data-mask id="datepicker"
                                                                value="{{$membreE->enseignant->grade}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="profil"
                                                                data-mask id="datepicker"
                                                                value="{{$membreE->enseignant->profil}}">
                                                        </div>


                                                        <div class="form-group">


                                                        </div>
                                                        <div class="file-upload-inner ts-forms">
                                                            <div class="form-group">

                                                                <div class="col-md-9 inputGroupContainer">
                                                                    <div style="width: 70%">
                                                                        <input name="img" type="file">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">

                                                        <div
                                                            class="form-group inputGroupContainer @if($errors->get('email')) has-error @endif">
                                                            <input name="email" type="email" class="form-control"
                                                                value="{{$membreE->email}}">
                                                            <span class="help-block">
                                                                @if($errors->get('email'))
                                                                @foreach($errors->get('email') as $message)
                                                                <li> {{ $message }} </li>
                                                                @endforeach
                                                                @endif
                                                            </span>
                                                        </div>


                                                        @if((Auth::id() == $membreE->id))
                                                        <div class="form-group">


                                                            <input name="password"  type=" password"
                                                                class="form-control" placeholder="Password">
                                                            @if($errors->has('password'))
                                                            <p class="help is-danger">{{ $errors->first('password') }}
                                                            </p>
                                                            @endif


                                                        </div>

                                                        <div class="form-group">
                                                            <input name="password_confirmation" type="password"
                                                                class="form-control" placeholder="Confirm Password">
                                                            @if($errors->has('password_confirmation'))
                                                            <p class="help is-danger">
                                                                {{ $errors->first('password_confirmation') }}</p>
                                                            @endif
                                                        </div>

                                                        @endif


                                                    </div>
                                                </div>

                                </fieldset>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="payment-adress mg-t-15">
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light mg-b-15">Valider</button>
                                        </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>



<!-- jquery
		============================================ -->


@endsection
