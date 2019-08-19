       <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li>
                                             @if(!$sem1->isEmpty() and !$sem2->isEmpty())
                                             <a data-toggle="collapse" data-target="#Charts" href="#">Semestre <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                           
                                            <ul class="collapse dropdown-header-top">
                                               @foreach($sem1 as $s)
                                                <li><a href="{{url('Semestres/dashboard/'.$s->idSem)}}">Semestre 1</a></li>
                           @endforeach
                          @foreach($sem1 as $s)
                                                <li><a href="{{url('Semestres/dashboard/'.$s->idSem)}}">Semestre 2</a></li>
                                               @endforeach 
                                               
                                            </ul>
                                            @else
                                            <a data-toggle="collapse" data-target="#Charts" href="{{ url('Semestres/index') }}">Semestre <span ></span></a>
                                            @endif
                                        </li>
                                       
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="#">Enseignants <span class="admin-project-icon edu-icon edu-down-arrow"></span></a></li>
                                        <li><a data-toggle="collapse" data-target="#demopro" href="#">Etudiants <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#democrou" href="#">Modules <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        </li>
                                    <li><a href="{{url('Semestres/historique')}}">Historique</a></li>
                                   
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Boite de réception<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="{{url('/boite_de_reception')}}">E-mails</a>
                                                </li>
                                               
                                                <li><a href="{{url('/form_mail')}}">Composer un e-Mail</a>
                                                </li>
                                            </ul>
                                        </li>
                           
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->