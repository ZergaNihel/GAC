@extends('layouts.masterEr')

@section('script1')
    <!-- modals jquery
    ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#paquet').modal('show');
        

        });
    </script>
@endsection

@section('path')
    <li>
        <span class="bread-blod">Correction/controle continu</span>
    </li>
@endsection

@section('content')
<!-- Modals Start-->
<div class="row">
    <div id="paquet"  data-keyboard="false" data-backdrop="static" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <form method="POST" action={{url('')}} id="popup">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="advanced-form-area mg-b-15">
                                <select data-placeholder="Module..." class="chosen-select" tabindex="-1">
                                    <optgroup label="Analyse">
                                        <option value="S101">S101</option>
                                        <option value="N203">N203</option>
                                    </optgroup>
                                    <optgroup label="Algèbre">
                                        <option value="S101">S101</option>
                                        <option value="N203">N203</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
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