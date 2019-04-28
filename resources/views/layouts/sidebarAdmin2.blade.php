<div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                 <a href="index.html"><img class="main-logo" src="{{ asset('img/logo/logo.png') }}" alt="" /></a>
                <strong><a href="{{url('Semestres/index')}}"><img src="img/logo/logosn.png" alt="" /></a></strong>
                <br>
                <br>
                       
                                
            </div>
            <br>
    <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                     <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a  href="{{url('Semestres/dashboard/'.$semestre->idSem)}}">
                                   <span class="educate-icon educate-charts icon-wrap"></span>
                                   <span class="mini-click-non">Statistiques</span>
                                </a>
                          
                        </li>
                          <li>
     <a title="Landing Page" href="{{url('liste_groupes/'.$semestre->idSem)}}" aria-expanded="false"><span class="educate-icon educate-course icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Groupes</span></a>
                        </li>
                     
                        <li>
                            <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-event icon-wrap"></span> <span class="mini-click-non">Emplois du temps</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="all-professors.html"><span class="mini-sub-pro">E.P générale</span></a></li>
                                <li><a href="{{url('/Emplois_du_Temps/'.$semestre->idSem)}}" ><span class="mini-sub-pro">E.P par module</span></a></li>
                                
                            </ul>
                        </li>

                     
              
                     
                    <li>
                            <a title="Landing Page" href="events.html" aria-expanded="false"><span class="educate-icon educate-data-table icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Délibération</span></a>
                        </li>
                     
                
                 
             
                    </ul>
                </nav>
            </div>
        </nav>
    </div>