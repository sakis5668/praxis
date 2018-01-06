@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="row mt-3">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header lead">
                        {{__('msg_layouts_app.Delivery Calendar')}}
                    </div>

                    <div class="card-body">

                        <div class="col-md-12">
                            <div id="calendar"></div>
                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>

@endsection


@section('styles')

    <link rel="stylesheet" href="{{ asset('css/fullcalendar.min.css') }}"/>

@endsection


@section('scripts')

    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/fullcalendar/locale-all.js') }}"></script>

    <script>
        $(function () {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'agendaDay agendaWeek,month'
                },
                locale: '{{auth()->user()->language->language}}',
                defaultDate: '{{\Carbon\Carbon::now()}}',
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                eventTextColor: '#ffffff',
                events: {url: "loaddeliveries"},

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

