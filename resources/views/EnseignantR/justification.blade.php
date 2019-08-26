@extends('layouts.masterEr')

@section('script1')
<!-- modals jquery
    ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
       // $(document).ready(function () {
            
      //  });
      $(document).on("click",".btn-success",function(){
        var btn_id = $(this).attr("id");
        var i=btn_id.substring(7,btn_id.length);
        var data = $('#editA'+i).serialize();
        alert(i);
        $.ajax({
                type:'get',
                data:data,
                url:'/justifications/accepter',
                success:function(data){
                   // window.location.reload();
                     $('#row'+i).remove();
                }
        });

       });

       
    </script>
    {{-- <script> 
       $(document).on("click",".btn-danger",function(){
        var btn_id = $(this).attr("id");
        var i=btn_id.substring(7,btn_id.length);
        var data = $('#editR'+i).serialize();
        $.ajax({
                type:'get',
                data:data,
                url:'justifications/refuser',
                success:function(data){
                     $('#row'+i).remove();
                }
        });

       });
    </script> --}}
@endsection 

@section('path')
<li>
    <span class="bread-blod">Présence</span>
</li>
@endsection

@section('content')
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
                                 <tr id="row{{$justification->idAbs}}">
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
                                                        <form id="editA{{$justification->idAbs}}">
                                                            <input type="hidden" id="idjustification" name="idjustification" value="{{$justification->idAbs}}">
                                                            <button type="button" id="valider{{$justification->idAbs}}" class="btn btn-custon-rounded-three btn-success"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Accepter</button>
                                                        </form>

                                                        <form id="editR{{$justification->idAbs}}">
                                                            <input type="hidden" id="idjustification" name="idjustification" value="{{$justification->idAbs}}">
                                                            <button type="button" id="refuser{{$justification->idAbs}}" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Refuser</button>
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
@endsection