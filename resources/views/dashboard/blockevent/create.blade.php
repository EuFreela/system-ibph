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

    <div class="addBlockEvent">
        <h2 class="title">Cadastro de Bloqueios</h2>
        <form method="post" action="{{ route('dashboard.postblockeventcreate') }}">
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
                        <input type="date" class="form-control" id="start" name="Data_Inicio" placeholder="Início" required>
                    </div>
                    <div class="col">
                        <label for="end">Data Fim</label>
                        <input type="date" class="form-control" id="end" name="Data_Fim" placeholder="Fim" required>
                    </div>
                </div>
            </div>
            <input type="hidden" name="Cliente" value="1234"/>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            @csrf

        </form>

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
    </script>
@endsection
