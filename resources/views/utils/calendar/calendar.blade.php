@extends('layouts.app')

<!-- Styles -->
@section('styles')
    <link rel="stylesheet" href="css/fullcalendar.min.css"/>
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
                                {{__('msg_layouts_app.dragevent')}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <small>
                                    <kbd>click</kbd> : {{__('msg_layouts_app.editEvent')}}, <kbd>Shift-Click</kbd>
                                    : {{__('msg_layouts_app.deleteEvent')}}
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
                                    <div class="fc-event bg-success">{{__('msg_layouts_app.Normal')}}</div>
                                    <div class="fc-event mt-1 bg-secondary">{{__('msg_layouts_app.Doppler')}}</div>
                                    <div class="fc-event mt-1 bg-delete">{{__('msg_layouts_app.Colposcopy')}}</div>
                                    <div class="fc-event mt-1 bg-default">{{__('msg_layouts_app.Other')}}</div>
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

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="event-title" class="col-form-label">Title:</label>
                                <input type="text" class="form-control" id="event-title">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" data-whatever="save">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal -->

    </div>

@endsection
<!-- /Content -->



<!-- Scripts -->
@section('scripts')
    {{-- Moved the following 2 lines to the layout file --}}
    {{--<script src="js/jquery.min.js"></script>--}}
    {{--<script src="js/bootstrap.min.js"></script>--}}
    {{--<script src="js/jquery-ui.min.js"></script>--}}

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
                            console.log('Event created');
                            $('#calendar').fullCalendar('refetchEvents');
                        },
                        error: function (json) {
                            console.log("Error at createEvent");
                        }
                    });
                },

                // eventclick, working copy
                /*
                eventClick: function (event, jsEvent, view) {
                    crsfToken = document.getElementsByName("_token")[0].value;

                    if (jsEvent.originalEvent.shiftKey == true) {

                        /!*var con = confirm("Do you really want to delete this event ?");
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
                        }*!/
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

                        var newTitle = prompt("Enter new Name :", event.title);
                        if (newTitle == null || newTitle == "") {

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

*/

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

                dayClick: function (date, jsEvent, view) {
                    if (view.name === "month") {
                        $('#calendar').fullCalendar('gotoDate', date);
                        $('#calendar').fullCalendar('changeView', 'agendaDay');
                    }
                },


                // working copy , original is commented out above !!!
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
                                console.log("Event deleted");
                            }
                        });

                    } else {

                        $('#myModal').modal({
                            keyboard: false
                        });

                        $('#myModal').on('shown.bs.modal', function(e){
                            var titleString = event.title;
                            var modal = $(this);
                            modal.find('.modal-body input').val(titleString);
                        });

                        $('#myModal').on('hide.bs.modal', function(e){

                            var button = $(e.relatedTarget);
                            var buttonText = button.data('whatever');
                            console.log(button.data('whatever'));
                            var modal = $(this);
                            var newTitle = modal.find('.modal-body input').val();
                            if (newTitle == null || newTitle == "") {

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
                        });
                    }
                },
            });
        });
    </script>
@endsection
<!-- /Scripts -->