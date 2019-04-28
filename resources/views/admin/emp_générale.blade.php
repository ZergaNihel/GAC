@extends('layouts.header')

@section('title','groupes')
@section('js')
<script >
	$(document).ready(function(){
		$(".chosen-select").chosen();
 //alert("hii");	
	 $("#nouvel").on('show.bs.modal', function(event) {
	 	$(".chosen-select").chosen();
 //alert("hii");	
	 });
	});
</script>
@endsection
 
     @section('sidebar')
  
     @include('layouts.sidebarAdmin2')

     @endsection
    @section('mobileSidebar')
  
     @include('layouts.mobileSidebar2')

     @endsection

    
                                        @section('search')
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Semestre</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">{{$semestre->nomSem}}/Emploi du Temps</span>
                                            </li>
                                        </ul>
                                        @endsection
@section('content')
 <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                

                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="product-status-wrap drp-lst">
                            <h4>Emploi du temps</h4>
                            <br>
                            <div class="row ">           
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              
                    <label class="login2"> Module</label>  
                   <div class="form-group">
                  
      <input name="nameasset" type="text" class="form-control" id="nameMod" value="Module" readonly>
                  
           
                            </div>
                  
                                                        
                                                            </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class="login2"> Module</label>  
                                                    <div class="form-group">
                                                        <div class="chosen-select-single mg-b-20">
                                        
          <form action="{{url('empMod')}}" method="post" id="selectMod">
                                      {!! csrf_field() !!}
         <select data-placeholder="Choose a Country..." id="selMod" class="chosen-select" tabindex="-1" name="moduleCh">
               <option value="" selected>Selectionner</option>
                @foreach($mods as $m)
                <option value="{{$m->idMod}}">{{$m->nom}} ({{$m->code}})</option> 
               @endforeach
                                                      
                                                        
         </select>
        </form>
                                            </div>
                                                               
                                                       </div>
                                                          
                                                            </div>
                            
                                                        </div></div>
                                                      </div>
                                                    </div>
                                                    </div>
                                                    </div>

 <div class="product-status mg-b-15" id="tabEmpTemps" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                          <div class="asset-inner table-responsive">
                                <table>
                                    <tr><th></th>
                                        <th>8h30</th>
                                        <th>10h</th>
                                        <th>11h30</th>
                                        <th>13h</th>
                                        <th>13h30</th>
                                        <th>15h</th>
                                        <th>16h30</th>
                                    </tr>
                                     <tr>
                                        <th >Dimanche</th>
                                        <td id="D8"></td>
                                        <td id="D10"></td>
                                        <td id="D11"></td>
                                         <td></td>
                                        <td id="D13"></td>
                                        <td id="D15"></td>
                                        <td></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <th>Lundi</th>
                                        <td id="L8"></td>
                                        <td id="L10"></td>
                                        <td id="L11"></td>
                                         <td></td>
                                        <td id="L13"></td>
                                        <td id="L15"></td>
                                        <td></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <th>Mardi</th>
                                        <td id="Ma8"></td>
                                        <td id="Ma10"></td>
                                        <td id="Ma11"></td>
                                         <td></td>
                                        <td id="Ma13"></td>
                                        <td id="Ma15"></td>
                                        <td></td>

                                       
                                       
                                    </tr>
                                    <tr>
                                        <th>Mercredi</th>
                                        <td id="Me8"></td>
                                        <td id="Me10"></td>
                                        <td id="Me11"></td>
                                         <td></td>
                                        <td id="Me13"></td>
                                        <td id="Me15"></td>
                                        <td></td>
                                       
                                       
                                    </tr>
                                    <tr>
                                        <th>Jeudi</th>
                                        <td id="J8"></td>
                                        <td id="J10"></td>
                                        <td id="J11"></td>
                                         <td></td>
                                        <td id="J13"></td>
                                        <td id="J15"></td>
                                        <td></td>
                                       
                                       
                                    </tr>
                                </table>
                            </div>
                     
                        </div>
                      </div>
                    </div>
 </div>
                    </div>


<!--            modal     -->
<div class="modal-area-button" id="poptp">
	<a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#Informationpro" data-id="" data-seance="" data-enseignant="" data-groupe=""> voir</a> </div>
	  <div id="Informationpro" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog"><div class="modal-dialog">
	  	<div class="modal-content"><div class="modal-close-area modal-close-df"><a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a></div>
	  	<div class="modal-body">
	  		<div class="product-payment-inner-st">
	  			
	  			<div class="row">
	  						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="review-content-section">
	  							<span class="educate-icon educate-info modal-check-pro information-icon-pro"></span><h2 style="color:#8e44ad;">Travaux Pratique (TP)!</h2><br><div class="row">
	  								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Enseignant </h4></div>
	  								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">jjj</p></div></div>
	  								<div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
	  									<h4>Seance </h4></div>
	  									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">ggg</p></div></div><div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4>Groupe  </h4></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left"><p style="text-align: left">kk</p></div></div>
	  									<br>
	  									<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="devit-card-custom" ><a style="background-color:#8e44ad; border-color:#8e44ad; " data-dismiss="modal" href="#" class="btn btn-info waves-effect waves-light pull-right" >Annuler</a></div></div></div>
	  								</div></div>
	  								<div class="product-tab-list tab-pane fade" id="reviews">
	  									
				<div class="row">
	  						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	  							<div class="review-content-section">
	  							<span class="educate-icon educate-info modal-check-pro information-icon-pro"></span><h2 style="color:#8e44ad;">Travaux Pratique (TP)!</h2><br><div class="row">
	  								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><h4>Enseignant </h4></div>
	  								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
	  									<div class="form-group-inner"><div class="chosen-select-single mg-b-20"><select id="" name="idsec" class="chosen-select" id="group" tabindex="-1"> <option value="" disabled selected>Select your option</option>
                                    @foreach($pro as $p)<option value="{{$p->idEns}}">{{$p->nom}}{{$p->nom}} </option>@endforeach</select></div></div>
	  								</div></div>
	  								<div class="row">
	  									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	  									<h4>Seance </h4></div>
	  									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	  										<div class="form-group-inner"  id="module">
	  										<div class="chosen-select-single">
	  											<select id="" data-placeholder="Choisir une seance" class="chosen-select" multiple="multiple" id="seance" name="idsea[]">@foreach($seancesTP as $sea)
	  											<option value="{{$sea->idSea}}">{{$sea->jour}} {{$sea->heure}} {{$sea->salle}}</option>
	  										@endforeach</select>
	  									</div>
	  									</div>
	  								   </div>
	  								</div>
	  								<br>
	  									<div class="row">
	  										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><h4>Groupe  </h4></div>
	  										<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	  											<div class="form-group-inner">
	  												<div class="chosen-select-single mg-b-20"><select id="secC" name="idsec" class="chosen-select" id="group" tabindex="-1">
	  												 <option value="" disabled selected>Select your option</option>
                                    @foreach($sec as $s)<option value="{{$s->idSec}}">{{$s->nomSec}} </option>@endforeach</select></div></div></div></div>
                                    	<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="devit-card-custom"><a style="background-color:#8e44ad; border-color:#8e44ad; " href="#" class="btn btn-primary waves-effect waves-light">Modifier</a></div></div></div>

	  								</div>


	  									

	  							</div></div>




	  								</div>
	  							</div>
	  						</div></div></div>
	  					</div></div>






	  				</div>

@endsection