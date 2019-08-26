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
                        @if($sem1->isEmpty() and $sem2->isEmpty())

                                 <a aria-expanded="false" href="{{ url('Semestres/index') }}" ><span class="educate-icon educate-home icon-wrap"></span>   <span class="mini-click-non">Semestres </span></a>
                            
                        @else
                           <a class="has-arrow" href="#">
                                   <span class="educate-icon educate-home icon-wrap"></span>
                                    
                                   <span class="mini-click-non">Semestres</span>
                                </a>
                         
                         
                                            <ul class="submenu-angle" aria-expanded="true">
                                                 @foreach($sem1 as $s)
                                                <li><a href="{{url('Semestres/dashboard/'.$s->idSem)}}">Semestre 1</a></li>
                           @endforeach
                          @foreach($sem2 as $s)
                                                <li><a href="{{url('Semestres/dashboard/'.$s->idSem)}}">Semestre 2</a></li>
                                               @endforeach 
                                            </ul>

                                            @endif
                        </li>
                     
                        <li>
                            <a   aria-expanded="false" href="{{url('modules/index')}}" ><span class="educate-icon educate-library icon-wrap"></span>   <span class="mini-click-non">Modules</span></a>
                           
                        </li>
                        <li>
                            <a aria-expanded="false" href="{{url('Enseignants/index')}}" ><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Enseignants</span></a>
                       
                        </li>
                       <li>
                            <a aria-expanded="false" href="{{url('/comptes_etudiants')}}" ><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Comptes Etudiants</span></a>
                       
                        </li>
                    <li>
                            <a title="Landing Page" href="{{url('Semestres/historique')}}" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Historique</span></a>
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