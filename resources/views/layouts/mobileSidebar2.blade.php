 <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a  href="{{url('liste_groupes/'.$semestre->idSem)}}">Groupe <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                           
                                        </li>
                                        
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="#">Emploi du temps <span class="calendar-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <li><a href="{{url('/Emplois_du_Temps_generale/'.$semestre->idSem)}}">E.P générale</a>
                                                </li>
                                                <li><a href="{{url('/Emplois_du_Temps/'.$semestre->idSem)}}">E.P par module</a>
                                                </li>
                                                
                                            </ul>
                                        </li>
                                        <li><a href="events.html">Délibération</a></li>
                                        
                                       
                                   
                                   
                           
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <!-- Mobile Menu end -->