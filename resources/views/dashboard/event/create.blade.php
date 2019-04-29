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
    <div class="addEvent">
        <h2 class="title">Cadastro de Eventos</h2>
        <form method="post" action="{{ route('dashboard.posteventcreate') }}">
            <div class="form-group">
                <label for="titleEvent">Título</label>
                <input type="text" class="form-control" id="titleEvent" name="Titulo" placeholder="Título do Evento" required>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control" id="description" name="Descricao" placeholder="Descrição do Evento" required></textarea>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="start">Data Início</label>
                        <input type="date" class="form-control" id="dateStartEvent" name="Data_Inicio" placeholder="Início" required>
                    </div>
                    <div class="col">
                        <label for="end">Data Fim</label>
                        <input type="date" class="form-control" id="dateEndEvent" name="Data_Fim" placeholder="Fim" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="time" class="form-control" id="start_hora" name="Hora_Inicio" placeholder="Início" required>
                    </div>
                    <div class="col">
                        <input type="time" class="form-control" id="end_hora" name="Hora_Fim" placeholder="Fim" required>
                    </div>
                </div>
            </div>
            <input type="hidden" name="Cliente" value="1234"/>

            <div class="row">
                <div class="col">
            <p>Hor&aacute;rios disponíveis para entrevistas</p>
            <div class="input-group control-group after-add-more" style="margin-top:10px">
                <label for="hour">Hora</label>
                <input type="time" name="hours[]" id="hour" class="form-control">
                <label for="vacancy">Vagas</label>
                <input type="number" name="vacancy[]" id="vacancy" class="form-control">
                <div class="input-group-btn">
                    <button class="btn btn-success add-more" type="button"><i class="fa fa-plus"></i></button>
                </div>
            </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top:10px">Cadastrar</button>
            @csrf
        </form>

        <div class="row">
            <!-- Copy Fields -->
            <div class="copy hide">
                <div class="control-group input-group" style="margin-top:10px">
                    <label for="hour">Hora</label>
                    <input type="time" name="hours[]" id="hour" class="form-control">
                    <label for="vacancy">Vagas</label>
                    <input type="number" name="vacancy[]"  id="vacancy" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-danger remove" type="button"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


            $(".add-more").click(function(){
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });


            $("body").on("click",".remove",function(){
                $(this).parents(".control-group").remove();
            });


        });
    </script>
@endsection
