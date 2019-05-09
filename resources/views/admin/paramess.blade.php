@extends('layouts.headerParam')

@section('title','paramètres')
@section('js')
<script >


//
</script>
@endsection

    


    
                                        @section('search')
                                        <ul class="breadcome-menu" >
                                            <li><a href="#">Paramètres</a> 
                                            </li>
                                        </ul>
                                        @endsection
                                         @section('content')
                 <div id="parametre" class="modal modal-edu-general modal-zoomInDown fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                   <div class="modal-close-area modal-close-df">
                                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="modal-login-form-inner">
                                            
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="basic-login-inner modal-basic-inner">
                                                                            <h3>Configuration de Paramétres</h3>
                            <p>configurer les paramètres de l'application</p><br>
                                       <div class="alert-wrap1 shadow-inner wrap-alert-b">
                                <div class="alert alert-danger alert-mg-b" role="alert" id="error" style="display: none;">
                                <strong>Erreur!</strong> Vous devez remplisser tout les champs.
                            </div>
                            <br>
                           
                          </div>

                               <form action="{{url('NouveauEtudiant')}}"  method="post" id="formEtud">
                                {!! csrf_field() !!}
           
                         <div class="row">
                                                    <div class="col-lg-4"> 
                                                      <label > Université </label>
                                                    </div>
                                                     <div class="col-lg-8"> 
                                                      <div class="form-group-inner">
                                                        <div class="chosen-select-single mg-b-20">
                        <select name="idens" class="chosen-select" tabindex="-1" id="" > 
                          <option value=""  selected>Select your option</option>
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
                        <select name="idens" class="chosen-select" tabindex="-1" id="" > 
                          <option value="" selected>Select your option</option>
                          <option>Faculté des sciences Tijani Alheddam</option>
                          <option>Faculté des sciences</option>
                                <option value=""></option>
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
                        <select name="idens" class="chosen-select" tabindex="-1" id="" > 
                          <option selected>Select your option</option>
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
                        <select name="idens" class="chosen-select" tabindex="-1" id="" > 
                          <option value="" selected>Select your option</option>
                                <option value=""> MI </option>
                                 <option value=""> SM </option>
                                  <option value=""> ST </option>
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
                              <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;">
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
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15">Submit</button>
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
              <br><br>
                <div class="row">
        <h3>Configuration de Paramétres</h3>
         <p>configurer les paramètres de l'application</p><br>
 
                </div>
                 <br><br>
             <div class="row">
            <div class="col-lg-12">
      <div class="payment-adress mg-t-15">
     <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15">Submit</button>
            </div>
             </div>
       </div>
 <br><br> <br><br> <br><br>
            </div>
        </div>
      
      @endsection