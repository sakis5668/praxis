@extends('layouts.app')

@section('content')

    @include('layouts.language')

    @include('patients.pregnancies.pregnancies-menu')

    <div class="container">
        <div class="row">
            <div class="col-md-4">

                @include('patients.pregnancies.examinations.left-list')

            </div>

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                Edit Pregnancy Examination
                            </div>
                            <div class="col-md-3">
                                {!! Form::model($examination, ['method'=>'delete', 'action'=>['PregnancyExaminationsController@destroy', $pregnancy, $examination], 'onsubmit'=>'return ConfirmDelete()']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-delete form-control']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        {!! Form::model($examination, ['method'=>'patch', 'action'=>['PregnancyExaminationsController@update', $pregnancy, $examination]]) !!}
                        <input type="hidden" name="corret" id="corret" value="{{ $pregnancy->corrected_edd->format('d.m.Y') }}">
                        <div class="row mt-3">
                            {!! Form::label('date', 'Date : ', ['class'=>'col-md-2']) !!}
                            {!! Form::text('date', $examination->date ? $examination->date->format('d.m.Y') : '', ['class'=>'form-control col-md-2', 'autofocus', 'onblur'=>'return getWksString()']) !!}
                        </div>
                        <div class="row mt-3">
                            {!! Form::label('pregnancy_age', 'Weeks :', ['class'=>'col-md-2']) !!}
                            {!! Form::text('pregnancy_age', null, ['class'=>'form-control col-md-2']) !!}
                        </div>
                        <div class="row mt-3">
                            {!! Form::label('findings', 'Findings :', ['class'=>'col-md-2']) !!}
                            {!! Form::textarea('findings', null, ['class'=>'form-control col-md-10']) !!}
                        </div>
                        <hr>
                        <div class="row mt-3">
                            {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=> 'form-control btn btn-primary col-md-2 ml-auto']) !!}
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

    <script>
        function ConfirmDelete() {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>

@endsection