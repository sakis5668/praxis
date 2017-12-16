@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">

        <div class="col-md-4 offset-md-4 mt-5">

            <div class="card">

                <div class="card-header">
                    Pregnancy Calculator
                </div>

                <div class="card-body">

                    {!! Form::open(['method'=>'get']) !!}
                    <div class="row my-2">
                        <div class="col-md-6 text-right">
                            {!! Form::label('lmp','LMP :') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('lmp', null, ['class'=>'form-control', 'onblur'=>'return calculateEDD()']) !!}
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-md-6 text-right">
                            {!! Form::label('edd', 'EDD :') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('edd', null, ['class'=>'form-control', 'onblur'=>'return setCorrEDD()']) !!}
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-md-6 text-right">
                            {!! Form::label('corret', 'Corr.EDD :') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('corret', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <hr>

                    <div class="row my-2">
                        <div class="col-md-6 text-right">
                            {!! Form::label('date', 'Date : ') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('date', \Carbon\Carbon::now()->format('d.m.Y'),['class'=>'form-control', 'onblur'=>'return getWksString()']) !!}
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-md-6 text-right">
                            {!! Form::label('pregnancy_age', 'Wks : ') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('pregnancy_age', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>

            </div>

        </div>

    </div>


@endsection


@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.4/moment.min.js"></script>

    <script>
        function calculateEDD() {
            var lmp = document.getElementById('lmp').value;
            var lmpDate = moment(lmp, 'D.M.YYYY').format('DD.MM.YYYY');
            var etDate = moment(lmp, 'D.M.YYYY').add(280, 'days').format('DD.MM.YYYY');
            document.getElementById('lmp').value = lmpDate;
            document.getElementById('edd').value = etDate;
        }
    </script>
    <script>
        function setCorrEDD() {
            var edd = document.getElementById('edd').value;
            var eddDate = moment(edd, 'D.M.YYYY').format('DD.MM.YYYY');
            document.getElementById('corret').value = eddDate;
        }
    </script>
    <script>
        function getWksString() {
            var date = moment(document.getElementById('date').value, 'D.M.YYYY');
            var corret = moment(document.getElementById('corret').value, 'D.M.YYYY');
            var days = 280 + moment.duration(date.diff(corret)).asDays();
            var wks = ~~(days / 7);
            var ds = ~~(days % 7);
            var wksString = wks + '+' + ds;
            document.getElementById('date').value = date.format('DD.MM.YYYY');
            document.getElementById('pregnancy_age').value = wksString;
        }
    </script>

@endsection

