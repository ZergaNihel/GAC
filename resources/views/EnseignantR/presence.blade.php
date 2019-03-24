@extends('layouts.masterEr')

@section('script1')
    <!-- modals jquery
    ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- <script>
        $(document).ready(function () {
        $('#liste').modal('show');
        $('#valider').click(function(){
                $('#liste').modal('hide');
                // $("#seancechoisi").val($('#seance').val()).change(); 
                var data = $('#popup').serialize();
                $.ajax({
                    type:'get',
                    data:data,
                    url:'presence/liste',
                    success:function(data){
                        $.each(data["etudiants"], function () {

                        $('#table').append(
                        "<tr>"+
                        "<td>"+"</td>"+
                        "<td>" + this.idEtu + "</td>"+
                        "<td>" + this.matricule + "</td>"+
                        "<td>" + this.nom + "</td>"+
                        "<td>" + this.date_naissance + "</td>"+
                        "<td>" + this.type + "</td>"+
                        "<td class='datatable-ct'>"+
                            "<div class='btn-group btn-custom-groups btn-custom-groups-one'>"+
                                "<button type='button' id='present" + this.idEtu + "'  class='pd-setting-ed'>" + "<i class='fa fa-check edu-checked-pro' aria-hidden='true'>" + "</i>" + "</button>" +
                                "<button type='button' id='absent" + this.idEtu + "'  class='pd-setting-ed'>" + "<i class='fa fa-times edu-danger-error' aria-hidden='true'>" + "</i>" + "</button>" +
                            "</div>"+
                        "</td>"+
                        "</tr>");
                         });  

                        $.each(data["justifications"], function () {
                        $('#justif').append(
                        "<tr>" +
                        "<td>" + "</td>"+
                        "<td>" + this.idEtu + "</td>"+
                        "<td>" + this.matricule + "</td>"+
                        "<td>" + this.nom + "</td>"+
                        "<td>" + this.date_naissance + "</td>"+
                        "<td>" + this.etat + "</td>"+
                        "<td>" + this.date + "</td>"+
                        "<td class='datatable-ct'>"+
                            "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>"+
                                "<div class='button-ap-list responsive-btn'>"+
                                    "<div class='button-style-three'>"+
                                        "<button type='button' id='bouttonDetail' class='btn btn-custon-rounded-four btn-primary' data-toggle='modal' data-target='#detail'>" + "<i class='fa fa-info-circle edu-informatio' aria-hidden='true'>" + "</i>" + "Détail" + "</button>" +
                                        "<button type='button' class='btn btn-custon-rounded-three btn-success'>" +"<i class='fa fa-check edu-checked-pro' aria-hidden='true'>" + "</i>" + "Accepter" + "</button>" +
                                        "<button type='button' class='btn btn-custon-rounded-three btn-danger'>" +"<i class='fa fa-times edu-danger-error' aria-hidden='true'>" + "</i>" + "Refuser" + "</button>" +
                                    "</div>" +
                                "</div>" +
                            "</div>" + 
                        "</td>"+
                        "</tr>"

                        // "<div id='detail' class='modal modal-edu-general default-popup-PrimaryModal fade' role='dialog'>"+
                        //     "<div class='modal-dialog'>"+
                        //         "<div class='modal-content'>"+
                        //             "<div class='modal-close-area modal-close-df'>"+
                        //                 "<a class='close' data-dismiss='modal' href='#'>" + "<i class='fa fa-close'>" + "</i>" + "</a>"+
                        //             "</div>"+
                        //             "<div class='modal-body'>"+
                        //                 "<div id='liensPDF' class='pdf-viewer-area pdf-single-pro'>"+
                        //                 "</div>"+
                        //             "</div>"+
                        //         "</div>"+
                        //     "</div>"+
                        // "</div>"
                        );

                        
                         });
                         $('#modalbody').append(
                            "<div id='liensPDF' class='pdf-viewer-area pdf-single-pro'>"+
                                "<a class='media' href='pdf/mamunur.pdf'>"+"</a>"+
                            "</div>"
                         );
                        alert(data["nomgroupe"]);

                       //$('#groupechoisi').append("<option value='"+ data["idgroupe"] +"' selected>"+ data["nomgroupe"] +"</option>");
                    } 
                });
        }); 
        $(document).on("click",".pd-setting-ed",function(){

            var btn_id = $(this).attr("id");

            if(btn_id.search("present"))
            {
                $(this).css("background-color", "green");
            }else if(btn_id.search("absent")){
                $(this).css("background-color", "red");
            }
        });


    //     $('#groupechoisi').change(function(){
    //         var data = $('#selectform').serialize();
    //             $.ajax({
    //                 type:'get',
    //                 data:data,
    //                 url:'presence/listes',
    //                 success:function(data){
    //                     $('#bodytablePopup').remove();
    //                     // $.each(data["etudiants"], function () {

    //                     // $('#bodytableSelect').append(
    //                     // "<tr>"+
    //                     // "<td data-checkbox='true'>"+"</td>"+
    //                     // "<td>" + this.idEtu + "</td>"+
    //                     // "<td>" + this.matricule + "</td>"+
    //                     // "<td>" + this.nom + "</td>"+
    //                     // "<td>" + this.date_naissance + "</td>"+
    //                     // "<td>" + this.type + "</td>"+
    //                     // "<td class='datatable-ct'>"+
    //                     //     "<div class='btn-group btn-custom-groups btn-custom-groups-one'>"+
    //                     //         "<button type='button' id='present" + this.idEtu + "'  class='pd-setting-ed'>" + "<i class='fa fa-check edu-checked-pro' aria-hidden='true'>" + "</i>" + "</button>" +
    //                     //         "<button type='button' id='absent" + this.idEtu + "'  class='pd-setting-ed'>" + "<i class='fa fa-times edu-danger-error' aria-hidden='true'>" + "</i>" + "</button>" +
    //                     //     "</div>"+
    //                     // "</td>"+
    //                     // "</tr>");
    //                     //  });  
    //                     alert(data["nomgroup"]);

    //                    //$('#groupechoisi').append("<option value='"+ data["idgroupe"] +"' selected>"+ data["nomgroupe"] +"</option>");
    //                 } 
    //             });
    // });


       });

      
    </script> --}}
    <script>
    //     $(document).ready(function () {
    //     // $('#valider').click(function(){
    //     //     var data = $('#accepter').serialize();
    //     //     $.ajax({
    //     //             type:'POST',
    //     //             data:data,
    //     //             url:'justifications/edit',
    //     //             success:function(data){
    //     //                 alert("success");
    //     //             }
    //     //             error: function(){
    //     //                 alert("Aucune modification n'a été enregistrée");
    //     //             }
    //     //     });
    //     // });
        

    // });
    // $(document).on("click","#test",function(){
    //     var date=$('#date').val();
    //     alert(date);
    // });
    $(document).on("click",".pd-setting-ed",function(){

        var btn_id = $(this).attr("id");
        alert(btn_id);
        
        if(!btn_id.search("present"))
        {
            var date=$('#date').val();
            var i=btn_id.substring(7,8);
            $(this).css("background-color", "green");
            $('#absent'+i).css("background-color", "#F6F8FA");
            var data = $('#formPresent'+i).serialize(); 
            alert(data);
            // $.ajax({
            //     type:'get',
            //     data:data,
            //     url:'/present',
            //     success:function(data){
            //         alert(data);
            //     }
            // });
        }
        else
        {
            var date=$('#date').val();
            var i=btn_id.substring(6,7);
            alert("identif"+i)
            alert("fdj"+$(this).attr("id"));
            $(this).css("background-color", "red");
            $('#present'+i).css("background-color", "#F6F8FA");
            var data = $('#formPresent'+i).serialize(); 
            alert(data);
            // $.ajax({
            //     type:'get',
            //     data:data,
            //     url:'/absent',
            //     success:function(data){
            //         alert(data);
            //     }
            // });
        }
    });

    </script>
@endsection

@section('path')
    <li>
        <span class="bread-blod">Présence</span>
    </li>
@endsection

@section('content')
    <!-- Static Table Start -->
    <div class="col-lg-12">
        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
            <ul id="myTabedu1" class="tab-review-design">
                <li class="active"><a href="#description">Présence</a></li>
                <li><a href="#justification">Justification</a></li>
                <li><a href="#exclus"> Liste des exclus</a></li>
                <li><a href="#historique">Historique</a></li>
            </ul>
            <div id="myTabContent" class="tab-content custom-product-edit">
                <div class="product-tab-list tab-pane fade active in" id="description">
                    <!-- Static Table Start --><button id="test" class="btn">test</button>
                    <div class="data-table-area mg-b-15">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="sparkline13-list">
                                        <div class="sparkline13-hd">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span> <br> <b>Section:</b> B</span></div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span> <br> <b>Salle:</b> {{$seance->salle}} </span></div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <div class="sparkline16-graph">
                                                            <div class="date-picker-inner">
                                                                <div class="form-group data-custon-pick" id="data_2">
                                                                    <div class="input-group date">
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                        <input type="text" class="form-control" id="date" name="date" value="" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <br><br>
                                                <div class="row">
                                                    <form id="selectform" method="get">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <div class="advanced-form-area mg-b-15">
                                                                <select id="seancechoisi" data-placeholder="Type..." class="chosen-select dynamic" tabindex="-1">
                                                                    <option value="">Séance</option>
                                                                    @foreach($seances as $seance)
                                                                        <option value=" {{$seance->idSea}} "> {{$seance->type}} {{$seance->jour}} {{$seance->heure}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <div class="advanced-form-area mg-b-15">
                                                                <select id="modulechoisi" data-placeholder="Module..." class="chosen-select dynamic" tabindex="-1">
                                                                        <option value="">Module</option>
                                                                        @foreach($modules as $module)
                                                                            <option value=" {{$module->idMod}} "> {{$module->nom}} </option>
                                                                        @endforeach 
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <div class="advanced-form-area mg-b-15">
                                                                <select id="groupechoisi" data-placeholder="Groupe..." class="chosen-select dynamic" tabindex="-1">
                                                                        <option value="">Groupe</option>
                                                                        @foreach($groupes as $groupe)
                                                                            <option value=" {{$groupe->idG}} "> {{$groupe->nomG}} </option>
                                                                        @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <div id="toolbar">
                                                    <select class="form-control dt-tb">
                                                        <option value="">Export Basic</option>
                                                        <option value="all">Exporter tout le tableau</option>
                                                        <option value="selected">Exporter les lignes selectionnées </option>
                                                    </select>
                                                </div>
                                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                                    data-cookie-id-table="saveId" data-show-export="true"  data-toolbar="#toolbar">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="state" data-checkbox="true"></th>
                                                            <th data-field="id">No</th>
                                                            <th data-field="Matricule" data-editable="true">Matricule</th>
                                                            <th data-field="Nom_Prenom" data-editable="true">Nom_Prenom</th>
                                                            <th data-field="Date" data-editable="true">Date de naissance</th>
                                                            <th data-field="Etat" data-editable="true">Etat</th>
                                                            <th data-field="action">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="bodytablePopup">
                                                        @foreach($etudiants as $etudiant)
                                                        <tr>
                                                            <td></td>
                                                            <td> {{$etudiant->idEtu}} </td>
                                                            <td>{{$etudiant->matricule}}</td>
                                                            <td>{{$etudiant->nom}} {{$etudiant->prenom}}</td>
                                                            <td>{{$etudiant->date_naissance}}</td>
                                                            <td class="datatable-ct">{{$etudiant->type}}</td>
                                                            <td class="datatable-ct">
                                                                <div class="btn-group btn-custom-groups btn-custom-groups-one">
                                                                    <form id="formPresent{{$etudiant->idEtu}}">
                                                                        <input type="hidden" id="etudiant" name="etudiant" value="{{$etudiant->idEtu}}">
                                                                        <input type="hidden" id="module" name="module" value="{{$idmodule}}">
                                                                        <input type="hidden" id="groupe" name="groupe" value="{{$idgroupe}}">
                                                                        <input type="hidden" id="seance" name="seance" value="{{$idseance}}">
                                                                        <button type="button" id="present{{$etudiant->idEtu}}"  class="pd-setting-ed"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i></button>
                                                                    </form> 
                                                                    
                                                                    <form id="formPresent{{$etudiant->idEtu}}">
                                                                        <input type="hidden" id="etudiant" name="etudiant" value="{{$etudiant->idEtu}}">
                                                                        <input type="hidden" id="module" name="module" value="{{$idmodule}}">
                                                                        <input type="hidden" id="groupe" name="groupe" value="{{$idgroupe}}">
                                                                        <input type="hidden" id="seance" name="seance" value="{{$idseance}}">
                                                                        <button type="button" id="absent{{$etudiant->idEtu}}"  class="pd-setting-ed"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i></button>
                                                                    </form>
                                                                </div> 
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-tab-list tab-pane fade" id="justification">
                    <!-- Static Table Start -->
                    <div class="data-table-area mg-b-15">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="sparkline13-list">
                                            
                                            <div class="sparkline13-graph">
                                                <div class="datatable-dashv1-list custom-datatable-overright">
                                                    <div id="toolbar2">
                                                        <select class="form-control dt-tb">
                                                            <option value="">Export Basic</option>
                                                            <option value="all">Exporter tout le tableau</option>
                                                            <option value="selected">Exporter les lignes selectionnées </option>
                                                        </select>
                                                    </div>
                                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                                        data-cookie-id-table="saveId" data-show-export="true"  data-toolbar="#toolbar2">
                                                        <thead>
                                                            <tr>
                                                                <th data-field="state" data-checkbox="true"></th>
                                                                <th data-field="id">No</th>
                                                                <th data-field="Matricule" data-editable="true">Matricule</th>
                                                                <th data-field="Nom_Prenom" data-editable="true">Nom_Prenom</th>
                                                                <th data-field="Date" data-editable="true">Date de naissance</th>
                                                                <th data-field="Etat" data-editable="true">Etat</th>
                                                                <th data-field="absences">date d'absence</th>
                                                                <th data-field="action">Justification</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="justif">
                                                            @php $No=0 @endphp
                                                            @foreach($justifications as $justification)
                                                             <tr>
                                                                <td></td>
                                                                <td>{{$No+1}}</td>
                                                                <td>{{$justification->matricule}}</td>
                                                                <td>{{$justification->nom}} {{$justification->prenom}}</td>
                                                                <td>{{$justification->date_naissance}}</td>
                                                                <td class="datatable-ct">{{$justification->etat}}</td>
                                                                <td class="datatable-ct">{{$justification->date}}</td>
                                                                <td class="datatable-ct">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="button-ap-list responsive-btn">
                                                                                <div class="button-style-three">
                                                                                    <button type="button" class="btn btn-custon-rounded-four btn-primary" data-toggle="modal" data-target="#detail"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i> Détail</button>
                                                                                    <form id="accepter">
                                                                                        <input type="hidden" name="idjustification" value=" {{$justification->idAbs}} ">
                                                                                        <button type="submit" id="valider" class="btn btn-custon-rounded-three btn-success"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Accepter</button>
                                                                                    </form>
                                                                                    <form id="refuser">
                                                                                        <input type="hidden" name="idjustification" value=" {{$justification->idAbs}} ">
                                                                                        <button type="button" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Refuser</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                    </div> 
                                                                </td>
                                                            </tr>
                                                            
                                                            <div id="detail" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-close-area modal-close-df">
                                                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                        </div>
                                                                        <div class="modal-body" id="modalbody">
                                                                            <div id="liensPDF" class="pdf-viewer-area pdf-single-pro">
                                                                                <a class="media" href=" {{asset($justification->justification)}} "></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="product-tab-list tab-pane fade" id="exclus">
                    <!-- Static Table Start -->
                    <div class="data-table-area mg-b-15">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="sparkline13-list">
                                        
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <div id="toolbar3">
                                                    <select class="form-control dt-tb">
                                                        <option value="">Export Basic</option>
                                                        <option value="all">Exporter tout le tableau</option>
                                                        <option value="selected">Exporter les lignes selectionnées </option>
                                                    </select>
                                                </div>
                                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                                    data-cookie-id-table="saveId" data-show-export="true"  data-toolbar="#toolbar3">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="state" data-checkbox="true"></th>
                                                            <th data-field="id">No</th>
                                                            <th data-field="Matricule" data-editable="true">Matricule</th>
                                                            <th data-field="Nom_Prenom" data-editable="true">Nom_Prenom</th>
                                                            <th data-field="Date" data-editable="true">Date de naissance</th>
                                                            <th data-field="Etat" data-editable="true">Etat</th>
                                                            <th data-field="absences">Nombre d'absences</th>
                                                            <th data-field="action">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td>1</td>
                                                            <td>17009215</td>
                                                            <td>Kalfat Hind</td>
                                                            <td>03/03/1998</td>
                                                            <td class="datatable-ct">N</td>
                                                            <td class="datatable-ct">3</td>
                                                            <td class="datatable-ct">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                        <div class="button-ap-list responsive-btn">
                                                                            <div class="button-style-three">
                                                                                <button type="button" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Exclure</button>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>2</td>
                                                            <td>17009216</td>
                                                            <td>Bachiri Wahiba</td>
                                                            <td>27/04/1997</td>
                                                            <td class="datatable-ct">N</td>
                                                            <td class="datatable-ct">5</td>
                                                            <td class="datatable-ct">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="button-ap-list responsive-btn">
                                                                        <div class="button-style-three">
                                                                            <button type="button" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Exclure</button>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>3</td>
                                                            <td>17009217</td>
                                                            <td>Zerga Nihel</td>
                                                            <td>26/02/1998</td>
                                                            <td class="datatable-ct">N</td>
                                                            <td class="datatable-ct">8</td>
                                                            <td>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="button-ap-list responsive-btn">
                                                                        <div class="button-style-three">
                                                                            <button type="button" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Exclure</button>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>4</td>
                                                            <td>17009218</td>
                                                            <td>kyum@frok.com</td>
                                                            <td>+8801962066547</td>
                                                            <td class="datatable-ct">R </td>
                                                            <td class="datatable-ct">3</td>
                                                            <td class="datatable-ct"> 
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="button-ap-list responsive-btn">
                                                                        <div class="button-style-three">
                                                                            <button type="button" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Exclure</button>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-tab-list tab-pane fade" id="historique">
                    <div class="calender-area mg-b-15">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="calender-inner">
                                        <div id='calendar'></div>
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

@section('script2')

    {{-- <script>
        $document.ready(function(){
            $('#valider').click(function(){
                $('#liste').modal('hide');
                var data = $('#popup').serialize();
                alert(data);
                // $.ajax({
                //     type:'get',
                //     data:data,
                //     url:'presence/liste',
                //     success:function
                // })

            })
        })
    </script> --}}

    <script>
        function presence(test) {
           if(test==1)
           {
               document.getElementById("pr").style.backgroundColor= '#1DC712';
               document.getElementById("abs").style.backgroundColor= '#f6f8fa';
           }
 
           else
           {
               document.getElementById("abs").style.backgroundColor= '#FF3737';
               document.getElementById("pr").style.backgroundColor= '#f6f8fa';
           }
             
        }
    </script>
         

@endsection