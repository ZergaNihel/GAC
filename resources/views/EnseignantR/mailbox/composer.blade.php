@extends('layouts.masterAnonym')

@section('script1')

<script>
    $(document).ready(function () {
        $('.summernote').summernote();
        $("input[type='file']").on("change", function () {
            var numFiles = $(this).get(0).files.length
            $("#prepend-big-btn").val(numFiles + " fichiers");
        });

        $(document).on('click', '#save', function () {
            // alert("hhh");
            $.ajax({
                type: "POST",
                data: $('#formComposer').serialize(), // to submit fields at once
                url: "{{url('/save_mail')}}", // use the form's action url
                success: function (data) {
                    $("#alertSuc").css("display", "");
                    $("html, body").animate({
                        scrollTop: 0
                    }, 10);
                }
            });
        });
    });

</script>
@endsection

@section('path')
<ul class="breadcome-menu">
    <li><a href="#">Envoyer un email </a>

    </li>
</ul>
@endsection

@section('content')

<div class="mailbox-compose-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.composer')
            <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                <div class="hpanel email-compose">
                    <div class="panel-heading hbuilt">
                        <div class="p-xs h4">
                            Nouveau message
                        </div>
                    </div>
                    <div class="alert-icon shadow-inner res-mg-t-30 table-mg-t-pro-n" id="alertSuc"
                        style="display: none">
                        <div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11" style="">
                            <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                            </button>

                            <p> <i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11"
                                    aria-hidden="true"> </i><strong> Succés!</strong> le message a été bien enregistrer
                                (voir <a href="{{url('/brouillons')}}">Brouillon </a>).</p>
                        </div>
                    </div>

                    @if ($errors->any())
                    <input type="hidden" id="errImport" value="1">
                    <div class="alert-wrap1 shadow-inner wrap-alert-b">
                        <div class="alert alert-danger alert-mg-b" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)

                                <li> <strong>Erreur!</strong> {{ $error }}. </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>

                    @endif
                    <div class="panel-heading hbuilt">
                        <div class="p-xs">
                            <form method="post" class="form-horizontal" action="{{url('send_email')}}"
                                enctype="multipart/form-data" id="formComposer">
                                {!! csrf_field() !!}
                                <div class="form-group-inner">
                                    <label class="col-lg-1 control-label text-left">A:</label>
                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                        <div class="chosen-select-single mg-b-20">
                                            <select name="email" class="chosen-select" tabindex="-1">
                                                <option value="" disabled selected>Envoyer à</option>
                                                @foreach($users as $u)
                                                @if($u->etudiant != null)
                                                <option value="{{$u->id}}">{{$u->etudiant->nom}}
                                                    {{$u->etudiant->prenom}}</option>
                                                @endif
                                                @if($u->enseignant != null)
                                                <option value="{{$u->id}}">{{$u->enseignant->nom}}
                                                    {{$u->enseignant->prenom}}</option>
                                                @endif
                                                @if($u->etudiant == null and $u->enseignant == null)
                                                <option value="{{$u->id}}">{{$u->name}}</option>
                                                @endif
                                                @endforeach
                                            </select></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-1 control-label text-left">Sujet:</label>
                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control input-sm" placeholder="Sujet"
                                            name="sujet">
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="panel-body no-padding">
                        <textarea name="msg" class="summernote"></textarea>
                    </div>
                    <br>
                    <div id="dropzone1" class="multi-uploader-cs">
                        <div class="dropzone dropzone-custom ">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"> </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <div class="file-upload-inner ts-forms">
                                        <div class="input prepend-big-btn">

                                            <div class="file-button">
                                                <i class="fa fa-paperclip"> </i>
                                                Sélectionner
                                                <input type="file" name="files[]" multiple>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="file-upload-inner ts-forms">
                                        <div class="input prepend-big-btn">
                                            <label class="icon-right" for="prepend-big-btn">
                                                <i class="fa fa-download"></i>
                                            </label>
                                            <input type="text" id="prepend-big-btn"
                                                placeholder="Aucun fichier selectionné">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="panel-footer container" style="width:100%">
                        <button class="btn btn-primary ft-compse pull-right"type="submit">Envoyer</button>
                        </form>
                        <div class="pull-left">
                            <div class="btn-group active-hook">
                                <button class="btn btn-default" type="button" id="save"><i class="fa fa-edit"></i>Enregistrer</button>
                            </div>
                        </div>

                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
