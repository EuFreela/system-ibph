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

    <div class="listEvent">
        <table id="event">
            <thead>
            <tr>
                <th>T&iacute;tulo</th>
                <th>Inicio</th>
                <th>Fim</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{$event->title}}</td>
                <td>{{date("d/m/Y H:i", strtotime($event->start_datetime))}}</td>
                <td>{{date("d/m/Y H:i", strtotime($event->end_datetime))}}</td>
                <td><a href="{{ route('dashboard.geteventedit',$event->id) }}" class="text-info">Editar</a></td>
                <td><a href="{{ route('dashboard.deletevent',$event->id) }}">Deletar</a></td>
            </tr>
                @endforeach
            </tbody>
        </table>

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
