@extends('layouts.masterEr')

@section('MobileMenu')
<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li><a href="events.html">Dashboard</a></li>
                            <li><a data-toggle="collapse" data-target="#Charts" href="#">Présence <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="{{url('presence')}}">Liste du groupe</a></li>
                                    <li><a href="index-1.html">Gestion des justificatifs</a></li>
                                    <li><a href="index-3.html">Liste des exclus</a></li>
                                    <li><a href="analytics.html">Historique</a></li>
                                </ul>
                            </li>
                            <li><a href="{{url('enseignant/groupes')}}">Groupes</a></li>
                            <li><a href="{{url('correction/choix')}}">Correction</a></li>
                            <li><a href="{{url('gestion/correction/choix')}}">Gestion notes</a></li>
                            <li><a data-toggle="collapse" data-target="#demopro" href="#">Gestion paquets <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="demopro" class="collapse dropdown-header-top">
                                    <li><a href="{{url('gestion/paquet/controle')}}">Controle continu</a>
                                    </li>
                                    <li><a href="add-student.html">Examen</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demopro" href="#">Emplois du temps <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="demopro" class="collapse dropdown-header-top">
                                    <li><a href="all-students.html">Mon emplois du temps</a>
                                    </li>
                                    <li><a href="add-student.html">Emplois du temps du groupe</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demomi" href="#">Mailbox <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="demomi" class="collapse dropdown-header-top">
                                    <li><a href="mailbox.html">Inbox</a>
                                    </li>
                                    <li><a href="mailbox-view.html">View Mail</a>
                                    </li>
                                    <li><a href="mailbox-compose.html">Compose Mail</a>
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
@endsection