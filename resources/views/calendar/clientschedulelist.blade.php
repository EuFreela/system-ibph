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
    @if (!is_null($client))
        <table id="event">  
            <thead>
            <tr>
                <th>Evento</th>
                <th>Inicio</th>
                <th>Fim</th>
                <th>Agendado</th>
                <th>Desmarcar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($client as $c)
            <tr>
                <td>{{$c->title}}</td>
                <td>{{date("d/m/Y H:i", strtotime($c->start_datetime))}}</td>
                <td>{{date("d/m/Y H:i", strtotime($c->end_datetime))}}</td>
                <td>{{date("d/m/Y H:i", strtotime($c->datetime))}}</td>
                <td><a class="btn btn-primary" href="{{route('calendar.deleteclientschedule',[$c->inscricao_id,$c->schedule_id])}}">Excluir</a> </td>
            </tr>
                @endforeach
                
            </tbody>
        </table>
        @else
                <p>Não há agendamento</p>
        @endif
        <a href="{{route('calendar.calendar')}}" class="btn btn-primary">Eventos</a>
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
