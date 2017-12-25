@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">
                @include('patients.actions-top')
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-8 offset-md-2">
                <div class="card">

                    <div class="card-header">
                        <div class="row mt-1">
                            <div class="col-8 lead">
                                {{__('pregnancy.create.view.title')}}
                            </div>
                            <div class="col-4">
                                {!! Form::open(['method'=>'get', 'action'=>['PregnanciesController@index', $patient]]) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>',['type'=>'submit', 'class'=>'form-control btn btn-outline-cool col-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="col-md-12">

                            {!! Form::open(['method'=>'post', 'action'=>['PregnanciesController@store', $patient]]) !!}
                            <div class="row mt-2">
                                {!! Form::label('lmp', __('pregnancy.LMP') . ' :', ['class'=>'col-6 font-weight-bold']) !!}
                                {!! Form::text('lmp', null, ['class'=> 'form-control col-6', 'onblur'=>'return calculateET()']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('edd', __('pregnancy.EDD') . ' :', ['class'=>'col-6 font-weight-bold']) !!}
                                {!! Form::text('edd', null, ['class'=> 'form-control col-6', 'onblur'=>'return setCorrET()']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('corrected_edd', __('pregnancy.EDDcorr') .' :', ['class'=>'col-6 font-weight-bold']) !!}
                                {!! Form::text('corrected_edd', null, ['class'=> 'form-control col-6']) !!}
                            </div>
                            <hr>
                            <div class="row mt-2">
                                {!! Form::label('pregnancy_termination_type', __('pregnancy.termination.type') . ' :', ['class'=>'col-6 font-weight-bold']) !!}
                                {!! Form::select('pregnancy_termination_type', [''=> __('pregnancy.select')]+ \App\Enums\PregnancyTerminationType::getDescriptions(), ['class'=>'form-control col-6']) !!}

                            </div>
                            <div class="row mt-2">
                                {!! Form::label('finished', __('pregnancy.Finished') . ' :' , ['class' => 'col-6 font-weight-bold']) !!}
                                {!! Form::checkbox('finished', null, false, ['class' => 'form-control col-6']) !!}
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.4/moment.min.js"></script>

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
