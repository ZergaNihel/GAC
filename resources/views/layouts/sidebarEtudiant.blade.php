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
                      

                                 <a aria-expanded="false" href="{{ url('/absences_Etudiant') }}" ><span class="fa fa-calendar "></span>   <span class="mini-click-non">Absences </span></a>
                            
                 
                        </li>
                     
                        <li>
                            <a   aria-expanded="false" href="{{url('/Etudiant/notes')}}" ><span class="educate-icon educate-library icon-wrap"></span>   <span class="mini-click-non">Notes</span></a>
                           
                        </li>
                        <li>
                            <a class="has-arrow" aria-expanded="false" href="" ><span class="educate-icon educate-event icon-wrap"></span> <span class="mini-click-non">Emploi du temps</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                @foreach($sem1 as $s1)
                                <li><a title="Inbox" href="{{url('/Emplois_du_Temps_generale/'.$s1->idSem)}}"><span class="mini-sub-pro">E.T (semestre 1)</span></a></li>
                                @endforeach
                                @foreach($sem2 as $s2)
                                <li><a title="Compose Mail" href="{{url('/Emplois_du_Temps_generale/'.$s2->idSem)}}"><span class="mini-sub-pro">E.T (semestre 2)</span></a></li>
                                @endforeach
                            </ul>
                       
                        </li>
                  
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-message icon-wrap"></span> <span class="mini-click-non">Boite de réception</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Inbox" href="{{url('/boite_de_reception')}}"><span class="mini-sub-pro">E-mails</span></a></li>
                                
                                <li><a title="Compose Mail" href="{{url('/form_mail')}}"><span class="mini-sub-pro">Envoyer un e-mail</span></a></li>
                            </ul>
                        </li>
                
                 
             
                    </ul>
                </nav>
            </div>
        </nav>
    </div>