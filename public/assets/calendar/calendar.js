$(document).ready(function() {

  $('#calendar').fullCalendar({
    themeSystem: 'bootstrap4',
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    // defaultDate: '2019-01-12',
    locale: 'pt-br',
    displayEventTime: 'true',
    // navLinks: true, // can click day/week names to navigate views
    // selectable: true,
    // selectHelper: true,
    // select: function(start, end) {
    //
    //   var title = prompt('Título do Evento:');
    //   var eventData;
    //   if (title) {
    //     eventData = {
    //       title: title,
    //       start: start,
    //       end: end
    //     };
    //     console.log(eventData);
    //     $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
    //   }
    //   $('#calendar').fullCalendar('unselect');
    // },
    editable: true,
    // eventLimit: true, // allow "more" link when too many events

    eventSources: [
     {
       url: '/api/calendar/event', // use the `url` property
       color: 'blue',    // an option!
       textColor: 'white',  // an option
     },
   

 ],

    dayClick: function(date, jsEvent, view) {
      $('#eventos').modal("show");
      var $start_hour = '';
      var $end_hour = '';
      $('#start_hora').change(function(){
      var $start_hour = $('#start_hora').val();
      $('#dateStartEvent').val(date.format()+'T'+$start_hour);
      console.log('tesete: '+$('#dateStartEvent').val());
    });
    $('#end_hora').change(function(){
    var $end_hour = $('#end_hora').val();
    $('#dateEndEvent').val(date.format()+'T'+$end_hour);
  });
      console.log($('#dateEndEvent').val());
    },

    eventClick: function(calEvent, jsEvent, view) {

      $('#eventosDetail').modal("show");
  
    },

  });
});
