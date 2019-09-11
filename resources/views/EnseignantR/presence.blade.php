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
    // $("#date").datepicker({
    //     onSelect: function() {
    //         $("#absent1").attr("disabled", false);
    //     }
    // });
    // $(document).on("select","#date",function(){
    //     $("#absent1").attr("disabled", false);
    // });

    $(document).on("click",".pd-setting-ed",function(){

        var btn_id = $(this).attr("id");
        var NbEtu=$('#NbEtu').val();
        
        if(!btn_id.search("present"))
        {
            var date=$('#date').val();
            var i=btn_id.substring(7,btn_id.length);
            $('#datep'+i).val(date);
            $(this).css("background-color", "green");
            $('#absent'+i).css("background-color", "#F6F8FA");
            var data = $('#formPresent'+i).serialize(); 
            $.ajax({
                type:'get',
                data:data,
                url:'/present',
                success:function(data){
                    if(data == NbEtu)
                    {
                        $('.btn-default').attr('disabled',false); 
                    }
                }
            });
        }
        else
        {
            var date=$('#date').val();
            var i=btn_id.substring(6,btn_id.length);
            
            $('#datep'+i).val(date);
            $(this).css("background-color", "red");
            $('#present'+i).css("background-color", "#F6F8FA");
            var data = $('#formPresent'+i).serialize(); 
            $.ajax({
                type:'get',
                data:data,
                url:'/absent',
                success:function(data){
                    if(data == NbEtu)
                    {
                        $('.btn-default').attr('disabled',false); 
                    }
                }
            });
        }
    });

    </script>

<script>
        // JUSTIFICATIONS
        $(document).on("click",".btn-success",function(){
            var btn_id = $(this).attr("id");
            var i=btn_id.substring(7,btn_id.length);
            var data = $('#editA'+i).serialize();
            $.ajax({
                    type:'post',
                    data:data,
                    url:'/justifications/accepter',
                    success:function(data){
                        $('#accp').remove();
                        $('#ref').remove();
                        $('#det'+i).append('<div class="col-lg-3"></div><div class="col-lg-6 mg-t-15"><div class="pull-left"><h5 style="color:green;text-align:center">Acceptée</h5></div></div>')
                    }
            });
    
        });
</script>
<script>       
            $(document).on("click",".btn-danger ",function(){
             var btn_id = $(this).attr("id");
             var i=btn_id.substring(7,btn_id.length);
             var data = $('#editR'+i).serialize();
             $.ajax({
                     type:'post',
                     data:data,
                     url:'/justifications/refuser',
                     success:function(data){
                          $('#accp').remove();
                          $('#ref').remove();
                          $('#det'+i).append('<div class="col-lg-3"></div><div class="col-lg-6 mg-t-15"><h5 class="pull-left" style="color:red;text-align:center">Refusée</h5></div>')
                     }
             });
        
            });
</script>

 <script>
     //date 
     $(document).ready(function () {
        
         $('#date').unbind('change').change(function(){
             
             var d=$('#date').val();
             if(d == null && d == "")
             {
                 $('.pd-setting-ed').attr('disabled',true);
                 
             }
             else{
                $('.pd-setting-ed').attr('disabled',false);
                $('.pd-setting-ed').prop('title','');
             }
             
         });
    });
 </script>

 <script>
     //Reinitialiser
     $(document).ready(function () {
        $(document).on("click","#Reinitialiser",function(){
            var d=$('#date').val();
            var td_tp=$('#id_td_tp').val();
            var abs=0;
            var NbEtu=$('#NbEtu').val();
            var sem=$('#idS').val();
            $('.pd-setting-ed').each(function() {
                                        if( $(this).css("background-color")=="rgb(0, 128, 0)" ) 
                                        {
                                        }
                                        else if ( $(this).css("background-color")=="rgb(255, 0, 0)" )
                                        {
                                            abs++;
                                        }
                                    });
            var pourc = (abs*100)/NbEtu;
            var pourcentage = pourc.toFixed(2);
            $('#hist').append(
                '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">'+
                    '<div class="analytics-edu-wrap res-tablet-mg-t-30 dk-res-t-pro-30">'+
                        '<div class="skill-content-3 analytics-edu analytics-edu2">'+
                            '<div class="skill">'+
                                '<div class="progress progress-bt">'+
                                    '<div class="lead-content">'+
                                        '<h3> <a href="{!! asset("historique/'+d+'/'+td_tp+'/'+sem+'") !!}"> '+ d +' </a> </h3>'+
                                        '<p> '+abs+' absent(s)</p>'+
                                    '</div>'+
                                    '<div class="progress-bar wow fadeInLeft" data-progress="'+pourcentage+'%" style="width: '+pourcentage+'%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span style="left:35px;">'+pourcentage+'%</span> </div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            );
            $('#date').val('');
            $('.pd-setting-ed').each(function() {
                                        $( this ).css("background-color", "#F6F8FA");
                                    });
            $('.btn-default').attr('disabled',true); 
            
        });
     });
 </script>

 <script>
     //exclure
    $(document).on("click",".exc",function(){
        var btn_id = $(this).attr("id");
        var i=btn_id.substring(6,btn_id.length);
        var data = $('#exclusform'+i).serialize();
        $.ajax({
            type:'get',
            data:data,
            url:'/exclure/etudiant',
            success:function(data){
                $('#rowExc'+i).remove();
                $('#rowEtu'+i).remove();
            }
        });

    });
 </script>
 <script>
     $(window).resize(function(){     

        if ($('header').width() <= 600 ){

           // alert("bjr");
           BootstrapTable.prototype.onSort = function (event) {
            $('button[name=toggle]').toggleView(); 
        }

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
<input type="hidden" id="idS" value="{{$semestre->idSem}}">
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
                    <!-- Static Table Start -->
                    <div class="data-table-area mg-b-15">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="sparkline13-list">
                                        <div class="sparkline13-hd">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><span> <br> <b>Section:</b> {{$section[0]->nomSec}} </span></div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><span> <br> <b>Salle:</b> {{$seance->salle}} </span></div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                                        <div class="sparkline16-graph">
                                                            <div class="date-picker-inner">
                                                                <div class="form-group data-custon-pick" id="data_2">
                                                                    <div class="input-group date">
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                        <input type="text" class="form-control" id="date" name="date" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-4">
                                                        <button type="button" class="btn btn-default mg-tb-10" id="Reinitialiser" style="height: 40px;" title="Réinitialiser" disabled><i class="glyphicon glyphicon-refresh icon-refresh"></i></button>
                                                    </div>
                                                </div>
                                                
                                                {{-- <br><br>
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
                                                </div> --}}
                                                
                                            </div>
                                        </div>
                                        <input type="hidden" id="NbEtu" value="{{$NbEtu}}">
                                        <input type="hidden" id="id_td_tp" value="{{$id_td_tp}}">
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <div id="toolbar">
                                                    <select class="form-control dt-tb">
                                                        <option value="">Export Basic</option>
                                                        <option value="all">Exporter tout le tableau</option>
                                                        <option value="selected">Exporter les lignes selectionnées </option>
                                                    </select>
                                                </div>
                                                <table id="table" data-toggle="table" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                                    data-cookie-id-table="saveId" data-show-export="true"  data-toolbar="#toolbar">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="state" data-checkbox="true"></th>
                                                            <th data-field="id">No</th>
                                                            <th data-field="Matricule">Matricule</th>
                                                            <th data-field="Nom_Prenom">Nom_Prenom</th>
                                                            <th data-field="Date">Date de naissance</th>
                                                            <th data-field="Etat">Etat</th>
                                                            <th data-field="action">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="bodytablePopup">
                                                        @php $No=1 @endphp
                                                        @foreach($etudiants as $etudiant)
                                                        <tr id="rowEtu{{$etudiant->idEtu}}">
                                                            <td></td>
                                                            <td>{{$No++}}</td>
                                                            <td>{{$etudiant->matricule}}</td>
                                                            <td>{{$etudiant->nom}} {{$etudiant->prenom}}</td>
                                                            <td>{{$etudiant->date_naissance}}</td>
                                                            <td class="datatable-ct">{{$etudiant->type}}</td>
                                                            <td class="datatable-ct">
                                                                <div class="btn-group btn-custom-groups btn-custom-groups-one">
                                                                    <div class="row" style="width:90px;">
                                                                        <div class="col-lg-5">
                                                                            <form id="formPresent{{$etudiant->idEtu}}">
                                                                                <input type="hidden" id="etudiant" name="etudiant" value="{{$etudiant->idEtu}}">
                                                                                <input type="hidden" id="module" name="module" value="{{$idmodule}}">
                                                                                <input type="hidden" id="groupe" name="groupe" value="{{$idgroupe}}">
                                                                                <input type="hidden" id="seance" name="seance" value="{{$idseance}}">
                                                                                <input type="hidden" id="datep{{$etudiant->idEtu}}" name="datep" value="">
                                                                                <button type="button" name="present" id="present{{$etudiant->idEtu}}" title="veuillez d'abord renseigner la date"  class="pd-setting-ed" disabled><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i></button>
                                                                            </form> 
                                                                        </div>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <div class="col-lg-3">
                                                                                 <form id="formPresent{{$etudiant->idEtu}}">
                                                                                    <input type="hidden" id="etudiant" name="etudiant" value="{{$etudiant->idEtu}}">
                                                                                    <input type="hidden" id="module" name="module" value="{{$idmodule}}">
                                                                                    <input type="hidden" id="groupe" name="groupe" value="{{$idgroupe}}">
                                                                                    <input type="hidden" id="seance" name="seance" value="{{$idseance}}">
                                                                                    <input type="hidden" id="datep{{$etudiant->idEtu}}" name="datep" value="">
                                                                                    <button type="button" name="absent" id="absent{{$etudiant->idEtu}}" title="veuillez d'abord renseigner la date"  class="pd-setting-ed" disabled><i class="fa fa-times edu-danger-error" aria-hidden="true"></i></button>
                                                                                </form>  
                                                                        </div>
                                                                    </div>
                                                                    
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
                                                            <th data-field="Matricule">Matricule</th>
                                                            <th data-field="Nom_Prenom">Nom_Prenom</th>
                                                            <th data-field="Date">Date de naissance</th>
                                                            <th data-field="Etat">Etat</th>
                                                            <th data-field="absences">date d'absence</th>
                                                            <th data-field="action">Justification</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="justif">
                                                        @php $No=1 @endphp
                                                        @foreach($justifications as $justification)
                                                        <tr id="row{{$justification->idAbs}}">
                                                            <td></td>
                                                            <td>{{$No++}}</td>
                                                            <td>{{$justification->matricule}}</td>
                                                            <td>{{$justification->nom}} {{$justification->prenom}}</td>
                                                            <td>{{$justification->date_naissance}}</td>
                                                            <td class="datatable-ct">{{$justification->type}}</td>
                                                            <td class="datatable-ct">{{$justification->date}}</td>
                                                            @if ($justification->etat_just == 2)
                                                                <td class="datatable-ct">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="button-ap-list responsive-btn">
                                                                        <div class="button-style-three">
                                                                            <div class="row" id="det{{$justification->idAbs}}" >
                                                                                <div class="col-lg-3">
                                                                                    <button type="button" class="btn btn-custon-rounded-four btn-primary" data-toggle="modal" data-target="#detail{{$justification->matricule}}"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i> Détail</button>
                                                                                </div>
                                                                                <div class="col-lg-4" id="accp">
                                                                                    <form id="editA{{$justification->idAbs}}" method="POST">
                                                                                        {{ csrf_field() }}
                                                                                        <input type="hidden" id="idjustification" name="idjustification" value="{{$justification->idAbs}}">
                                                                                        <button type="button" id="valider{{$justification->idAbs}}" class="btn btn-custon-rounded-three btn-success"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Accepter</button>
                                                                                    </form>
                                                                                </div>  
                                                                                <div class="col-lg-4" id="ref">
                                                                                    <form id="editR{{$justification->idAbs}}" method="POST">
                                                                                        {{ csrf_field() }}
                                                                                        <input type="hidden" id="idjustification" name="idjustification" value="{{$justification->idAbs}}">
                                                                                        <button type="button" id="refuser{{$justification->idAbs}}" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Refuser</button>
                                                                                    </form>
                                                                                </div> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                </td>
                                                            @elseif ($justification->etat_just == 1)
                                                                <td class="datatable-ct">
                                                                    <div class="col-lg-6">
                                                                        <button type="button" class="btn btn-custon-rounded-four btn-primary" data-toggle="modal" data-target="#detail{{$justification->matricule}}"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i> Détail</button>
                                                                    </div>
                                                                    <div class="col-lg-6 mg-t-15 pull-center">
                                                                        <h5 style="color:green">Acceptée</h5> 
                                                                    </div>
                                                                </td>
                                                            @elseif ($justification->etat_just == 0)
                                                                <td class="datatable-ct">
                                                                    <div class="col-lg-6">
                                                                        <button type="button" class="btn btn-custon-rounded-four btn-primary" data-toggle="modal" data-target="#detail{{$justification->matricule}}"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i> Détail</button>
                                                                    </div>
                                                                    <div class="col-lg-6 mg-t-15 pull-center">
                                                                        <h5 style="color:red">Refusée</h5> 
                                                                    </div>
                                                                </td>
                                                            @endif
                                                            
                                                        </tr>
                                                        
                                                        <div id="detail{{$justification->matricule}}" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-close-area modal-close-df">
                                                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                    </div>
                                                                    <div class="modal-body" id="modalbody">
                                                                        <div id="liensPDF" class="pdf-viewer-area pdf-single-pro">
                                                                            <a class="media" href="{{asset($justification->justification)}}"></a>
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
                                                            <th data-field="Matricule">Matricule</th>
                                                            <th data-field="Nom_Prenom">Nom_Prenom</th>
                                                            <th data-field="Date">Date de naissance</th>
                                                            <th data-field="Etat">Etat</th>
                                                            <th data-field="absences">Nombre d'absences</th>
                                                            <th data-field="action">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $N=0 @endphp
                                                        @php $No=1 @endphp
                                                        @if($exclus)
                                                            @foreach($exclus as $e)
                                                            <tr id="rowExc{{$e->idEtu}}">
                                                                <td></td>
                                                                <td>{{$No++}}</td>
                                                                <td> {{$e->matricule}} </td>
                                                                <td>{{$e->nom}} {{$e->prenom}}</td>
                                                                <td>{{$e->date_naissance}}</td>
                                                                <td class="datatable-ct">{{$e->type}}</td>
                                                                <td class="datatable-ct">{{$abs[$N++]}}</td>
                                                                <td class="datatable-ct">
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="button-ap-list responsive-btn">
                                                                                <div class="button-style-three">
                                                                                    <form id="exclusform{{$e->idEtu}}">
                                                                                        <input type="hidden" name="module" value="{{$idmodule}}">
                                                                                        <input type="hidden" id="etudiant" name="etudiant" value="{{$e->idEtu}}">
                                                                                        <button type="button" id="exclus{{$e->idEtu}}" class="btn btn-custon-rounded-three btn-danger exc"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Exclure</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        @endif
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
                    <div class="dashtwo-order-area mg-tb-30">
                        <div class="container-fluid">
                            <div class="row" id="hist">
                                @php $i=0; $j=0; @endphp
                                @foreach ($historiques as $historique)
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <div class="analytics-edu-wrap res-tablet-mg-t-30 dk-res-t-pro-30">
                                            <div class="skill-content-3 analytics-edu analytics-edu2">
                                                <div class="skill">
                                                    <div class="progress progress-bt">
                                                        <div class="lead-content">
                                                            <h3> <a href="{{url('historique/'.$historique->date.'/'.$id_td_tp.'/'.$semestre->idSem)}}"> {{$historique->date}} </a> </h3>
                                                            <p> {{$absents[$j++]}} absent(s)</p>
                                                        </div>{{$pourcentage[$i]}}
                                                        <div class="progress-bar wow fadeInLeft" data-progress="{{$pourcentage[$i]}}%" style="width: {{$pourcentage[$i]}}%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span style="left:35px;">{{$pourcentage[$i++]}}%</span> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br> <br>
@endsection