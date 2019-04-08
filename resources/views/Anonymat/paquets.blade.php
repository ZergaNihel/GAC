@extends('layouts.masterAnonym')

@section('script1')
    <!-- modals jquery
    ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
        $(document).ready(function () { 
            var i;
            $("#formadd").submit(function(e){
                e.preventDefault();
                var form = $(this);
                var url = form.attr("action");
                var path=$('#listeEtu').val();
                if( path.search(".xlsx") > 0 || path.search(".xls") > 0)
                {
                    $('#addp').modal('hide');
                    var data = new FormData(form[0]);
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: data,
                        cache: false,
                        processData: false,
                        contentType : false,
                        success: function (data) {
                            $('#table').append(

                                "<tr id='row"+data["paquet"].idPaq+"'>"+
                                    "<td>"+ (i+1) +"</td>"+
                                    "<td>"+data["paquet"].nom_paq+"</td>"+
                                    "<td>"+ data["nbrCopies"] +"</td>"+
                                    "<td>"+  
                                        "<div class='btn-group btn-custom-groups btn-custom-groups-one'>"+
                                            "<div class='row' style='width:160px;'>"+
                                                "<div class='col-lg-6'>"+
                                                    "<a href='{!! asset('anonymat/paquet/details/"+data["paquet"].idPaq+"') !!}' class='btn btn-custon-four btn-primary'>" + "<i class='fa fa-eye' aria-hidden='true'>" + "</i>" + "Détail" + "</a>" +
                                                "</div>"+
                                                "<div class='col-lg-6'>"+
                                                    "<form id='form"+data["paquet"].idPaq+"'>"+
                                                        "<input type='hidden' name='idP' value='"+data["paquet"].idPaq+"'>"+
                                                    "</form>"+                                                                      
                                                    "<button class='btn btn-custon-four btn-danger' id='supprimer"+data["paquet"].idPaq+"' name='supprimer'>" + "<i class='fa fa-trash' aria-hidden='true'>" + "</i>" + "Supprimer" + "</button>" + 
                                                "</div>"+
                                            "</div>"+
                                        "</div>"+
                                    "</td>"+
                                "</tr>"
                            );
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR, textStatus, errorThrown);
                        }
                    });
                }
                else{
                    alert("veuillez importer un fichier excel");
                }
                
            });


            $('#listep').modal('show');
            $('#valider').click(function(){
                $('#listep').modal('hide'); 
                var data = $('#popup').serialize();
                $.ajax({
                    type:'get',
                    data:data,
                    url:'/anonymat/paquets/liste',
                    success:function(data){
                        $('#nomM').after(
                            " "+data["module"].nom
                        );
                        $('#nature').after(
                            " "+data["type"]
                        );
                        $('#ensR').after(
                            " "+data["ensR"][0].nom + " " + data["ensR"][0].prenom
                        );
                        $('#typeEx').val(data["type"]);
                        $('#moduleEx').val(data["module"].idMod);
                        
                        for(i=0;i<data["paquets"].length;i++)
                        {
                            var path=data["paquets"][i].idPaq;
                            $('#table').append(
                                '<tr id="row'+data["paquets"][i].idPaq+'">'+
                                    '<td>'+ (i+1) +'</td>'+
                                    '<td>'+data["paquets"][i].nom_paq+'</td>'+
                                    '<td>'+ data["nbrCopies"][i] +'</td>'+
                                    '<td>'+  
                                        '<div class="btn-group btn-custom-groups btn-custom-groups-one">'+
                                            '<div class="row" style="width:160px;">'+
                                                '<div class="col-lg-6">'+
                                                    '<a href="{!! asset("anonymat/paquet/details/'+data['paquets'][i].idPaq+'") !!}" class="btn btn-custon-four btn-primary">' + '<i class="fa fa-eye" aria-hidden="true">' + '</i>' + 'Détail' + '</a>' +
                                                '</div>'+
                                                '<div class="col-lg-6">'+
                                                    '<form id="form'+data["paquets"][i].idPaq+'">'+
                                                        '<input type="hidden" name="idP" value="'+data["paquets"][i].idPaq+'">' +
                                                    '</form>'+
                                                        '<button class="btn btn-custon-four btn-danger" id="supprimer'+data["paquets"][i].idPaq+'" name="supprimer">' + '<i class="fa fa-trash" aria-hidden="true">' + '</i>' + 'Supprimer' + '</button>' +   
                                                        // '<button class="btn btn-custon-four btn-danger" data-toggle="modal" data-target="#supp'+data["paquets"][i].idPaq+'">'+ '<i class="fa fa-trash" aria-hidden="true">' + '</i>' +'Danger</button>'+
                                                        // '<div id="supp'+data["paquets"][i].idPaq+'" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">'+
                                                        //     '<div class="modal-dialog">'+
                                                        //         '<div class="modal-content">'+
                                                        //             '<div class="modal-close-area modal-close-df">'+
                                                        //                 '<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>'+
                                                        //             '</div>'+
                                                        //             '<div class="modal-body">'+
                                                        //                 '<span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>'+
                                                        //                 '<h3>Voulez vous vraiment supprimer le paquet !</h3>'+
                                                        //             '</div>'+
                                                        //             '<div class="modal-footer danger-md">'+
                                                        //                 '<button class="btn btn-custon-four btn-primary" data-dismiss="modal">Cancel</button>'+
                                                        //                 '<button class="btn btn-custon-four btn-success" id="supprimer'+data["paquets"][i].idPaq+'" name="supprimer" >Process</button>'+
                                                        //             '</div>'+
                                                        //         '</div>'+
                                                        //     '</div>'+
                                                        // '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</td>'+
                                '</tr>'
                            );
                        }
                    }
                });
            });
            $('#nouveau').click(function(){
                $('#addp').modal('show');
            });
            $(document).on("click",".btn-danger",function(){
                var btn_id = $(this).attr("id");
                var i=btn_id.substring(9,btn_id.length);
                var data = $('#form'+i).serialize(); 
                $.ajax({
                    type:'get',
                    data:data,
                    url:'/supprimer/paquet',
                    success:function(data){
                        $('#row'+i).remove();
                    }
                });
            });

        });

</script>

@endsection

@section('content')

<div class="row">
    <div id="listep" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <form id="popup">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="advanced-form-area mg-b-15">
                                <select name="module" id="module" data-placeholder="Module..." class="chosen-select" tabindex="-1" required>
                                    <option value="">Module</option>
                                    @foreach($modules as $module)
                                        <option value="{{$module->idMod}}"> {{$module->nom}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-select-list">
                                <select class="form-control custom-select-value" name="type" id="type" required>
                                    <option value="">Nature</option>
                                    <option value="Controle">Controle</option>
                                    <option value="Examen">Examen</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </form>
                    <div class="modal-footer">
                        <button class="mg-b-25 btn btn-custon-four btn-primary" id="valider">Valider</button>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div id="addp" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <form id="formadd" method="POST" action="{{url('/anonymat/import')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="hidden" id="typeEx" name="typeEx" value="">
                                    <input type="hidden" id="moduleEx" name="moduleEx" value="">
                                    <input type="text" id="salle" name="salle" class="form-control" placeholder="Salle" required/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="file" name="listeEtu" id="listeEtu" class="form-control" placeholder="Liste des étudiants" required/>
                                </div>
                            </div>
                        </div>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class=" btn btn-custon-four btn-primary" name="ajouter" id="ajouter">Valider</button>
                    </div>
                </form>
                
                    
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width:1200px; left:150px;">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span > <br> <b id="nomM">Module:</b>  </span></div>
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><span> <br> <b id="ensR">Enseignant responsable:</b>  </span></div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span> <br> <b id="nature">La nature d'examen:</b>  </span></div>
</div>

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mg-tb-30">
        <a href="{{url('anonymat/paquets')}}" class="btn btn-custon-two btn-default"><i class="fa fa-exchange"></i> Changer le module</a>
        <button type="button" id="nouveau" data-toggle="modal" data-target="#add" class="btn btn-custon-two btn-success"><i class="fa fa-plus"></i> Nouveau paquet</button>
    </div>
</div>


<div class="static-table-area"  >
    <div class="container-fluid" style="width:1100px; left:150px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline8-list">
                    <div class="sparkline8-graph">
                        <div class="static-table-list">
                            <table  class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Paquet</th>
                                        <th>Nombre de copies</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table">
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection