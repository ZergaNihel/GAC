@extends('layouts.masterEr')

@section('script1')
    <!-- modals jquery
    ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#paquet').modal('show');
        $('#type').change(function(){
            var data = $('#popup').serialize();
            var j;
            $.ajax({
                    type:'get',
                    data:data,
                    url:'/gestion/choix/paquet',
                    success:function(data){
                        $.each($('.op'), function () {
                        this.remove();
                        });
                    
                        for(j=0;j<data.length;j++)
                        {
                            $('.ch').append("<option id='op' class='op' value='"+data[j].idPaq+"'>"+data[j].salle+"</option>");
                            $('.ch').trigger("chosen:updated");
                        }
                    }
            });
        });

    });
    </script>
@endsection

@section('path')
    <li>
        <span class="bread-blod">Correction</span>
    </li>
@endsection

@section('content')
<!-- Modals Start-->
<div class="row">
    <div id="paquet"  data-keyboard="false" data-backdrop="static" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" href="{{asset('enseignant/groupes/'.$semestre->idSem)}}"><i class="fa fa-close"></i></a>
                </div>
                <form  id="popup" action="/gestion/notes" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="advanced-form-area mg-b-15 form-select-list">
                                <select class="form-control custom-select-value" name="type" id="type" required>
                                    <option value="">Nature</option>
                                    <option value="Controle">Controle</option>
                                    <option value="Examen">Examen</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="advanced-form-area mg-b-15">
                                <select name="paquet" id="paquet" data-placeholder="Paquet..." class="chosen-select ch" tabindex="-1" required>
                                    <option value="" id="paq">Paquet</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="semestre" value="{{$semestre->idSem}}">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-custon-four btn-primary" type="submit">Choisir</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script2') 

@endsection