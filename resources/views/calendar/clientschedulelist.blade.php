<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>AGENDA-IBPH</title>
    <link rel="stylesheet" href="{{asset('agenda/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="{{asset('agenda/assets/fonts/font-awesome.min.css')}}">
</head>

<body id="page-top">

    <!--NAVEGADOR-->
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#page-top">IBPH</a>

            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right"
                type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger"
                            href="#agenda">AGENDA</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger"
                            href="#portfolio">Minhas inscrições</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#about">lista
                            de eventos</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#team">ibph</a>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger"
                            href="#contact">Contato</a></li>
                </ul>
            </div>

        </div>
    </nav>

    <header class="masthead" style="background-image:url({{asset('agenda/assets/img/header2.jpg')}});">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><span>LISTA DE EVENTOS</span></div>
                <div class="intro-heading text-uppercase"><span>Inscreva-se já</span></div><a
                    class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" role="button"
                    href="#agenda">Agenda</a>
            </div>
        </div>
    </header>

    <section id="agenda">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">agenda</h2>
                    <h3 class="text-muted section-subheading"><b> Olá, Senhor(a) {{$client->nome}}.</b><br> Clique sob o
                        evento e escolha o horário para agendamento de sua entrevista.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-12 col-lg-12">

                    @include('layout.msg')
                    <div id='calendar' style="width:100%"></div>


                </div>
            </div>
        </div>
    </section>

    <section id="portfolio" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    @if(count($client_event_list)>0)
                    <h2 class="text-uppercase section-heading">Minhas inscrições</h2>
                    <h3 class="section-subheading text-muted">Lista de suas inscrições.</h3>
                    @else
                    <div class="alert alert-warning" role="alert">
                        <i class="fa fa-exclamation-triangle"></i> Você ainda não se inscreveu em nenhum evento!
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                @if(count($client_event_list)>0)
                @foreach($client_event_list as $c)
    
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <a class="open-portfolioModal portfolio-link" data-toggle="modal" data-target="#portfolioModal" data-id="{{ $c->clienteschedule_id }}">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{asset('agenda/assets/img/portfolio/event_client2.png')}}">
                    </a>
                    <div class="portfolio-caption">
                        <h4>{{$c->title}}</h4>
                        <?php setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); ?>
                        <p class="text-muted">Às {{date('H:i', strtotime($c->datetime))}} horas</p>
                        <p class="text-muted">{{ ucfirst( utf8_encode( strftime('%A, %d de %B de %Y', strtotime("2016-09-22") ) ) ) }}</p>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase">lista de eventos</h2>
                    <h3 class="text-muted section-subheading">Abaixo encontra-se a lista de eventos</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <ul class="list-group timeline">
                        @isset($events[0])
                        <li class="list-group-item">
                            <div class="timeline-image"><img class="rounded-circle img-fluid"
                                    src="{{asset('agenda/assets/img/event_story_left.png')}}"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>{{ ucfirst( utf8_encode( strftime('%d de %B de %Y', strtotime($events[0]->start_datetime) ) ) ) }}</h4>
                                    <h4 class="subheading">{{$events[0]->title}}</h4>
                                    <small>
                                        <i class="fa fa-clock-o"></i>
                                        {{date('H:i',strtotime($events[0]->start_datetime)) ." até ". date('H:i',strtotime($events[0]->end_datetime))}}
                                    </small>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">
                                        {{$events[0]->description}}
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endisset
                        @isset($events[1])
                        <li class="list-group-item timeline-inverted">
                            <div class="timeline-image"><img class="rounded-circle img-fluid"
                                    src="{{asset('agenda/assets/img/event_story_right.png')}}"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>{{ ucfirst( utf8_encode( strftime('%d de %B de %Y', strtotime($events[1]->start_datetime) ) ) ) }}</h4>
                                    <h4 class="subheading">{{$events[1]->title}}</h4>
                                    <small>
                                        <i class="fa fa-clock-o"></i>
                                        {{date('H:i',strtotime($events[1]->start_datetime)) ." até ". date('H:i',strtotime($events[1]->end_datetime))}}
                                    </small>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">
                                        {{$events[1]->description}}
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endisset
                        @isset($events[2])
                        <li class="list-group-item">
                            <div class="timeline-image"><img class="rounded-circle img-fluid"
                                    src="{{asset('agenda/assets/img/event_story_left.png')}}"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>{{ ucfirst( utf8_encode( strftime('%d de %B de %Y', strtotime($events[2]->start_datetime) ) ) ) }}</h4>
                                    <h4 class="subheading">{{$events[2]->title}}</h4>
                                    <small>
                                        <i class="fa fa-clock-o"></i>
                                        {{date('H:i',strtotime($events[2]->start_datetime)) ." até ". date('H:i',strtotime($events[2]->end_datetime))}}
                                    </small>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">
                                        {{$events[2]->description}}
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endisset
                        @isset($events[3])
                        <li class="list-group-item timeline-inverted">
                            <div class="timeline-image"><img class="rounded-circle img-fluid"
                                    src="{{asset('agenda/assets/img/event_story_right.png')}}"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>{{ ucfirst( utf8_encode( strftime('%d de %B de %Y', strtotime($events[3]->start_datetime) ) ) ) }}</h4>
                                    <h4 class="subheading">{{$events[3]->title}}</h4>
                                    <small>
                                        <i class="fa fa-clock-o"></i>
                                        {{date('H:i',strtotime($events[3]->start_datetime)) ." até ". date('H:i',strtotime($events[3]->end_datetime))}}
                                    </small>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">
                                        {{$events[3]->description}}
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endisset
                        <li class="list-group-item timeline-inverted">
                            <div class="timeline-image">
                                @if(isset($events))
                                <h4>Últimos<br>&nbsp;Eventos<br>&nbsp;Agendados</h4>
                                @else
                                <h4>Não<br>&nbsp;há eventos<br>&nbsp;Agendados</h4>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="team" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="team-member"><img class="rounded-circle mx-auto"
                            src="{{asset('agenda/assets/img/team/roberto.jpg')}}">
                        <h4>Roberto Rangel</h4>
                        <p class="text-muted">PRESIDENTE DO IBPH</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="team-member"><img class="rounded-circle mx-auto"
                            src="{{asset('agenda/assets/img/team/daniela.jpg')}}">
                        <h4>Dra. Daniela M. Pena</h4>
                        <p class="text-muted">PSICÓLOGA</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto"
                            src="{{asset('agenda/assets/img/clients/tti.png')}}"></a>
                </div>
                <div class="col-sm-8 col-md-8">
                    <p class="text-muted" style="padding:30px;">A TTI Success Insights é, hoje, no mercado
                        internacional, uma referência em pesquisa e inovação de soluções para a identificação e
                        desenvolvimento de talentos. Está no mercado há mais de 30 anos, com presença em 90 países e
                        relatórios em mais de 20 idiomas.</p>
                </div>
                <!-- <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto"
                                src="assets/img/clients/designmodo.jpg"></a></div>
                    <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto"
                                src="assets/img/clients/envato.jpg"></a></div>
                    <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto"
                                src="assets/img/clients/themeforest.jpg"></a></div> -->
            </div>
        </div>
    </section>
    <section id="contact" style="background-image:url('assets/img/map-image.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">contato</h2>
                    <h3 class="section-subheading text-muted">Entre em contato com Roberto Rangel.</h3>
                    @include('layout.msg_mail')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="{{ route('calendar.sendemailschedule') }}">
                        <div class="form-row">
                            <div class="col col-md-6">
                                <div class="form-group"><input class="form-control" type="text" name="Nome" id="name"
                                        placeholder="Seu nome *" required=""><small
                                        class="form-text text-danger flex-grow-1 help-block lead"></small></div>
                                <div class="form-group"><input class="form-control" type="email" name="Email" id="email"
                                        placeholder="Seu E-mail *" required=""><small
                                        class="form-text text-danger help-block lead"></small></div>
                                <div class="form-group"><input class="form-control" type="tel" name="Telefone"
                                        placeholder="Seu Telefone *" required=""><small
                                        class="form-text text-danger help-block lead"></small></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><textarea class="form-control" id="message" name="Mensagem"
                                        placeholder="Sua mensagem *" required=""></textarea><small
                                        class="form-text text-danger help-block lead"></small></div>
                            </div>
                            <div class="col">
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div><button class="btn btn-primary btn-xl text-uppercase"
                                    id="sendMessageButton" type="submit">Enviar mensagem</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4"><span class="copyright">IBPH © 2019</span></div>
                <div class="col-md-4 col-lg-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="https://www.youtube.com/channel/UCoybhapfG93NLe5YG16QMTg"
                                target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.facebook.com/ibphumana/" target="_blank"><i
                                    class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/ibph_2018/" target="_blank"><i
                                    class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a
                                href="https://www.linkedin.com/in/roberto-ibph-22689753?originalSubdomain=br"
                                target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks"></ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- MODAL EXIBIR AGENDAMENTO -->
    <div class="modal fade portfolio-modal text-center" role="dialog" tabindex="-1" id="portfolioModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <h2 class="text-uppercase" id="scheduleTitle"></h2>
                                    <p class="item-intro text-muted" id="scheduleEventDate"></p>
                                    <i class="fa fa-calendar-check-o fa-5x"></i>
                                    <p id="scheduleEventDescription" class="p-3"></p>
                                    
                                    <ul class="list-unstyled">
                                        <li>Nome: <span  id="scheduleClientName"></span></li>
                                        <li>Data: <span  id="scheduleDate"></span></li>
                                        <li>Horário: <span  id="scheduleHour"></span></li>
                                        <li>Comentário: <span  id="scheduleComment"></span></li>    
                                    </ul>
                                    <input type="hidden" value="" id="schedule_inscricao_id">
                                    <input type="hidden" value="" id="schedule_schedule_id">
                                    <a href="#" class="btn btn-danger" id="schedulecancel"><i
                                            class="fa fa-trash"></i> Desmarcar</a>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button"><i
                                            class="fa fa-times"></i><span>&nbsp;Fechar</span></button>
                                           
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>>

    <!-- MODAL -->

    <!-- EXIBIR EVENTO -->
    <div class="modal fade portfolio-modal text-center" role="dialog" tabindex="-1" id="eventShow">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <h2 class="text-uppercase" id="titleShow"></h2>
                                    <p class="item-intro text-muted">Sobre o evento</p>
                                    <p id="descriptionShow"></p>
                                    <ul class="list-unstyled">
                                        <li>Data: <span id="dataInitShow"></span> - <span id="dataEndShow"></span></li>
                                    </ul>
                                    <input type="hidden" class="form-control" id="idShow" name="idEvent" required>
                                    <div class="modal-body">
                                        <a href="javascript:createSchedule()" id="openModalEventSchedule"
                                            class="btn btn-danger">Agendar</a>
                                    </div>
                                    <button class="btn btn-primary" data-dismiss="modal" id="closeModalEventShow"
                                        type="button"><i class="fa fa-times"></i><span>&nbsp;Fechar</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- EDITAR EVENT -->
    <div class="modal fade portfolio-modal text-center" role="dialog" tabindex="-1" id="eventDetail">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <form method="post" action="{{route('calendar.putevent')}}">
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="titleEvent">Título</label>
                                            <input type="text" class="form-control" id="titleDetail"
                                                name="Titulo_Detalhe" placeholder="Título do Evento" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Descrição</label>
                                            <textarea class="form-control" id="descriptionDetail"
                                                name="Descricao_Detalhe" placeholder="Descrição do Evento"
                                                required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Data</label>
                                            <input type="date" class="form-control" id="dataDetail" name="Data_Detalhe"
                                                placeholder="Data do Evento" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="time" class="form-control" id="start_datetimeDetail"
                                                        name="Hora_Inicio_Detalhe" required>
                                                </div>
                                                <div class="col">
                                                    <input type="time" class="form-control" id="end_datetimeDetail"
                                                        name="Hora_Fim_Detalhe" required>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" value="{{$client->id}}" id="client_id">
                                        <input type="hidden" class="form-control" id="idDetail" name="idEvent" required>
                                        <button type="submit" class="btn"
                                            style="background:#4747d1; color:#fff;">Editar</button>
                                        <a href="javascript:delEvent()" class="btn btn-primary">Deletar</a>
                                        @csrf
                                    </form>
                                </div>
                                <button class="btn btn-primary" data-dismiss="modal" type="button"><i
                                        class="fa fa-times"></i><span>&nbsp;Fechar</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- AGENDAMENTO -->
    <div class="modal fade portfolio-modal text-center" role="dialog" tabindex="-1" id="eventSchedule">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">


                                    <div class="addEvent">
                                        <h2 class="title">Agendamento</h2>
                                        <p><b>Evento:</b> <span id="eventTitle"></span></p>
                                        <form method="post"
                                            action="{{ route('calendar.postcreateschedule',$client->id)}}">
                                            <div class="form-group">
                                                <label for="titleEvent">Nome</label>
                                                <input type="text" class="form-control" id="name" name="Nome"
                                                    placeholder="Seu nome" value="{{$client->nome}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Comentario">Comentário</label>
                                                <textarea class="form-control" id="description" name="Comentario"
                                                    placeholder="Comentário" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="Comentario">Horários</label>
                                                <div class="row">                                                    
                                                    <div class="col">
                                                        <select id="option" name="Horario" class="form-control"></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success"
                                                style="margin-top:10px">Cadastrar</button>  
                                            <button class="btn btn-primary" data-dismiss="modal"  
                                            style="margin-top:10px" type="button"><i class="fa fa-times"></i><span>&nbsp;Fechar</span></button>                                        
                                            @csrf
                                        </form>
                                    </div>

                                    <input type="hidden" class="form-control" id="idShow" name="idEvent" required>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



    <!--<script src="{{ asset('agenda/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('agenda/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="{{ asset('agenda/assets/js/agency.js')}}"></script>-->
    <link rel='stylesheet' href="{{ asset('assets/calendar/fullcalendar.css') }}" />
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('assets/calendar/style/bootstrap.min.css') }}"/>-->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/locale/pt-br/lang-all.js'></script>
    <script src="{{ asset('assets/calendar/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/calendar/lib/moment.min.js') }}"></script>
    <script src="{{ asset('assets/calendar/fullcalendar.js') }}"></script>
    <script src="{{ asset('assets/calendar/locale/pt-br.js') }}"></script>
    <script src="{{ asset('assets/calendar/calendar.js') }}"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function delEvent() {
            var campo = document.getElementById('idDetail');
            document.location.href = "/calendar/deleteevent/" + campo.value;
        }

        function createSchedule() {
            var campo = document.getElementById('idShow');
            //console.log(campo.value);
            var url = location.href;
            url = url.split("/");
            url1 = "http://" + url[2] + "/api/calendar/event/" + campo.value;
            url2 = "http://" + url[2] + "/api/calendar/eventhours/" + campo.value;
            
            console.log(url1,url2)
            $('#closeModalEventShow').click();
            $('#eventSchedule').modal('toggle');

            $.getJSON(url1, function (data) {                
                $('#eventTitle').html( data.title )                
            })
            $.getJSON(url2,function(data){
                $.each(data,function(index,data){
                    $('#option').append( `<option value="${data.id}">Às ${moment(data.datetime).format('HH:mm')} horas, Nº de vagas: ${data.vacancy}</option>` )
                })                
            })
        }

        $('#portfolioModal').on('show.bs.modal', function (event) {
            
    var button = $(event.relatedTarget);
        var id = button.data('id');
        console.log(location.href)

        var url = location.href;
            url = url.split("/");
            url = "http://" + url[2] + "/api/calendar/clientschedule/" + id;

        $.getJSON(url, function (data) {             
                $('#scheduleTitle').html( data.title );
                $('#scheduleEventDescription').html( data.description );
                $('#scheduleEventDate').html( moment(data.start_datetime).format("DD/MM/YYYY HH:mm") + " - " + moment(data.end_datetime).format("DD/MM/YYYY HH:mm"));
                $('#scheduleHour').html( moment(data.datetime).format("HH:mm") );
                $('#scheduleDate').html( moment(data.datetime).format("DD/MM/YYYY") );
                $('#scheduleComment').html( data.comment );
                $('#scheduleClientName').html( data.nome );

            })


        $("#schedulecancel").on("click", function(){
            $.getJSON(url, function (data) {
            console.log(data)
            var url = location.href;
            url = url.split("/");
            url = "http://" + url[2] + "/calendar/clientschedule/delete/" + data.inscricao_id + "/" + data.schedule_id + "/" + data.clienteschedule_id;
            window.location.href = url;
        });
        });
})


    </script>
</body>

</html>
