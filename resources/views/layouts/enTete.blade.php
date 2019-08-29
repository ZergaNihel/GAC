     <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
  <li class="nav-item"><a href="{{url('Semestres/index')}}" class="nav-link">Accueil</a>
                                                </li>
                                                <li class="nav-item"><a href="{{url('modules/index')}}" class="nav-link">Modules</a>
                                                </li>
                                                           <li class="nav-item dropdown res-dis-nn">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Semestres <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                    <div role="menu" class="dropdown-menu animated zoomIn">
                                                        @foreach($sem1 as $s)
                                                        <a href="{{url('Semestres/dashboard/'.$s->idSem)}}" class="dropdown-item">Semestre 1</a>
                                                         @endforeach
                                                      @foreach($sem2 as $s)
                                                        <a href="{{url('Semestres/dashboard/'.$s->idSem)}}" class="dropdown-item">Semestre 2</a>
                                                         @endforeach
                                                    </div>
                                                </li>
                                                <li class="nav-item"><a href="{{url('Enseignants/index')}}" class="nav-link">Enseignants</a>
                                                </li>
                                              <li class="nav-item"><a href="#" class="nav-link">Historique</a>
                                                </li>
                                            </ul>
                                        </div>