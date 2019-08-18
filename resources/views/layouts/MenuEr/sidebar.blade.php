
<!-- Start Left menu area -->
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="{{asset('img/logo/logo.png')}}" alt="" style="width:100px;height:100px;" /></a>
            <strong><a href="index.html"><img src="" alt="" /></a></strong>
        </div>

        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <br> <br> <br>
                    <li>
                        <a title="Landing Page" href="events.html" aria-expanded="false"><span class="educate-icon educate-home icon-wrap"></span> <span class="mini-click-non">Dashboard</span></a>
                    </li>

                    <li>
                        <a class="has-arrow" href="#">
                            <span class="educate-icon educate-library icon-wrap"></span>
                            <span class="mini-click-non">Présence</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li><a title="Liste du groupe" href="{{url('presence/'.$semestre->idSem)}}"><span class="mini-sub-pro">Liste du groupe</span></a></li>
                            <li><a title="Gestion des justificatifs" href="{{url('justifications/'.$semestre->idSem)}}"><span class="mini-sub-pro">Gestion des justificatifs</span></a></li>
                            <li><a title="Liste des exclus" href="{{url('exclus/'.$semestre->idSem)}}"><span class="mini-sub-pro">Liste des exclus</span></a></li>
                        </ul>
                    </li>

                    <li>
                        <a title="Groupes" href="{{url('enseignant/groupes')}}" aria-expanded="false"><span class="educate-icon educate-student icon-wrap" aria-hidden="true"></span> <span class="mini-click-non"> Groupes</span></a>
                    </li>

                    <li>
                        <a title="Correction" href="{{url('correction/choix/'.$semestre->idSem)}}" aria-expanded="false"><i class="fa fa-pencil"></i> <span class="mini-click-non"> Correction</span></a>
                    </li>

                    <li>
                        <a title="Correction" href="{{url('gestion/correction/choix/'.$semestre->idSem)}}" aria-expanded="false"><i class="fa fa-calculator" aria-hidden="true"></i> <span class="mini-click-non"> Gestion notes</span></a>
                    </li>

                    <li>
                        <a class="has-arrow" href="index.html">
                                <span class="educate-icon educate-course icon-wrap"></span>
                               <span class="mini-click-non">Gestion paquets</span>
                            </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li><a title="Controle continu" href="{{url('gestion/paquet/controle/'.$semestre->idSem)}}"><span class="mini-sub-pro">Controle continu</span></a></li>
                            <li><a title="Examen" href="{{url('gestion/paquet/examen/'.$semestre->idSem)}}"><span class="mini-sub-pro">Examen</span></a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg"></span> <span class="mini-click-non">Emplois du temps</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Mon emplois du temps" href="all-students.html"><span class="mini-sub-pro">Mon emplois du temps</span></a></li>
                            <li><a title="Emplois du temps du groupe" href="add-student.html"><span class="mini-sub-pro">Emplois du temps du groupe</span></a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-message icon-wrap"></span> <span class="mini-click-non">Mailbox</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Inbox" href="mailbox.html"><span class="mini-sub-pro">Inbox</span></a></li>
                            <li><a title="View Mail" href="mailbox-view.html"><span class="mini-sub-pro">View Mail</span></a></li>
                            <li><a title="Compose Mail" href="mailbox-compose.html"><span class="mini-sub-pro">Compose Mail</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- End Left menu area -->
