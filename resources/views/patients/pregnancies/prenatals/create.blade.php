@extends('layouts.app')

@section('content')

    @include('layouts.language')

    @include('patients.pregnancies.pregnancies-menu')

    <div class="container">
        <div class="row">

            <div class="col-md-4">
                @include('patients.pregnancies.prenatals.left-list')
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create New Prenatal Entry
                    </div>
                    <div class="card-body">
                        {!! Form::open(['method'=>'post', 'action'=>['PregnancyPrenatalsController@store', $pregnancy]]) !!}
                        <input type="hidden" name="corret" id="corret" value="{{ $pregnancy->corrected_edd->format('d.m.Y') }}">
                        <div class="row mt-3">
                            {!! Form::label('date', 'Date :', ['class'=>'col-md-2']) !!}
                            {!! Form::text('date', \Carbon\Carbon::now()->format('d.m.Y'), ['class'=>'form-control col-md-2', 'autofocus', 'onblur'=>'return getWksString()']) !!}
                        </div>
                        <div class="row mt-3">
                            {!! Form::label('pregnancy_age', 'Wks :', ['class'=>'col-md-2']) !!}
                            {!! Form::text('pregnancy_age', null, ['class'=>'form-control col-md-2']) !!}
                        </div>
                        <div class="row mt-3">
                            {!! Form::label('type', 'Type :', ['class'=>'col-md-2']) !!}
                            {!! Form::select('type', [''=>'Select...'] + \App\Enums\PregnancyPrenatalType::getDescriptions(), ['class'=> 'form-control col-md-4'] ) !!}
                        </div>
                        <div class="row mt-3">
                            {!! Form::label('examiner', 'Examiner : ', ['class'=>'col-md-2']) !!}
                            {!! Form::text('examiner', null, ['class'=>'form-control col-md-5']) !!}
                        </div>
                        <div class="row mt-3">
                            {!! Form::label('findings', 'Findings :', ['class'=>'col-md-2']) !!}
                            {!! Form::textarea('findings', null, ['class'=>'form-control col-md-10', 'rows'=>'5']) !!}
                        </div>
                        <hr>
                        <div class="row mt-3">
                            {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-primary col-md-3 ml-auto']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.4/moment.min.js"></script>

    <script>
        function getWksString(){
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