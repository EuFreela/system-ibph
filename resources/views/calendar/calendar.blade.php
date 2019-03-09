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



    <div id='calendar'></div>


@endsection

@section('script')
<script src="{{ asset('assets/calendar/packages/core/main.js') }}"></script>
<script src="{{ asset('assets/calendar/packages/interaction/main.js') }}"></script>
<script src="{{ asset('assets/calendar/packages/daygrid/main.js') }}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/locale/pt-br/lang-all.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
      
    var calendarEl = document.getElementById('calendar');

    var initialLocaleCode = 'pt-br';

    var calendar = new FullCalendar.Calendar(calendarEl, {
          
      locale: initialLocaleCode,
      plugins: [ 'interaction', 'dayGrid' ],
      defaultDate: '2019-02-12',
      buttonIcons: false, // show the prev/next text
			weekNumbers: true,
			editable: true,
      eventLimit: true,
      
      eventColor: '#3366ff',
      eventTextColor: '#fff',
      eventBorderColor: '#fff',
    

      events: [
        {
          title: 'Eveno 1',
          start: '2019-02-01'
        },
        {
          title: 'Eveno 1',
          start: '2019-02-07',
          end: '2019-02-10'
        },
        {
          groupId: 999,
          title: 'Eveno 1',
          start: '2019-02-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2019-02-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2019-02-11',
          end: '2019-02-13'
        },
        {
          title: 'Meeting',
          start: '2019-02-12T10:30:00',
          end: '2019-02-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2019-02-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2019-02-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2019-02-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2019-02-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2019-02-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2019-02-28'
        }
      ],
      
      eventClick: function(info) {

        //alert('Event: ' + info.event.title);            
        info.el.style.borderColor = 'red';
        info.el.style.backgroundColor = 'red';
        info.el.style.start;

      },

      selectable: true,
      select: function (start, end, allDay) {
          start = $.fullCalendar.formatRange(start, start, 'YYYY-MM-DD');
          newEvent(start);
          alert('Valor da data: ' + start);
      }

    });

    calendar.render();
  });

  

</script>
@endsection