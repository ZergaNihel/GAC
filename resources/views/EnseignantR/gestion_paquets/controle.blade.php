@extends('layouts.masterEr')

@section('script1')
    <!-- modals jquery
    ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).on("click","#valider",function(){
            var data = $('#attribuer').serialize(); 
            var i=0;
            $.ajax({
                type:'get',
                data:data,
                url:'/attribuer/correcteur',
                success:function(data){
                    $('#paquet').modal('hide');
                    $('#1'+data["paquet"].idPaq).remove();
                    $('#2'+data["paquet"].idPaq).remove();
                    $('#paq'+data["paquet"].idPaq).append(
                        "<td id='1"+data['paquet'].idPaq+"'>"+data["correcteur"][0].nom+" "+data["correcteur"][0].prenom+"</td>"+
                        "<td id='2"+data['paquet'].idPaq+"'>"+data["correcteur"][1].nom+" "+data["correcteur"][1].prenom+"</td>"
                    );
                }
            });
        });
    </script>
     <script>
        $(document).ready(function () {
            $('#date').change(function(){
                $('#data_2').css("color", "#0CCB00");
                var data = $('#dateform').serialize(); ;
                $.ajax({
                    type:'get',
                    data:data,
                    url:'/date/limite/controle',
                    success:function(data){
                        $('#data_2').css("color", "black");
                    }
                });
            });

            $("#formadd").submit(function(e){
                e.preventDefault();
                var form = $(this);
                var path=$('#file').val();
                if( path.search(".pdf") > 0)
                {
                var data = new FormData(form[0]); 
                $('#Newfile').modal('hide');
                $.ajax({
                    type:'post',
                    data:data,
                    url:'/sujet/controle',
                    cache: false,
                    processData: false,
                    contentType : false,
                    success:function(data){
                        var href='pdf/'+data.sujet;
                        alert(href);
                         $('#pdfviewer1').remove();
                        // $('#pdfviewer').append(
                        //     "<div class='pdf-viewer-area'>"+
                        //         "<div class='row'>"+
                        //             "<div class='pdf-single-pro'>"+
                        //                 "<a class='media medi' href='#'>" +"</a>"+
                        //             "</div>"+
                        //         "</div>"+
                        //     "</div>"
                        // );
                        $('#lien').attr('href', href);
                    }
                });
                 }
                else{
                    alert("veuillez importer un fichier PDF");
                }
            });

            $("#formaddC").submit(function(e){
                e.preventDefault();
                var form = $(this);
                var path=$('#fileC').val();
                if( path.search(".pdf") > 0)
                {
                var data = new FormData(form[0]); 
                $('#NewfileC').modal('hide');
                $.ajax({
                    type:'post',
                    data:data,
                    url:'/corrige/controle',
                    cache: false,
                    processData: false,
                    contentType : false,
                    success:function(data){
                        var href='pdf/'+data.sujet;
                        $('#lien').attr('href', href);
                    }
                });
                 }
                else{
                    alert("veuillez importer un fichier PDF");
                }
            });
        });

        $(document).on("click","#popupAttr",function(){
            var cnt=0;
            $('#valider').attr('disabled',true);
            $("#correcteurs").chosen().change(function(){
                cnt = cnt+1;
                if(cnt==2)
                {
                    $('#valider').attr('disabled',false);
                }
            });
        });
    </script>

@endsection

@section('path')
    <li>
        <span class="bread-blod">Gestion des paquets</span>
    </li>
@endsection

@section('content')
<!-- Static Table Start -->
<div class="col-lg-12">
    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
        <ul id="myTabedu1" class="tab-review-design">
            <li class="active"><a href="#Comparaison">Tous les paquets</a></li>
            <li><a href="#Details">Détails</a></li>
        </ul>
        <div id="myTabContent" class="tab-content custom-product-edit">
            <div class="product-tab-list tab-pane fade active in" id="Comparaison">
                <div class="static-table-area"  >
                    <div class="container-fluid">
                        <div class="row">
                            <div class="row justify-content-right">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mg-tb-30 " style="left: 40px;">
                                    <div class="modal-area-button">
                                        <button class="btn btn-custon-four btn-primary mg-b-10" id="popupAttr" href="#" data-toggle="modal" data-target="#paquet"><span class="educate-icon educate-professor icon-wrap"></span>  Attribuer les correcteurs</button>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 mg-tb-30" style="top: 8px;">
                                    <div class=" justify-content-right">
                                        <div class="sparkline14-hd">
                                            <div class="main-sparkline14-hd">
                                                <form id="dateform">
                                                    <div class="form-group data-custon-pick" id="data_2">
                                                        <div class="input-group date"> 
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input id="date" name="date" type="text" class="form-control" placeholder="Date limite" @if($exam->delais != "")value="{{$exam->delais}}"@else value="" @endif >
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div id="paquet" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog"aria-labelledby="myModalLabel" aria-hidden="true" <?php if (isset($_GET['erreur'])){echo 'data-show="true"';}?> >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                        <form id="attribuer">
                                            <div class="modal-body">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="sparkline10-list mg-tb-30 responsive-mg-t-0 table-mg-t-pro-n dk-res-t-pro-0 nk-ds-n-pro-t-0">
                                                        <div class="sparkline10-graph">
                                                            <div class="input-knob-dial-wrap">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="">
                                                                            <label>paquet</label>
                                                                            <select id="paquets" name="paquets" data-placeholder="choisissez un paquet..." class="chosen-select" tabindex="-1" required>
                                                                                <option value="">Select</option>
                                                                                @foreach($nompaq as $paquet)
                                                                                <option value="{{$paquet->idPaq}}"> {{$paquet->salle}} </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div> 
                                                                        <div class="">
                                                                            <label>Enseignants correcteurs</label>
                                                                            <select id="correcteurs" name="correcteurs[]" data-placeholder="correcteurs..." class="chosen-select" multiple="" tabindex="-1" required>
                                                                                <option value="">Select</option>
                                                                                @foreach($correcteurs as $correcteur)
                                                                                <option value="{{$correcteur->idEns}}"> {{$correcteur->nom}} {{$correcteur->prenom}} </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>    
                                            <div class="modal-footer">
                                                <button class="btn btn-custon-four btn-primary" data-dismiss="modal" >annuler</button>
                                                <button class="btn btn-custon-four btn-primary" id="valider" type="submit" disabled>Valider</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="sparkline8-list">
                                    <div class="sparkline8-graph">
                                        <div class="static-table-list">
                                            <table  class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Paquet</th>
                                                        <th>Correcteur1</th>
                                                        <th>Correcteur2</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table">
                                                    @php $No=1 @endphp 
                                                    @foreach($nompaq as $nompaq)
                                                    @php $N=1 @endphp
                                                        <tr id="paq{{$nompaq->idPaq}}">
                                                            <td>{{$No++}}</td>
                                                            <td>{{$nompaq->salle}}</td>
                                                            @foreach(App\Paquet_en::where('id_paq','=',$nompaq->idPaq)->get() as $a )
                                                            <td id="{{$N++}}{{$nompaq->idPaq}}">
                                                                {{$a->enseignant->nom}}
                                                                {{$a->enseignant->prenom}}
                                                            </td>
                                                            @endforeach
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
            
            <div class="product-tab-list tab-pane fade " id="Details">
                <div class="row mg-tb-30">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="admin-pro-accordion-wrap shadow-inner responsive-mg-b-30">
                            <div class="panel-group edu-custon-design" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading accordion-head">
                                        <div class="row">
                                            <div class="col-lg-11">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse"> Sujet: </a>
                                            </h4></div>
                                            <div class="col-lg-1">
                                                <a class href="#" data-toggle="modal" data-target="#Newfile"><i class="fa fa-plus" style="color:black;"></i></a>
                                                <div id="Newfile" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
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
                                                                                    <input type="file" name="file" id="file" class="form-control" placeholder="Liste des étudiants" required/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class=" btn btn-custon-four btn-primary" data-dismiss="modal">Quitter</button>
                                                                    <button class=" btn btn-custon-four btn-primary" type="submit">Valider</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapse1" class="panel-collapse panel-ic collapse in">
                                        <div class="panel-body admin-panel-content animated bounce" id="pdfviewer">
                                            @if($exam->sujet != "")
                                            <div id="pdfviewer1" class="pdf-viewer-area">
                                                <div class="row">
                                                    <div class="pdf-single-pro">
                                                        <a class="media medi" id="lien" href="{{asset('pdf/'.$exam->sujet)}}"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="admin-pro-accordion-wrap shadow-inner">
                            <div class="panel-group edu-custon-design" id="accordion2">
                                <div class="panel panel-default">
                                    <div class="panel-heading accordion-head">
                                        <div class="row">
                                            <div class="col-lg-11">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapse4"> Corrigé type: </a>
                                            </h4></div>
                                            <div class="col-lg-1">
                                                <a class href="#" data-toggle="modal" data-target="#NewfileC"><i class="fa fa-plus" style="color:black;"></i></a>
                                                <div id="NewfileC" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-close-area modal-close-df">
                                                                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                            </div>
                                                            <form id="formaddC" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <div class="modal-body">
                                                                        <div class="form-group-inner">
                                                                            <div class="row">
                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="file" name="file" id="fileC" class="form-control" placeholder="Liste des étudiants" required/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class=" btn btn-custon-four btn-primary" data-dismiss="modal">Quitter</button>
                                                                    <button class=" btn btn-custon-four btn-primary" type="submit">Valider</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapse4" class="panel-collapse panel-ic collapse in">
                                        <div class="panel-body admin-panel-content animated flash">
                                            @if($exam->corrige_type != "")
                                            <div id="pdfviewer1" class="pdf-viewer-area">
                                                <div class="row">
                                                    <div class="pdf-single-pro">
                                                        <a class="media medi" id="lien" href="{{asset('pdf/'.$exam->corrige_type)}}"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
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
@endsection
