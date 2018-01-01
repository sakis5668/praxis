@extends('layouts.app')

<!-- Styles -->
@section('styles')
    <link rel="stylesheet" href="css/fullcalendar.min.css"/>
@endsection
<!-- /Styles -->



<!-- Content -->
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => ['createEvent'], 'method' => 'POST', 'id' =>'form-calendar']) !!}
                {!! Form::close() !!}
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            Draggable Events
                        </div>
                        <div class="row" id="external-events">
                            <div class="col-md-2 fc-event">Apointment</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- /Content -->



<!-- Scripts -->
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/fullcalendar.min.js"></script>
    <script src="js/locale-all.js"></script>

    <script>
        $(function () {

            function ini_events(ele) {
                ele.each(function () {
                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    };

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject);

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    });

                });
            }

            ini_events($('#external-events div.fc-event'));

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'listDay agendaWeek,month'
                },
                defaultView : 'agendaWeek',
                locale: '{{auth()->user()->language->language}}',
                defaultDate: '{{\Carbon\Carbon::now()}}',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events

                slotDuration: '00:15:00',

                defaultTimedEventDuration: '00:15:00',

                minTime: '14:00:00',
                maxTime: '22:00:00',

                events: {url: "loadevents"},

                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!

                businessHours: {
                    // days of week. an array of zero-based day of week integers (0=Sunday)
                    dow: [1, 2, 4], // Monday - Thursday

                    start: '16:00', // a start time (10am in this example)
                    end: '20:00', // an end time (6pm in this example)
                },

                allDaySlot: false,
                scrollTime: '14:00:00',


                eventClick: function (event, jsEvent, view) {
                    crsfToken = document.getElementsByName("_token")[0].value;

                    if (jsEvent.originalEvent.shiftKey == true) {

                        var con = confirm("Do you really want to delete this event ?");
                        if (con) {
                            $.ajax({
                                url: 'deleteEvent',
                                data: 'id=' + event.id,
                                headers: {
                                    "X-CSRF-TOKEN": crsfToken
                                },
                                type: "POST",
                                success: function () {
                                    $('#calendar').fullCalendar('removeEvents', event._id);
                                    console.log("Event deleted");
                                }
                            });
                        } else {
                            console.log("Canceled");
                        }

                    } else {

                        var newTitle = prompt("Enter new Name :",event.title);
                        if (newTitle==null || newTitle=="") {

                        } else {
                            var start = event.start.format("YYYY-MM-DD HH:mm");
                            if (event.end) {
                                var end = event.end.format("YYYY-MM-DD HH:mm");
                            } else {
                                var end = "null";
                            }
                            var id = event.id;
                            var allday = false;
                            $.ajax({
                                url: 'updateEvent',
                                data: 'id=' + id + '&title=' + newTitle + '&start=' + start + '&end=' + end,
                                type: "POST",
                                headers: {
                                    "X-CSRF-TOKEN": crsfToken
                                },
                                success: function (json) {
                                    console.log("Updated Successfully - eventClick");
                                    $('#calendar').fullCalendar('refetchEvents');
                                },
                                error: function (json) {
                                    console.log("Error at updateEvent - eventClick");
                                }
                            });
                        }
                    }
                },

                eventResize: function (event) {
                    var start = event.start.format("YYYY-MM-DD HH:mm");
                    if (event.end) {
                        var end = event.end.format("YYYY-MM-DD HH:mm");
                    } else {
                        var end = "NULL";
                    }
                    crsfToken = document.getElementsByName("_token")[0].value;
                    $.ajax({
                        url: 'updateEvent',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        success: function (json) {
                            console.log("Updated Successfully");
                            $('#calendar').fullCalendar('refetchEvents');
                        },
                        error: function (json) {
                            console.log("Error at updateEvent");
                        }
                    });
                },

                eventDrop: function (event, delta) {

                    crsfToken = document.getElementsByName("_token")[0].value;

                    var start = event.start.format("YYYY-MM-DD HH:mm");
                    if (event.end) {
                        var end = event.end.format("YYYY-MM-DD HH:mm");
                    } else {
                        var end = "null";
                    }

                    $.ajax({
                        url: 'updateEvent',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        success: function (json) {
                            console.log("Updated Successfully eventdrop");
                            $('#calendar').fullCalendar('refetchEvents');
                        },
                        error: function (json) {
                            console.log("Error at update eventdrop");
                        }
                    });
                },

                drop: function (date, allDay) {

                    var originalEventObject = $(this).data('eventObject');
                    var copiedEventObject = $.extend({}, originalEventObject);

                    allDay = false;
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    if ($('#drop-remove').is(':checked')) {
                        $(this).remove();
                    }

                    var title = copiedEventObject.title;
                    var start = copiedEventObject.start.format("YYYY-MM-DD HH:mm");

                    crsfToken = document.getElementsByName("_token")[0].value;
                    $.ajax({
                        url: 'createEvent',
                        data: 'title=' + title + '&start=' + start + '&allday=' + allDay,
                        type: "POST",
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        success: function (events) {
                            console.log('Event created');
                            $('#calendar').fullCalendar('refetchEvents');
                        },
                        error: function (json) {
                            console.log("Error at createEvent");
                        }
                    });
                },

                dayClick: function (date, jsEvent, view) {
                    if (view.name === "month") {
                        $('#calendar').fullCalendar('gotoDate', date);
                        $('#calendar').fullCalendar('changeView', 'agendaDay');
                    }
                },
            });

        });
    </script>
@endsection
<!-- /Scripts -->