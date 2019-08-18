        <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="hpanel shadow-inner responsive-mg-b-30">
                            <div class="panel-body">
                                <a href="{{url('/form_mail')}}" class="btn btn-success compose-btn btn-block m-b-md">Envoyer</a>
                                 <hr>
                                <ul class="mailbox-list">
                                    <li>
                                        <a href="{{url('/boite_de_reception')}}">
                                                <span class="pull-right">{{ Auth::user()->unreadNotifications->count() }}</span>
                                                <i class="fa fa-envelope text-info"></i> Boite de réception
                                            </a>
                                    </li>
                                    <li>

                                        <a href="{{url('/envoye')}}"><i class="fa fa-paper-plane text-success"></i> Envoyés</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/brouillons')}}"><i class="fa fa-pencil text-warning"></i> Brouillon</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/corbeille')}}"><i class="fa fa-trash text-danger"></i> Corbeille</a>
                                    </li>
                                </ul>
                     
                                <hr>
                       
                            </div>
                        </div>
                    </div>