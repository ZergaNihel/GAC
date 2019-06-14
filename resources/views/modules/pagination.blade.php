                               <table>
                                    <tr>
                                        
                                        <th>Module</th>
                                        <th>Code</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Semestre </th>
                                       
                                        <th>Actions</th>
                                    </tr>
                                    
                                    @foreach($modules as $m)
                                    <tr id="{{$m->idMod}}">
                                       
                                        <td id="nom{{$m->idMod}}"> {{$m->nom}}</td>
                                        
                                        <td id="code{{$m->idMod}}">{{$m->code}}</td>
                                        <td id="type{{$m->idMod}}">{{$m->type}}</td>
                                        <td id="active{{$m->idMod}}">
                                        @if($m->sem1 != null)
                                            @if($m->semestre == $s1)
                                            <button class="pd-setting">Active</button>
                                            @elseif($m->semestre == $s2)
                                            <button class="ps-setting">Active</button>
                                            @else
                                             <button class="ds-setting">Désactivé</button>
                                             @endif
                                        @else
                                             <button class="ds-setting">Désactivé</button>
                                        @endif
                                        </td>
                                        <td id="semestre{{$m->idMod}}">
                                        @if($m->sem1 != null)
                                             @if($m->sem1->active == 1)
                                             {{$m->sem1->nomSem}}
                                              @else
                 Aucun
                                           
                                             @endif
                                        @else
        
                   Aucun
                                      

                                        @endif
                                        </td>
                                      
                                        <td id="action{{$m->idMod}}">
                                             <a data-toggle="tooltip" href="{{url('modules/details/'.$m->idMod)}}" title="Détails" class="btn btn-default" ><i class="fa fa-book" aria-hidden="true"></i></a><a id="edita" data-toggle="modal"  href="#" title="Modifier" class="btn btn-default" data-target="#EditModule" data-id="{{$m->idMod}}" data-nom="{{$m->nom}}" data-code = "{{$m->code}}" data-type = "{{$m->type}}" data-semestre="{{$m->semestre}}" data-responsable="{{$m->ens_responsable}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a><button data-toggle="tooltip" title="supprimer" class="btn btn-danger" id="deleteMod{{$m->idMod}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                       
                                        </td>
                                    </tr>
                                    
                                    @endforeach
            

                                    
                                    
                                </table>
                        
                            {!! $modules->links() !!} 