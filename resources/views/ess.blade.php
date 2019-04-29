<!DOCTYPE >
<html>
<head>
	<title></title>
</head>
<body>

<form action="{{url('NouveauEtudiant')}}"  method="post" id="formEtud">
	{!! csrf_field() !!}
                         <div class="form-group-inner">
                  <div class="row">
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <label class="login2">Nom</label>
                                                                                        </div>
                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                              <input type="text" class="form-control" placeholder="Nom" name="nom" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
         <div class="form-group-inner"> <div class="row">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Prénom</label>
                                                                                        </div>
               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                     <input type="text" class="form-control" placeholder="Prenom" name="prenom" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                             <div class="form-group-inner"> <div class="row">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Matricule</label>
                                                                                        </div>
               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                     <input type="text" class="form-control" placeholder="password" name="matricule" />
                                                                                        </div>
                                                        </div>
                                         </div>
                               
                                         <div class="form-group-inner"> <div class="row">
                                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Date de naissance</label>
                                                                                        </div> 
                                                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="sparkline16-graph">
                  <div class="date-picker-inner">
                                    <div class="form-group data-custon-pick" id="data_1">
                                    
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input type="text" class="form-control" value="10/04/2017" name="birthday">
                                        </div>
                                    </div>
                                  </div>
                                  </div>
                                   </div>
                                  </div>
                                  </div>



      <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                <label class="login2">Type </label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                                <div class="bt-df-checkbox pull-left">
                                                                 
                                                  <script type="text/javascript">
    
    function fct1(){
    
       
document.getElementById('module').style.display = "none";
        }
         function fct2(){
       
document.getElementById('module').style.display = "";
  }
</script>                      
                                                              
                                                         
                                                               
          <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div >
                                                                                <label>
                <input type="radio" value="1"  onchange="fct1();" id="n" name="type"> <i></i> Nouveau</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                       <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div >
                                                                                <label>
         <input type="radio" value="Répétitif(ve)"  onchange="fct2();" id="r" name="type"> <i></i> Répétitif</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                           <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div >
                                                                                <label>
               <input type="radio" value="Endétté(e)" name="type" onchange="fct2();" id="e"> <i></i> Endétté</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                             
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                         
                                                    </div>


<input type="hidden" name="groupe" value="18">



                                   <div class="form-group-inner" style="display: none;" id="module">
                                    <div class="row">
                                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Modules</label>
                                                                                         </div> 
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                           <div class="chosen-select-single">
                                               
                                                <select data-placeholder="sélectionner un module..." class="chosen-select" multiple="" tabindex="-1" name="modules[]" >
                                                       
                                            @foreach($modules as $mod)
                                      <option value="{{$mod->idMod}}">{{$mod->nom}}</option>
                                            @endforeach 
                                                    
                                                    </select>
                                            </div>
                                            </div>
                                             </div>
                                              </div>
                         <div class="login-btn-inner">
                                                                                    <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
         
                                                                                    </div>
                   <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="login-horizental">
         <button class="btn btn-sm btn-primary login-submit-cs" type="submit"id="newStud">Ajouter</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
	

</body>
</html>