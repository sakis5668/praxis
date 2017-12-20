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
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header lead">
                        <div class="row">
                            <div class="col-md-10">{{__('surgery.edit.surgery.label')}}</div>
                            <div class="col-md-2">
                                {!! Form::model($surgery, ['method'=>'delete', 'action'=>['SurgeriesController@destroy', $patient, $surgery], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg"></i>', ['type'=>'submit', 'class'=> 'btn btn-delete col-md-12 ml-auto']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        {!! Form::model($surgery,['method'=>'patch', 'action'=>['SurgeriesController@update', $patient, $surgery]]) !!}
                        <div class="row mt-2">
                            {!! Form::label('date', __('surgery.date2.label'), ['class' => 'col-md-2 text-right']) !!}
                            {!! Form::text('date',$surgery->date ? $surgery->date->format('d.m.Y') : null, ['class'=>'form-control col-md-2']) !!}
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('diagnosis', __('surgery.diagnosis2.label'), ['class'=>'col-md-2 text-right']) !!}
                            {!! Form::text('diagnosis', null, ['class'=>'form-control col-md-4']) !!}
                            {!! Form::label('therapy', __('surgery.therapy2.label'), ['class'=>'col-md-2 text-right']) !!}
                            {!! Form::text('therapy', null, ['class'=>'form-control col-md-4']) !!}
                        </div>
                        <hr>
                        <div class="row mt-2">
                            {!! Form::label('surgeon', __('surgery.surgeon.label'), ['class'=>'col-md-2 text-right']) !!}
                            {!! Form::text('surgeon', null, ['class'=>'form-control col-md-4']) !!}
                            {!! Form::label('assistant', __('surgery.assistant.label'), ['class'=>'col-md-2 text-right']) !!}
                            {!! Form::text('assistant', null, ['class'=>'form-control col-md-4']) !!}
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('anesthesia', __('surgery.anesthesia.label'), ['class'=>'col-md-2 text-right']) !!}
                            {!! Form::text('anesthesia', null, ['class'=>'form-control col-md-4']) !!}
                            {!! Form::label('anesthesist', __('surgery.anesthesist.label'), ['class'=>'col-md-2 text-right']) !!}
                            {!! Form::text('anesthesist', null, ['class'=>'form-control col-md-4']) !!}
                        </div>
                        <hr>
                        <div class="row mt-2">
                            {!! Form::label('text', __('surgery.text.label'), ['class'=>'col-md-2 text-right']) !!}
                            {!! Form::textarea('text', null, ['class'=>'form-control col-md-10', 'rows'=>10]) !!}
                        </div>
                        <hr>
                        <div class="row mt-2">
                            {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=> 'btn btn-primary form-control col-md-2 ml-auto']) !!}
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
