@extends('layouts.header')

@section('title','Profil')
@section('js')

@endsection

   
        @if(Auth::user()->role == 1)
     @section('sidebar')
  
     @include('layouts.sidebarAdmin1')

     @endsection
    @section('mobileSidebar')
  
     @include('layouts.mobileSidebar1')

     @endsection
     @endif
     

    
                                        @section('search')
                                        <ul class="breadcome-menu" >
                                            <li><a href="#">Profil  </a> 

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
                                @if($membre->photo)
                                <img class="profile-user-img img-responsive img-fluid" src="{{asset($membre->photo)}}" alt="User profile picture" />
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
                                <li class="active"><a href="#description">profil</a></li>
                               
                               
                               
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
       

                                                     <!--fin de profil admine ou anonyma-->
                                                 
                                                   
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
                                                        <strong>Matricule</strong>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="text-muted">
                                                {{$membre->etudiant->matricule}}
                                                        </p>
                                                    </div>
                                                   
                                                          <div class="col-md-3">
                                                        <strong>Type</strong>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="text-muted">
                                               <b> {{$membre->etudiant->type}}</b>
                                                        </p>
                                                    </div>
                                                    @if($membre->etudiant->type == 'Endétté(e)' or $membre->etudiant->type == 'Répétitif(ve)' )
                                                              <div class="col-md-3">
                                                        <strong>Modules</strong>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="text-muted">
@foreach(App\Endette::where('Etu_end',$membre->id_Etu)->join('modules','module_end','idMod')->get() as $m)
<b>{{$m->nom}} </b>
        @endforeach
                                                        </p>
                                                    </div>
                                                    @endif   
                                                     
                                                    <div class="col-md-3">
                                                        <strong>email</strong>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="text-muted">
                                                            {{$membre->email}}
                                                        </p>
                                                    </div>
                                                
                                                </div>
                                               
                                            
                                               
                                               
                                                
                                            </div>
                                        </div>
                                    </div>
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