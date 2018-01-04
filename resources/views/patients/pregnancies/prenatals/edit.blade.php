@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                @include('patients.actions-top')
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                @include('patients.pregnancies.pregnancies-menu')
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mt-3">
                @include('patients.pregnancies.prenatals.left-list')
            </div>
            <div class="col-md-8 mt-3">
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                {{__('pregnancy.edit.prenatal.title')}}
                            </div>
                            <div class="col-3">
                                {!! Form::model($prenatal, ['method'=>'delete', 'action'=>['PregnancyPrenatalsController@destroy', $pregnancy, $prenatal], 'id'=>'deleteForm']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg"></i>', ['id'=>'deleteButton', 'class'=>'form-control btn btn-delete']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-3">
                                {!! Form::open(['method'=>'get', 'action'=>['PregnancyPrenatalsController@show', $pregnancy, $prenatal]]) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::model($prenatal, ['method'=>'patch', 'action'=>['PregnancyPrenatalsController@update', $pregnancy, $prenatal]]) !!}
                        <input type="hidden" name="corret" id="corret" value="{{ $pregnancy->corrected_edd->format('d.m.Y') }}">
                        <div class="row mt-3">
                            {!! Form::label('date', __('pregnancy.Date') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::text('date', $prenatal->date ? $prenatal->date->format('d.m.Y'): __('pregnancy.nodate'), ['class'=>'form-control col-md-4', 'autofocus']) !!}
                        </div>
                        <div class="row mt-3">
                            {!! Form::label('pregnancy_age', __('pregnancy.Weeks') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::text('pregnancy_age', null, ['class'=>'form-control col-md-4']) !!}
                        </div>
                        <div class="row mt-3">
                            {!! Form::label('type', __('pregnancy.Type') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::select('type', \App\Enums\PregnancyPrenatalType::getDescriptions(), $prenatal->type, ['class'=>'form-control col-md-4']) !!}
                        </div>
                        <div class="row mt-3">
                            {!! Form::label('examiner', __('pregnancy.Examiner') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::text('examiner', null, ['class'=>'form-control col-md-4']) !!}
                        </div>
                        <div class="row mt-3">
                            {!! Form::label('findings', __('pregnancy.Findings') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::textarea('findings', null, ['class'=>'form-control col-md-8', 'rows'=>'5']) !!}
                        </div>
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
    <script src="{{asset('js/moment.min.js')}}"></script>

    <script>
        $('#date').on('blur', function () {
            var date = moment($('#date').val(), 'D.M.YYYY');
            var corret = moment($('#corret').val(), 'D.M.YYYY');
            var days = 280 + moment.duration(date.diff(corret)).asDays();
            var wksString = ~~(days / 7) + '+' + ~~(days % 7);
            $('#date').val(date.format('DD.MM.YYYY'));
            $('#pregnancy_age').val(wksString);
        });
    </script>

    <script>
        $('#deleteButton').on('click', function () {
            alertify.confirm(
                '{{__('msg_layouts_app.Confirmation')}}',
                '{{__('msg_layouts_app.confirmMsg')}}',
                function(e) {
                    if(e) {
                        $('#deleteForm').submit();
                    }
                },
                function() {
                    alertify.error('{{__('msg_layouts_app.Cancel')}}');
                }).set({
                'labels': {ok: '{{__('msg_layouts_app.Ok')}}', cancel: '{{__('msg_layouts_app.Cancel')}}'}
            });
        });
    </script>

   {{-- <script>
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
--}}

@endsection