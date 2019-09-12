 <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li>
                             
                                            <a  href="{{ url('/absences_Etudiant') }}">Abcences <span ></span></a>
                                          
                                        </li>
                                       
                                        <li><a  href="{{url('/Etudiant/notes')}}">Notes <span ></span></a></li>
                                       
                                      
                                    <li><a href="#" data-toggle="collapse" data-target="#demo2">Emploi du temps</a>
                                    <ul id="demo2" class="collapse dropdown-header-top">
                                    @foreach($sem1 as $s1)
                                <li><a title="Inbox" href="{{url('/Emplois_du_Temps_generale/'.$s1->idSem)}}"><span class="mini-sub-pro">E.T (semestre 1)</span></a></li>
                                @endforeach
                                @foreach($sem2 as $s2)
                                <li><a title="Compose Mail" href="{{url('/Emplois_du_Temps_generale/'.$s2->idSem)}}"><span class="mini-sub-pro">E.T (semestre 2)</span></a></li>
                                @endforeach
                                            </ul>
                                    </li>
                                   
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Boite de réception<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="{{url('/boite_de_reception')}}">E-mails</a>
                                                </li>
                                               
                                                <li><a href="{{url('/form_mail')}}">Envoyer un e-Mail</a>
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