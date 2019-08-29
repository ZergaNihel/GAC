@extends('layouts.masterEr')

@section('script1')
<!-- modals jquery
    ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- <script>
      $(document).on("click",".btn-success",function(){
        var btn_id = $(this).attr("id");
        var i=btn_id.substring(7,btn_id.length);
        var data = $('#editA'+i).serialize();
        $.ajax({
                type:'get',
                data:data,
                url:'justifications/accepter',
                success:function(data){
                     $('#row'+i).remove();
                }
        });

       });

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
@endsection 

@section('path')
<li>
    <span class="bread-blod">Justifications</span>
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
                                                    <a class="media" href="{{asset('uploads/justifications/'.$justification->justification)}}"></a>
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