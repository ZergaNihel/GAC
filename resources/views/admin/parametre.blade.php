@extends('layouts.header')

@section('title','paramètres')
@section('js')
<script>


          $(document).ready(function(){
// -----------------------------------semestres---------------------------
var c = $("#cmpt").val();
if(c == 0){
$("#parametre").modal("show");
}else{
  $("#parametre").modal("hide");
}


  });

</script>
@endsection

    
     @section('sidebar')
  
     @include('layouts.sidebarAdmin1')

     @endsection
    @section('mobileSidebar')
  
     @include('layouts.mobileSidebar1')

     @endsection

    
                                        @section('search')
                                        <ul class="breadcome-menu" >
                                            <li><a href="#">Paramètres</a> 
                                            </li>
                                        </ul>
                                        @endsection
                                         @section('content')
            <input type="hidden" name="cmpt" id="cmpt" value="{{$paramCount}}">
 <div id="parametre" class="modal modal-edu-general modal-zoomInDown fade" role="dialog" data-keyboard="false" data-backdrop="static">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                          
                                                        <div class="modal-body">

                                                            <div class="modal-login-form-inner">
                                            
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="basic-login-inner modal-basic-inner">
                                                                            <h3>Configuration de Paramétres</h3>
                            <p>configurer les paramètres de l'application</p><br>
                            @if ($errors->any())
    <div class="alert-wrap1 shadow-inner wrap-alert-b">
     <div class="alert alert-danger alert-mg-b" role="alert">
      <ul >
            @foreach ($errors->all() as $error)
               
     <li>  <strong>Erreur!</strong> {{ $error }}. </li> 
        
         @endforeach
            </ul>
          </div>
          </div>
     
@endif
                                 

  <form action="{{url('param')}}" method="post" id="formParam" enctype="multipart/form-data" >
                                {!! csrf_field() !!}
           
                         <div class="row">
                                                    <div class="col-lg-4"> 
                                                      <label > Université </label>
                                                    </div>
                                                     <div class="col-lg-8"> 
                                                      <div class="form-group-inner">
                                                        <div class="chosen-select-single mg-b-20">
                        <select name="univ" class="chosen-select" tabindex="-1" id="univ" > 
                          <option disabled selected>Select your option</option>
                           <option>Université de Tlemcen Abou Bakr Belkaid</option>
                          <option>Université d' Oran Ahmed BenBella</option>
                              </select>
                            </div>
                          </div>
                                                    </div>
                                                  </div>
                                                      <div class="row">
                                                    <div class="col-lg-4"> 
                                                      <label > Faculté </label>
                                                    </div>
                                                     <div class="col-lg-8"> 
                                                      <div class="form-group-inner">
                                                        <div class="chosen-select-single mg-b-20">
                        <select name="fac" class="chosen-select" tabindex="-1" id="fac" > 
                          <option disabled selected>Select your option</option>
                          <option>Faculté des sciences Tijani Alheddam</option>
                          <option>Faculté des sciences</option>
                               
                              </select>
                            </div>
                          </div>
                                                    </div>
                                                  </div>
                                                       
                                      <div class="row">
                                                    <div class="col-lg-4"> 
                                                      <label > Département</label>
                                                    </div>
                                                     <div class="col-lg-8"> 
                                                      <div class="form-group-inner">
                                                        <div class="chosen-select-single mg-b-20">
                        <select name="dep" class="chosen-select" tabindex="-1" id="dep" > 
                          <option disabled selected>Select your option</option>
                          <option >Mathématiques</option>
                          <option >Informatiques</option>
                          <option >Physiques</option>
                          <option >Chimie</option>
                              </select>
                            </div>
                          </div>
                                                    </div>
                                                  </div> 

                              <div class="row">
                                                    <div class="col-lg-4"> 
                                                      <label > Promotion</label>
                                                    </div>
                                                     <div class="col-lg-8"> 
                                                      <div class="form-group-inner">
                                                        <div class="chosen-select-single mg-b-20">
                        <select name="prom" class="chosen-select" tabindex="-1" id="prom" > 
                          <option disabled selected >Select your option</option>
                                <option > MI </option>
                                 <option > SM </option>
                                  <option > ST </option>
                              </select>
                            </div>
                          </div>
                                                    </div>
                                                  </div> 
                                                      <div class="row">
                                                    <div class="col-lg-4"> 
                                                      <label > Logo </label>
                                                    </div>
                                                     <div class="col-lg-8"> 
                                  <div class="file-upload-inner ts-forms">
                                 <div class="input prepend-big-btn">
                                          <label class="icon-right" for="prepend-big-btn">
                                    <i class="fa fa-download"></i>
                                  </label>
                                     <div class="file-button">
                                                                    Browse
                              <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;" name="logo">
                                                                </div>
                                                                <input type="text" id="prepend-big-btn" placeholder="no file selected">
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>  
                                                        
                                             
                                                 
                                              <br>
                                              <br>     
                                               
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress mg-t-15">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15">Configurer</button>
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
                                            </div>

        <div class="single-pro-review-area mt-t-30 mg-b-15" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                              @foreach($param as $p)
                              <img class="main-logo" src="{{asset('img/logo/logo.png')}}" alt=""  />
                                @endforeach
                            </div>
                            <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="address-hr">
                                            <p><b>Logo</b></p>
                                        </div>
                                    </div>
                                  </div>
                                   
                                </div>
                          
                          
                           
                            </div>
                        </div>
                 
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Paramètres</a></li>
                            
                                <li><a href="#INFORMATION">Modification</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">

                                         <br>
                                         <br>
                                         @foreach($param as $p)
                                                <div class="row">
                                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Université</b></p>
                                                        </div>
                                                    </div>
                                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p id="univ1">{{ $p->universite }}</p>
                                                        </div>
                                                    </div>
                                                   
                                                 
                                                </div>
                                                     <div class="row">
                                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Faculté</b></p>
                                                        </div>
                                                    </div>
                                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p id="fac1">{{ $p->fac }}</p>
                                                        </div>
                                                    </div>
                                                   
                                                 
                                                </div>
                                                            <div class="row">
                                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Département</b></p>
                                                        </div>
                                                    </div>
                                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p id="dep1">{{ $p->dep }}</p>
                                                        </div>
                                                    </div>
                                                   
                                                 
                                                </div>
                                                            <div class="row">
                                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Promotion</b></p>
                                                        </div>
                                                    </div>
                                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p id="prom1">{{ $p->promotion }}</p>
                                                        </div>
                                                    </div>
                                                   
                                                 
                                                </div>
                              @endforeach
                                         <br>
                                         <br>
                                         <br>
                                         <br>
                                         <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
         
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                                          @if ($errors->any())
    <div class="alert-wrap1 shadow-inner wrap-alert-b">
     <div class="alert alert-danger alert-mg-b" role="alert">
      <ul >
            @foreach ($errors->all() as $error)
               
     <li>  <strong>Erreur!</strong> {{ $error }}. </li> 
        
         @endforeach
            </ul>
          </div>
          </div>
     
@endif
<br>
       <form method="post" action="{{url('EditParam')}}" enctype="multipart/form-data" >
                                {!! csrf_field() !!}
                                              @foreach($param as $p)
             <input type="hidden" name="id" value="{{$p->id}}">
                                                <div class="row">
                                                    <div class="col-lg-4"> 
                                                      <label > Université </label>
                                                    </div>
                                                     <div class="col-lg-8"> 
                                                      <div class="form-group-inner">
                                                        <div class="chosen-select-single mg-b-20">
                        <select name="univ" class="chosen-select" tabindex="-1" > 
                          <option value="" disabled>Select your option</option>
                             <option selected>{{$p->universite}}</option>
                          <option>Université de Tlemcen Abou Bakr Belkaid</option>
                          <option>Université d' Oran Ahmed BenBella</option>

                              </select>
                            </div>
                          </div>
                                                    </div>
                                                  </div>
                                                      <div class="row">
                                                    <div class="col-lg-4"> 
                                                      <label > Faculté </label>
                                                    </div>
                                                     <div class="col-lg-8"> 
                                                      <div class="form-group-inner">
                                                        <div class="chosen-select-single mg-b-20">
              <select name="fac" class="chosen-select" tabindex="-1" id=""  > 
                          <option value="" disabled>Select your option</option>
                          <option selected>{{$p->fac}}</option>
                             <option>Faculté des sciences Tijani Alheddam</option>
                          <option>Faculté des sciences</option>
                              </select>
                            </div>
                          </div>
                                                    </div>
                                                  </div>
                                                       
                                      <div class="row">
                                                    <div class="col-lg-4"> 
                                                      <label > Département</label>
                                                    </div>
                                                     <div class="col-lg-8"> 
                                                      <div class="form-group-inner">
                                                        <div class="chosen-select-single mg-b-20">
           <select name="dep" class="chosen-select" tabindex="-1" > 
                          <option selected>{{$p->dep}}</option>
                          <option disabled>Select your option</option>
                           <option >Mathématiques</option>
                          <option >Informatiques</option>
                          <option >Physiques</option>
                          <option >Chimie</option>
                              </select>
                            </div>
                          </div>
                                                    </div>
                                                  </div> 

                              <div class="row">
                                                    <div class="col-lg-4"> 
                                                      <label > Promotion</label>
                                                    </div>
                                                     <div class="col-lg-8"> 
                                                      <div class="form-group-inner">
                                                        <div class="chosen-select-single mg-b-20">
                        <select name="prom" class="chosen-select" tabindex="-1"> 
                          <option disabled>Select your option</option>
                          <option selected>{{$p->promotion}}</option>
                                 <option > MI </option>
                                 <option > SM </option>
                                  <option > ST </option>
                              </select>
                            </div>
                          </div>
                                                    </div>
                                                  </div> 
                                                      <div class="row">
                                                    <div class="col-lg-4"> 
                                                      <label > Logo </label>
                                                    </div>
                                                     <div class="col-lg-8"> 
                                  <div class="file-upload-inner ts-forms">
                                                            <div class="input prepend-big-btn">
                                                                <label class="icon-right" for="prepend-big-btn">
                                    <i class="fa fa-download"></i>
                                  </label>
                                                                <div class="file-button">
                                                                    Browse
      <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;" name="logo">
                                                                </div>
           <input type="text" id="prepend-big-btn" placeholder="no file selected" value="{{$p->logo}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>  
                                                        
                                             
                                                 
                                              <br>
                                              <br>     
                                               
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress mg-t-15">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15">Modifier</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                      </form>
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
                                          @endsection