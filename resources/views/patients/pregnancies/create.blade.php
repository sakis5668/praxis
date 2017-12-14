@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row my-3">
            <div class="col-md-6 offset-3">

                <div class="card">

                    <div class="card-header lead">
                        <div class="row my-1">
                            <div class="col-md-12">
                                Enter New Pregnancy Data
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="col-md-12">

                            {!! Form::open(['method'=>'post', 'action'=>['PregnanciesController@store', $patient]]) !!}
                            <div class="row mt-2">
                                {!! Form::label('lmp', 'LMP :', ['class'=>'col-md-6']) !!}
                                {!! Form::text('lmp', null, ['class'=> 'form-control col-md-6', 'onblur'=>'return calculateET()']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('edd', 'EDD :', ['class'=>'col-md-6']) !!}
                                {!! Form::text('edd', null, ['class'=> 'form-control col-md-6']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('corrected_edd', 'EDD corr. :', ['class'=>'col-md-6']) !!}
                                {!! Form::text('corrected_edd', null, ['class'=> 'form-control col-md-6']) !!}
                            </div>
                            <hr>
                            <div class="row mt-2">
                                {!! Form::label('pregnancy_termination_type_id', 'Termination Type :', ['class'=>'col-md-6']) !!}
                                {!! Form::select('pregnancy_termination_type_id', [''=> 'Select']+ $pregnancyTerminationTypes, ['class'=>'form-control col-md-6']) !!}

                            </div>
                            <div class="row mt-2">
                                {!! Form::label('finished', 'Finished :' , ['class' => 'col-md-6']) !!}
                                {!! Form::checkbox('finished', null, false, ['class' => 'form-control col-md-6']) !!}
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

@endsection
