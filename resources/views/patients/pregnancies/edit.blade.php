@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">
                @include('patients.actions-top')
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-8 offset-md-2">
                <div class="card">

                    <div class="card-header lead">
                        <div class="row">
                            <div class="col-12 mt-1 text-center">
                                {{__('pregnancy.edit.view.title')}}
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6 col-md-3 mt-1">
                                {!! Form::model($pregnancy, ['method'=>'delete', 'action'=>['PregnanciesController@destroy', $patient, $pregnancy], 'id' => 'deleteForm']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg"></i>', ['id'=>'deleteButton', 'class'=> 'btn btn-delete col-md-12 ml-auto']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-6 col-md-3 mt-1">
                                {!! Form::open(['method'=>'get', 'action'=>['PregnanciesController@index', $patient]]) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>',['type'=>'submit', 'class'=>'form-control btn btn-outline-cool col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="col-md-12">

                            {!! Form::model($pregnancy, ['method'=>'patch', 'action'=>['PregnanciesController@update', $patient, $pregnancy]]) !!}
                            <div class="row mt-2">
                                {!! Form::label('lmp', __('pregnancy.LMP') . ' :', ['class'=>'col-md-6 font-weight-bold']) !!}
                                {!! Form::text('lmp', $pregnancy->lmp ? $pregnancy->lmp->format('d.m.Y'):'' , ['class'=> 'form-control col-md-6', 'onblur'=>'return calculateET()']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('edd', __('pregnancy.EDD') . ' :', ['class'=>'col-md-6 font-weight-bold']) !!}
                                {!! Form::text('edd', $pregnancy->edd ? $pregnancy->edd->format('d.m.Y'):'', ['class'=> 'form-control col-md-6', 'onblur'=>'return setCorrET()']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('corrected_edd', __('pregnancy.EDDcorr') . ' :', ['class'=>'col-md-6 font-weight-bold']) !!}
                                {!! Form::text('corrected_edd', $pregnancy->corrected_edd ? $pregnancy->corrected_edd->format('d.m.Y'):'', ['class'=> 'form-control col-md-6']) !!}
                            </div>
                            <hr>
                            <div class="row mt-2">
                                {!! Form::label('pregnancy_termination_type', __('pregnancy.termination.type') . ' :', ['class'=>'col-md-6 font-weight-bold']) !!}
                                {!! Form::select('pregnancy_termination_type', \App\Enums\PregnancyTerminationType::getDescriptions(), $pregnancy->pregnancy_termination_type ,['class'=>'form-control col-md-6']) !!}

                            </div>
                            <div class="row mt-2">
                                {!! Form::label('finished', __('pregnancy.Finished') . ' :', ['class' => 'col-md-6 font-weight-bold']) !!}
                                {!! Form::checkbox('finished', $pregnancy->finished, null, ['class' => 'form-control col-md-6']) !!}
                            </div>
                            <hr>
                            <div class="row mt-2">
                                {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-primary col-md-3 ml-auto']) !!}
                            </div>

                            {!! Form::close() !!}

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <script src="{{ asset('js/moment.min.js') }}"></script>

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

    <script>
        function calculateET(){
            var lmp = document.getElementById('lmp').value;
            var lmpDate = moment(lmp, 'D.M.YYYY').format('DD.MM.YYYY');
            var etDate = moment(lmp, 'D.M.YYYY').add(280, 'days').format('DD.MM.YYYY');
            document.getElementById('lmp').value = lmpDate;
            document.getElementById('edd').value = etDate;
        }
    </script>

    <script>
        function setCorrET(){
            var edd = document.getElementById('edd').value;
            var eddDate = moment(edd, 'D.M.YYYY').format('DD.MM.YYYY');
            document.getElementById('corrected_edd').value = eddDate;
        }
    </script>
@endsection
