@extends('layouts.masterEr')

@section('script1')
    <!-- modals jquery
    ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#liste').modal('show');
        $('#valider').click(function(){
                // $('#liste').modal('hide');
                var data = $('#popup').serialize();
                //alert(data);
                // $.ajax({
                //     type:'get',
                //     data:data,
                //     url:'presence/liste',
                //     success:function
                // })

            })
        });
        
    </script>
    {{-- <script>
        $(document).ready(function(){
            $('#valider').click(function(){
                // $('#liste').modal('hide');
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
@endsection

@section('path')
    <li>
        <span class="bread-blod">Présence</span>
    </li>
@endsection

@section('sidebar')
@include('layouts.MenuEr.sidebar')
@endsection 

@section('content')
<div class="row">
    <div id="liste" data-keyboard="false" data-backdrop="static" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" href="{{asset('Semestres/dashboard/'.$idSem)}}"><i class="fa fa-close"></i></a>
                </div>
                <form method="POST" action={{url('presence/liste')}} id="popup">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="advanced-form-area mg-b-15">
                                <select name="seance" data-placeholder="Type..." class="chosen-select" tabindex="-1" required>
                                    <option value="">Séance</option>
                                    @foreach($seances as $seance)
                                        <option value=" {{$seance->idSea}} "> {{$seance->type}} {{$seance->jour}} {{$seance->heure}} "{{$seance->salle}}" </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="advanced-form-area mg-b-15">
                                <select name="module" data-placeholder="Module..." class="chosen-select" tabindex="-1" required>
                                    <option value="">Module</option>
                                    @foreach($modules as $module)
                                        <option value=" {{$module->idMod}} "> {{$module->nom}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="advanced-form-area mg-b-15">
                                <select name="groupe" data-placeholder="Groupe..." class="chosen-select" tabindex="-1" required>
                                    <option value="">Groupe</option>
                                    @foreach($groupes as $groupe)
                                        <option value=" {{$groupe->idG}} "> {{$groupe->nomG}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="semestre" value="{{$idSem}}">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-custon-four btn-primary" id="valider" type="submit">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection