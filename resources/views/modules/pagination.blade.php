                               <table>
                                    <tr>
                                        
                                        <th>Module</th>
                                        <th>Code</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Semestre </th>
                                       
                                        <th>Actions</th>
                                    </tr>
                                    
                                    @foreach($modules as $m)
                                    <tr id="{{$m->idMod}}">
                                       
                                        <td id="nom{{$m->idMod}}"> {{$m->nom}}</td>
                                        
                                        <td id="code{{$m->idMod}}">{{$m->code}}</td>
                                        <td id="type{{$m->idMod}}">{{$m->type}}</td>
                                        <td id="active{{$m->idMod}}">
                                        @if($m->sem1 != null)
                                            @if($m->semestre == $s1)
                                            <button class="pd-setting">Active</button>
                                            @elseif($m->semestre == $s2)
                                            <button class="ps-setting">Active</button>
                                            @else
                                             <button class="ds-setting">Désactivé</button>
                                             @endif
                                        @else
                                             <button class="ds-setting">Désactivé</button>
                                        @endif
                                        </td>
                                        <td id="semestre{{$m->idMod}}">
                                        @if($m->sem1 != null)
                                             @if($m->sem1->active == 1)
                                             {{$m->sem1->nomSem}}
                                              @else
                 Aucun
                                           
                                             @endif
                                        @else
        
                   Aucun
                                      

                                        @endif
                                        </td>
                                      
                                        <td id="action{{$m->idMod}}">
                                             <a data-toggle="tooltip" href="{{url('modules/details/'.$m->idMod)}}" title="Détails" class="btn btn-default" ><i class="fa fa-book" aria-hidden="true"></i></a><a id="edita" data-toggle="modal"  href="#" title="Modifier" class="btn btn-default" data-target="#EditModule" data-id="{{$m->idMod}}" data-nom="{{$m->nom}}" data-code = "{{$m->code}}" data-type = "{{$m->type}}" data-semestre="{{$m->semestre}}" data-responsable="{{$m->ens_responsable}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a><button data-toggle="tooltip" title="supprimer" class="btn btn-danger" id="deleteMod{{$m->idMod}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                       
                                        </td>
                                    </tr>
                                    
                                    @endforeach
            

                                    
                                    
                                </table>
                        
                            <!-- start edit -->

     <div id="EditModule" class="modal modal-edu-general modal-zoomInDown fade" role="dialog">
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
                                                     <h3>Modifier le module</h3>
                            <p>Modifier le module</p>
                                         <div class="alert alert-danger alert-block" style="display: none;" id="error">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>Vous devez remplisser tout les champs</strong>
   </div>
             <form action="{{url('EditModule')}}" method="post" id="formEditMod" >
                                  {{ csrf_field() }}
                                  <input type="hidden" name="idMod" id="idMod">
                         <div class="form-group-inner">
                  <div class="row">
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <label class="login2">Intitulé</label>
                                                                                        </div>
                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                              <input type="text" class="form-control" placeholder="Nom de module"  name="nom" id="nom" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
         <div class="form-group-inner"> <div class="row">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <label class="login2">Code</label>
                                                                                        </div>
               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                     <input type="text" class="form-control" placeholder="Code" name="code" id="code" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                          <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2">Type</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                     <div class="chosen-select-single mg-b-20">
                                               
 <select data-placeholder="Choisir un type" class="chosen-select" tabindex="-1" name="type" id="type" >
                          <option value="CTT">(CTT)Cours/Tp/TD</option>
                         <option value="CTd">(CTd)Cours/TD</option>
                            <option value="Cour">Cour</option>
                            <option value="TP">TP</option>
                                                    </select>
                                            </div>
                 
                                                            </div>
                                                        </div>
                                                    </div>
                         <div class="login-btn-inner">
  <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                <label class="login2">Semestre </label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                                <div class="bt-df-checkbox pull-left">
                                                                 
                                                  <script type="text/javascript">
    
    function fct1(){
    
       
document.getElementById('enseignant1').style.display = "none";
        }
         function fct2(){
       
document.getElementById('enseignant1').style.display = "";
  }
</script>                      
                                                              
                                                         
                                                               
          <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                   <div >
@foreach ($sem1 as $key ) 
                                                                    <label>
                <input type="radio" value="{{$key->idSem}}"  onchange="fct2();" id="s1" name="semestre1"> <i></i> Semestre 1</label>
                     @endforeach
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                       <div class="row">
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div >
                    @foreach ($sem2 as $key )
                                                                       <label>
         <input type="radio" value="{{$key->idSem}}"  onchange="fct2();" id="s2" name="semestre1"> <i></i> Semestre 2</label>
              @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                           <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div >
                                                                                <label>
               <input type="radio" value="0" name="semestre1" onchange="fct1();" id="auc"> <i></i> Aucun </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                             
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                         
                                                    </div>
              <div class="form-group-inner" style="display: none;" id="enseignant1">
                                                        <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <label class="login2">Enseignant Responsable</label></div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
           <div class="chosen-select-single mg-b-20">
                                               
    <select data-placeholder="Choisir un type" class="chosen-select" tabindex="-1" name="enseignant" id="enseignant12">
                                                               
               @foreach($ens as $e)
                  <option value="{{$e->idEns}}">{{$e->nom}} {{$e->prenom}}</option>
                @endforeach
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                   <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="login-horizental">
 <button class="btn btn-sm btn-primary login-submit-cs" type="button" id="ModEditBtn">Modifier</button>

</div>
      </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
             <div class="login-horizental">
  <button data-dismiss="modal" href="#" class="btn btn-sm btn-primary login-submit-cs" type="button" >Annuler</button> </div>
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

    <!-- start delete -->
      <div id="delete" class="modal modal-edu-general modal-zoomInDown fade" role="dialog" >
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-close-area modal-close-df">
                                                            <a class="close" data-dismiss="modal" href="#"  style="background: #d80027"><i class="fa fa-close"></i></a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="modal-login-form-inner">
                                            <span class="educate-icon educate-danger modal-check-pro information-icon-pro" style="color: #d80027"></span>
                                        <h2>Suppression !</h2>
                                        <p>Vous ne pouvez pas supprimer le module : <b></b><br> Vous devez d'abord le désactiver </p>
                                         </div>
                                                        </div>
<div class="modal-footer danger-md"><a data-dismiss="modal" href="#"  style="background: #d80027">Annuler</a></div>
                                                    </div>
                                                </div>
                                            </div>