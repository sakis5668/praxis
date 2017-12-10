@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row my-3">
            <div class="col-md-6 offset-3">

                <div class="card">

                    <div class="card-header lead">
                        <div class="row my-1">
                            <div class="col-md-8">
                                Edit Pregnancy Data
                            </div>
                            <div class="col-md-4">
                                {!! Form::model($pregnancy, ['method'=>'delete', 'action'=>['PregnanciesController@destroy', $patient, $pregnancy], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg"></i>', ['type'=>'submit', 'class'=> 'btn btn-delete col-md-12 ml-auto']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="col-md-12">

                            {!! Form::model($pregnancy, ['method'=>'patch', 'action'=>['PregnanciesController@update', $patient, $pregnancy]]) !!}
                            <div class="row mt-2">
                                {!! Form::label('lmp', 'LMP :', ['class'=>'col-md-6']) !!}
                                {!! Form::text('lmp', $pregnancy->lmp ? $pregnancy->lmp->format('d.m.Y'):'' , ['class'=> 'form-control col-md-6']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('edd', 'EDD :', ['class'=>'col-md-6']) !!}
                                {!! Form::text('edd', $pregnancy->edd ? $pregnancy->edd->format('d.m.Y'):'', ['class'=> 'form-control col-md-6']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('corrected_edd', 'EDD corr. :', ['class'=>'col-md-6']) !!}
                                {!! Form::text('corrected_edd', $pregnancy->corrected_edd ? $pregnancy->corrected_edd->format('d.m.Y'):'', ['class'=> 'form-control col-md-6']) !!}
                            </div>
                            <hr>
                            <div class="row mt-2">
                                {!! Form::label('pregnancy_termination_type_id', 'Termination Type :', ['class'=>'col-md-6']) !!}
                                {!! Form::select('pregnancy_termination_type_id', $pregnancyTerminationTypes, $pregnancy->pregnancy_termination_type_id ,['class'=>'form-control col-md-6']) !!}

                            </div>
                            <div class="row mt-2">
                                {!! Form::label('finished', 'Finished :' , ['class' => 'col-md-6']) !!}
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
