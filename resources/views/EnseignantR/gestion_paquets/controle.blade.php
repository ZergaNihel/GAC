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
                                                            <input id="date" name="date" type="text" class="form-control" placeholder="Date limite" @if($date->delais != "")value="{{$date->delais}}"@else value="" @endif >
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
                <!-- Multi Upload Start-->
                    <div class="multi-uploaded-area mg-b-15">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="dropzone-pro mg-tb-30">
                                        <div id="dropzone1" class="multi-uploader-cs">
                                            <form action="/sujet/controle"  method="POST" class="dropzone" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="dz-message needsclick download-custom">
                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                    <h2>Le sujet du controle.</h2>
                                                    <p><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="dropzone-pro">
                                        <div id="dropzone" class="multi-uploader-cs">
                                            <form action="/corrige/controle"  method="POST" class="dropzone" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="dz-message needsclick download-custom">
                                                    <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                                    <h2>La correction du controle.</h2>
                                                    <p><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Multi Upload End-->
            </div>
        </div>
    </div>
</div>
@endsection
