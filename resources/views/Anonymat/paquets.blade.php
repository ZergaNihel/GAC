@extends('layouts.masterAnonym')

@section('script1')
    <!-- modals jquery
    ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
        $(document).ready(function () {

            $('#formadd').on('submit', function(event){
                alert($('#moduleEx').val());
               alert( $('#typeEx').val() );
                $('#addp').modal('hide');
                event.preventDefault();
                $.ajax({
                 url:'/import_excel/import',
                 method:"get",
                 data:new FormData(this),
                 dataType:'JSON',
                 contentType: false,
                 cache: false,
                 processData: false,
                 success:function(data){
                    
                    alert(data);
                }
            });

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
                        // $('#typeEx').val(data["type"]);
                        // $('#moduleEx').val(data["module"].idMod);
                        var i;
                        for(i=0;i<data["paquets"].length;i++)
                        {
                            $('#table').append(
                                "<tr>"+
                                    "<td>"+ (i+1) +"</td>"+
                                    "<td>"+data["paquets"][i].nom_paq+"</td>"+
                                    "<td>"+ data["nbrCopies"][i] +"</td>"+
                                    "<td>"+
                                        "<div class='btn-group btn-custom-groups btn-custom-groups-one'>"+
                                            "<button type='button' id=''  class='btn btn-custon-four btn-primary'>" + "<i class='fa fa-eye' aria-hidden='true'>" + "</i>" + "Détail" + "</button>" +
                                        "</div>"+
                                    "</td>"+
                                "</tr>"
                            );
                        }
                    }
                });
            });
            $('#nouveau').click(function(){
                $('#addp').modal('show');
            });
            // $('#ajouter').click(function(){
            //     $('#addp').modal('hide'); 
            //     $.ajax({
            //         type:'get',
            //         data:new FormData(document.querySelector('form'));,
            //         url:'/import_excel/import',
            //         success:function(data){
            //         }
            //     });
            // });


            // $('#formadd').on('submit', function(event){
            //     event.preventDefault();
            //     $.ajax({
            //      url:'/import_excel/import',
            //      method:"POST",
            //      data:new FormData(this),
            //      dataType:'JSON',
            //      contentType: false,
            //      cache: false,
            //      processData: false,
            //      success:function(data)
            //         // console.log(response);
            //         alert('data.a1');
            //     }
            // });

            // });
            



        });

</script>

@endsection

@section('content')

<div class="row">
    <div id="listep" data-keyboard="false" data-backdrop="static" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
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
                <form id="formadd" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="typeEx" name="typeEx" value="Examen">
                                    <input type="text" id="moduleEx" name="moduleEx" value="2">
                                    <input type="text" name="salle" class="form-control" placeholder="Salle" required/>
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
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9"></div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 mg-tb-30">
        <button type="button" id="nouveau" data-toggle="modal" data-target="#add" class="btn btn-custon-two btn-success"><i class="fa fa-plus"></i> Nouveau paquet</button>
    </div>
</div>


<div class="static-table-area"  >
    <div class="container-fluid" style="width:1200px; left:150px;">
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