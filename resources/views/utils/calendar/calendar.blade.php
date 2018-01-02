@extends('layouts.app')

<!-- Styles -->
@section('styles')
    <link rel="stylesheet" href="css/fullcalendar.min.css"/>
    <link rel="stylesheet" href="css/alertify.min.css">
    <link rel="stylesheet" href="css/themes/default.css">
@endsection
<!-- /Styles -->

<!-- Content -->
@section('content')

    <div class="container">

        <!-- Start Row -->
        <div class="row">
            {!! Form::open(['route' => ['createEvent'], 'method' => 'POST', 'id' =>'form-calendar']) !!}
            {!! Form::close() !!}
        </div>
        <!-- End Row -->

        <!-- Start Row -->
        <div class="row mt-3">

            <!-- Start Column -->
            <div class="col-md-12 ">

                <!-- Card -->
                <div class="card">

                    <!-- Card Header -->
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 lead">
                                {{__('calendar.dragevent')}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <small>
                                    <kbd>click</kbd> : {{__('calendar.editEvent')}}, <kbd>Shift-Click</kbd>
                                    : {{__('calendar.deleteEvent')}}
                                </small>
                            </div>
                        </div>
                    </div>
                    <!-- /Card Header -->

                    <!-- Card Body -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-2">
                                <div id="external-events">
                                    <div class="fc-event bg-success">{{__('calendar.Normal')}}</div>
                                    <div class="fc-event mt-1 bg-secondary">{{__('calendar.Doppler')}}</div>
                                    <div class="fc-event mt-1 bg-delete">{{__('calendar.Colposcopy')}}</div>
                                    <div class="fc-event mt-1 bg-default">{{__('calendar.Other')}}</div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div id="calendar"></div>
                            </div>
                        </div>

                    </div>
                    <!-- /Card Body -->

                </div>
                <!-- /Card -->

            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

    </div>

@endsection
<!-- /Content -->



<!-- Scripts -->
@section('scripts')
    <script src="js/moment.min.js"></script>
    <script src="js/fullcalendar.min.js"></script>
    <script src="js/locale-all.js"></script>
    <script src="js/alertify.min.js"></script>

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
                defaultView: 'agendaWeek',
                locale: '{{auth()->user()->language->language}}',
                defaultDate: '{{\Carbon\Carbon::now()}}',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events

                eventTextColor: '#ffffff',

                //weekends: false,

                slotDuration: '00:15:00',

                defaultTimedEventDuration: '00:15:00',

                minTime: '15:00:00',
                maxTime: '21:30:00',

                events: {url: "loadevents"},

                editable: true,

                // the following 2 are needed for to drag
                // a new event only into businessHours
                eventConstraint: 'businessHours',
                selectConstraint: 'businessHours',

                droppable: true, // this allows things to be dropped onto the calendar !!!

                businessHours: {
                    dow: [1, 2, 4], // Monday = 1
                    start: '16:00',
                    end: '20:00',
                },

                allDaySlot: false,
                scrollTime: '14:00:00',

                drop: function (date, allDay) {

                    var originalEventObject = $(this).data('eventObject');
                    var copiedEventObject = $.extend({}, originalEventObject);

                    allDay = false;
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    copiedEventObject.backgroundColor = $(this).css("background-color");
                    copiedEventObject.borderColor = $(this).css("border-color");
                    copiedEventObject.constraint = 'businessHours';

                    if ($('#drop-remove').is(':checked')) {
                        $(this).remove();
                    }

                    var title = copiedEventObject.title;
                    var start = copiedEventObject.start.format("YYYY-MM-DD HH:mm");
                    var color = copiedEventObject.backgroundColor;
                    var constraint = copiedEventObject.constraint;

                    crsfToken = document.getElementsByName("_token")[0].value;
                    $.ajax({
                        url: 'createEvent',
                        data: 'title=' + title + '&start=' + start + '&allday=' + allDay + '&color=' + color + '&constraint=' + constraint,
                        type: "POST",
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        success: function (events) {
                            console.log('Event created - drop');
                            $('#calendar').fullCalendar('refetchEvents');
                        },
                        error: function (json) {
                            console.log("Error at createEvent - drop");
                        }
                    });
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
                            console.log("Updated Successfully - eventresize");
                            $('#calendar').fullCalendar('refetchEvents');
                        },
                        error: function (json) {
                            console.log("Error at updateEvent - eventresize");
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
                            console.log("Updated Successfully - eventdrop");
                            $('#calendar').fullCalendar('refetchEvents');
                        },
                        error: function (json) {
                            console.log("Error at update - eventdrop");
                        }
                    });
                },

                dayClick: function (date, jsEvent, view) {
                    if (view.name === "month") {
                        $('#calendar').fullCalendar('gotoDate', date);
                        $('#calendar').fullCalendar('changeView', 'agendaDay');
                    }
                },

                eventClick: function (event, jsEvent, view) {
                    crsfToken = document.getElementsByName("_token")[0].value;

                    if (jsEvent.originalEvent.shiftKey == true) {
                        $.ajax({
                            url: 'deleteEvent',
                            data: 'id=' + event.id,
                            headers: {
                                "X-CSRF-TOKEN": crsfToken
                            },
                            type: "POST",
                            success: function () {
                                $('#calendar').fullCalendar('removeEvents', event._id);
                                alertify.notify('{{__('calendar.deleted')}}', 'error', 3, function(){});
                                console.log("Event deleted - eventclick");
                            }
                        });

                    } else {

                        alertify.prompt(
                            '{{ __('calendar.Change Title') }}',
                            '{{ __('calendar.New Title') }}',
                            event.title,
                            function (evt, value) {

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
                                    data: 'id=' + id + '&title=' + value + '&start=' + start + '&end=' + end,
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


                                alertify.success('{{__('calendar.Saved Message')}}');
                            },
                            function () {
                                alertify.error('{{__('calendar.Cancel')}}')
                            }
                        ).set({
                            'modal': false,
                            transition: 'fade',
                            'movable':true,
                            'moveBounded': true,
                            'pinnable': false,
                            'closable': false,
                            'labels': {ok:'{{__('calendar.Ok')}}', cancel:'{{__('calendar.Cancel')}}'}
                        });
                    }
                },

            });
        });
    </script>
@endsection
<!-- /Scripts -->