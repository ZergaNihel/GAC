@extends('layouts.masterEr')
@section('content')
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <img class="profile-user-img img-responsive img-fluid" src="{{asset($membre->photo)}}" alt="User profile picture" />
                            </div>

                            <div class="profile-details-hr">
                               
                                
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li><a href="#description">Activity</a></li>
                                
                                <li class="active"><a href="#INFORMATION">Update Details</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                <div class="product-tab-list tab-pane fade" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">

                                            @if(Auth::user()->role == '1' || Auth::user()->role == '2')
                                             <!--debut de profil admine ou anonyma-->
                                                    <div class="col-md-3">
                                                        <strong>Nom</strong>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="text-muted">
                                                            {{$membre->name}}
                                                        </p>
                                                    </div>
                                                     <div class="col-md-3">
                                                        <strong>email</strong>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="text-muted">
                                                            {{$membre->email}}
                                                        </p>
                                                    </div>
                                                     <!--fin de profil admine ou anonyma-->
                                                  @elseif(Auth::user()->role == '0')
                                                    <div class="col-md-3">
                                                        <strong>Nom</strong>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="text-muted">
                                                            {{$membre->etudiant->nom}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <strong>Prenom</strong>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="text-muted">
                                                           {{$membre->etudiant->prenom}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <strong>date de naissance</strong>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="text-muted">
                                                            {{$membre->etudiant->date_naissance}}
                                                        </p>
                                                    </div>
                                                   
                                                     
                                                     
                                                    <div class="col-md-3">
                                                        <strong>email</strong>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="text-muted">
                                                            {{$membre->email}}
                                                        </p>
                                                    </div>
                                                    @endif
                                                </div>
                                               
                                               
                                               
                                               
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                                <div  class="product-tab-list tab-pane fade active in" id="INFORMATION">
                                    <form action=" {{url('membre/'. $membre->id) }} " method="post"  class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" enctype="multipart/form-data">
                                      
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}    
                         <fieldset>
              

                                  <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                
                                                <div class="row">

                                                    @if(Auth::user()->role == '1' || Auth::user()->role == '2')
                                                      <!--debut de modifier admine ou anonyma-->
                                                    <div class="col-lg-6">
                                                       
                                                       <div class="form-group">
                                                            <input name="name" type="text" class="form-control" value="{{$membre->name}}">
                                                             <span class="help-block">
                                          @if($errors->get('name'))
                                            @foreach($errors->get('name') as $message)
                                                <li> {{ $message }} </li>
                                              @endforeach
                                                @endif
                                                   </span>
                                                        </div>
                                                         <div class="form-group inputGroupContainer @if($errors->get('email')) has-error @endif">
                                                            <input name="email" type="email" class="form-control" value="{{$membre->email}}">
                                                            <span class="help-block">
                                                       @if($errors->get('email'))
                                                @foreach($errors->get('email') as $message)
                                                   <li> {{ $message }} </li>
                                                    @endforeach
                                                    @endif
                                                      </span>
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

                                                        <!-- -->
                                                         <div class="col-lg-6" >
                                                         <div class="form-group">
                                                          
                                                             
                                                            <input  name="password" " type="password" class="form-control" placeholder="Password" >
                                                            @if($errors->has('password'))
                                                  <p class="help is-danger">{{ $errors->first('password') }}</p>
                                                     @endif
                                                      </div>
                                                     
                                                      
                                                          
                                                             

                                                        
                                                        <div class="form-group">
                                                                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" >
                                                                  @if($errors->has('password_confirmation'))
                                      <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                                                           @endif
                                                            </div>
                                                            </div>
                                                             <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress mg-t-15">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15">Submit</button>
                                                        </div>
                                                   
                                                    </div>
                                                </div>
                                                <!--fin de modifier admine ou anonyma-->
                                            @elseif(Auth::user()->role == '0')
                                                         <!-- -->
                                                    <div class="col-lg-6">
                                                        <!-- -->
                                                        <div class="form-group">
                                                            <input name="nom" type="text" class="form-control" value="{{$membre->etudiant->nom}}">
                                                             <span class="help-block">
                                          @if($errors->get('name'))
                                            @foreach($errors->get('name') as $message)
                                                <li> {{ $message }} </li>
                                              @endforeach
                                                @endif
                                                   </span>
                                                        </div>
                                                        <!-- -->
                                                       
                                                        <div class="form-group">
                                                            <input name="prenom" type="text" class="form-control"value="{{$membre->etudiant->prenom}}">
                                                            <span class="help-block">
                                @if($errors->get('prenom'))
                                  @foreach($errors->get('prenom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                                                        </div>
                                                        

                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="date_naissance" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker"value="{{$membre->etudiant->date_naissance}}">
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
                                                    <div class="col-lg-6" >
                                                       
                                                        <div class="form-group inputGroupContainer @if($errors->get('email')) has-error @endif">
                                                            <input name="email" type="email" class="form-control" value="{{$membre->email}}">
                                                            <span class="help-block">
                                @if($errors->get('email'))
                                  @foreach($errors->get('email') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                                                        </div>

                                                        
                                                         @if((Auth::id() == $membre->id))  
                                                        <div class="form-group">
                                                          
                                                             
                                                            <input  name="password" " type="password" class="form-control" placeholder="Password" >
                                                            @if($errors->has('password'))
            <p class="help is-danger">{{ $errors->first('password') }}</p>
        @endif
                                                          
                                                             
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" >
                                                                  @if($errors->has('password_confirmation'))
            <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
        @endif
                                                            </div>
                                                        
                                                         @endif


                                                    </div>

                                                </div>

                                                </fieldset>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress mg-t-15">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15">Submit</button>
                                                        </div>
                                                   
                                                    </div>
                                                </div>
                                                 @endif
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