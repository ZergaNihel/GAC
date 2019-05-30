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
                      

                                 <a aria-expanded="false" href="{{ url('Semestres/index') }}" ><span class="educate-icon fa fa-calendar icon-wrap"></span>   <span class="mini-click-non">Absences </span></a>
                            
                 
                        </li>
                     
                        <li>
                            <a   aria-expanded="false" href="{{url('modules/index')}}" ><span class="educate-icon educate-library icon-wrap"></span>   <span class="mini-click-non">Notes</span></a>
                           
                        </li>
                        <li>
                            <a aria-expanded="false" href="{{url('Enseignants/index')}}" ><span class="educate-icon educate-event icon-wrap"></span> <span class="mini-click-non">Emploi du temps</span></a>
                       
                        </li>
                  
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-message icon-wrap"></span> <span class="mini-click-non">Boite de réception</span></a>
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