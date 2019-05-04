@extends('layout.app')
@section('css')
    <link href="{{ asset('assets/calendar/packages/core/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('assets/calendar/packages/daygrid/main.css') }}" rel='stylesheet' />
    <style>
        body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
@endsection

@section('content')


    @include('layout.msg')

        
    <div class="container">
    @if($ready)
        <div class="addEvent">
            <h2 class="title">Agendamento</h2>
            <p><b>Evento:</b> {{$event->title}}</p>
            <form method="post" action="{{ route('calendar.postcreateschedule',$client->id)}}">
                <div class="form-group">
                    <label for="titleEvent">Nome</label>
                    <input type="text" class="form-control" id="name" name="Nome" placeholder="Seu nome" value="{{$client->nome}}" required>
                </div>
                <div class="form-group">
                    <label for="Comentario">Comentário</label>
                    <textarea class="form-control" id="description" name="Comentario" placeholder="Comentário"></textarea>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <select name="Horario" id="" class="form-control">
                                @foreach($schedule as $s)
                                <option value="{{$s->id}}">Horário: {{date('H:i', strtotime($s->datetime))}} - Vagas: {{$s->vacancy}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top:10px">Cadastrar</button>
                <a class="btn btn-secondary" style="margin-top:10px" href="{{route('calendar.calendar')}}">Cancelar</a>
                @csrf
            </form>
    </div>
            @else
            <p>Qualquer coisa</p>
            @endif
    </div>
        

@endsection

@section('script')



    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/locale/pt-br/lang-all.js'></script>
    <link rel='stylesheet' href="{{ asset('assets/calendar/fullcalendar.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/calendar/style/bootstrap.min.css') }}"/>
    <script src="{{ asset('assets/calendar/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/calendar/lib/moment.min.js') }}"></script>
    <script src="{{ asset('assets/calendar/fullcalendar.js') }}"></script>
    <script src="{{ asset('assets/calendar/locale/pt-br.js') }}"></script>
    <script src="{{ asset('assets/calendar/calendar.js') }}"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

                <script>
        function delEvent()
        {
            var campo = document.getElementById('idDetail');
            document.location.href="/calendar/deleteevent/"+campo.value;
        }

        $(document).ready(function() {


            $(".add").click(function(){
                var html = $(".copy").html();
                $(".after-add-more").before(html);
            });


            $("body").on("click",".remove",function(){
                $(this).parents(".control-group").remove();
            });
        });

    </script>
@endsection