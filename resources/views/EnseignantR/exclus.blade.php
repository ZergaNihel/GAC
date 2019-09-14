@extends('layouts.masterEr')

@section('script1')
<!-- modals jquery
    ============================================ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      $(document).on("click",".btn-danger",function(){
        var btn_id = $(this).attr("id");
        var i=btn_id.substring(6,btn_id.length);
        alert(i);
        alert(btn_id);
        var data = $('#exclusform'+i).serialize();
        $.ajax({
                type:'post',
                data:data,
                url:'exclure/etudiant',
                success:function(data){
                     $('#row'+i).remove();
                }
        });

       });
    </script>

    <script>
        function myFunction(x) {
            if (x.matches) { // If media query matches
                $('button[name=toggle]').click();
            } 
        }

        var x = window.matchMedia("(max-width: 600px)")
        myFunction(x) // Call listener function at run time
        x.addListener(myFunction) // Attach listener function on state changes
    </script>
    
@endsection

@section('path')
    <li>
        <span class="bread-blod">Liste des exclus</span>
    </li>
@endsection

@section('content')
    <!-- Static Table Start -->
    <div class="col-lg-12">
        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline13-list">
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <div id="toolbar3">
                                            <select class="form-control dt-tb">
                                                <option value="">Export Basic</option>
                                                <option value="all">Exporter tout le tableau</option>
                                                <option value="selected">Exporter les lignes selectionnées </option>
                                            </select>
                                        </div>
                                        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-cookie="true"
                                            data-cookie-id-table="saveId" data-show-export="true"  data-toolbar="#toolbar3">
                                            <thead>
                                                <tr>
                                                    <th data-field="state" data-checkbox="true"></th>
                                                    <th data-field="id">No</th>
                                                    <th data-field="Module">Module</th>
                                                    <th data-field="Matricule">Matricule</th>
                                                    <th data-field="Nom_Prenom">Nom_Prenom</th>
                                                    <th data-field="Date">Date de naissance</th>
                                                    <th data-field="Etat">Etat</th>
                                                    <th data-field="absences">Nombre d'absences</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $No=1 @endphp
                                                @php $N=0 @endphp
                                                @foreach($exclus as $exclu)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{$No++}}</td>
                                                        <td>{{$exclu->nomMod}}</td>
                                                        <td>{{$exclu->matricule}}</td>
                                                        <td>{{$exclu->nomEtu}} {{$exclu->prenom}}</td>
                                                        <td>{{$exclu->date_naissance}}</td>
                                                        <td>{{$exclu->type}}</td>
                                                        <td>{{$nbabs[$N++]}}</td>
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
    </div>
@endsection