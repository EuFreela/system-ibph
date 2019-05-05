$(document).ready(function () {

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
    editable: false,
    // eventLimit: true, // allow "more" link when too many events
   
    eventSources: [
      {
        url: '/api/calendar/event', // use the `url` property
        textColor: 'white',  // an option
        color: '#cc5200',
      },
     
      {
       
        events: function(start, end, timezone, callback)
        {

          jQuery.ajax({
              url: '/api/calendar/eventblock',
              type: 'GET',
              dataType: 'json',
              success: function(doc) {

                      var events = [];
                  if (!doc.length == 0) {
                    for (var i = 0; i < doc.length; i++) {
                      events.push({
                        start: doc[i].start,
                        end: moment(doc[i].end).add(1, 'days').format('YYYY-MM-DD'),
                        color: '#ff8080',
                        rendering: 'background',
                        dayClick: false
                      });
                    }

                  }
                      callback(events);

              }
          });
        }

      }
      
    ],
    
    dayClick: function (date, jsEvent, view) {

      jQuery.ajax({
        url: '/api/calendar/eventblock',
        type: 'GET',
        dataType: 'json',
        success: function(doc)
        {

          var fDate, lDate, cDate;
          var blocks = new Array(doc.length);
          var aux = 0;

          if( !doc.length == 0 ) {

            for (var i = 0; i < doc.length; i++) { blocks[i] = doc[i]; }
            for (var i = 0; i < blocks.length; i++) {

              fDate = Date.parse(blocks[i].start);
              lDate = Date.parse(blocks[i].end);
              cDate = Date.parse(date.format());

              if ( (cDate <= lDate && cDate >= fDate) )
                aux = aux + 1;
            }

            if( aux > 0) { alert('Esta data esta bloqueada!'); }else{ setEvent(date); }

            }else { setEvent(date); }

        }
      });
        //console.log($('#dateEndEvent').val());
    },

    eventClick: function (calEvent, jsEvent, view) {

      var session_client_id = $('#client_id').val();

      if(calEvent.client_id == session_client_id) {
        $('#eventDetail').modal("show");
        $('#titleDetail').val(calEvent.title);
        $('#descriptionDetail').val(calEvent.description);
        $('#start_datetimeDetail').val(moment(calEvent.start_datetime).format('HH:mm'));
        $('#end_datetimeDetail').val(moment(calEvent.end_datetime).format('HH:mm'));
        $('#dataDetail').val(moment(calEvent.start_datetime).format('YYYY-MM-DD'));
        $('#idDetail').val(calEvent.id);
      }else{
        $('#eventShow').modal("show");
        console.log($('#eventos'));
        $('#titleShow').html(calEvent.title);
        $('#descriptionShow').html(calEvent.description);
        $('#dataInitShow').html(moment(calEvent.start_datetime).format('DD/MM/YYYY HH:mm'));
        $('#dataEndShow').html(moment(calEvent.end_datetime).format('DD/MM/YYYY HH:mm'));
        $('#idShow').val(calEvent.id);
      }

    },

  });


  function setEvent(date)
  {
    // $('#eventos').modal("show");
    // var $start_hour = '';
    // var $end_hour = '';
    // $('#start_hora').change(function () {
    //   var $start_hour = $('#start_hora').val();
    //   $('#dateStartEvent').val(date.format() + 'T' + $start_hour);
    //   //console.log('tesete: '+$('#dateStartEvent').val());
    // });
    // $('#end_hora').change(function () {
    //   var $end_hour = $('#end_hora').val();
    //   $('#dateEndEvent').val(date.format() + 'T' + $end_hour);
    // });
  }

});
