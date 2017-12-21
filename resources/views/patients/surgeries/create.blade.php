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
                            <div class="col-d-12">{{__('surgery.new.surgery.label')}}</div>
                        </div>
                    </div>

                    <div class="card-body">

                        {!! Form::open(['method'=>'post', 'action'=>['SurgeriesController@store', $patient]]) !!}
                        <div class="row mt-2">
                            {!! Form::label('date', __('surgery.date2.label'), ['class' => 'col-md-2 text-right']) !!}
                            {!! Form::text('date',null, ['class'=>'form-control col-md-2', 'autofocus', 'onfocus'=>'this.select();']) !!}
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
                            {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-primary form-control col-md-2 ml-auto']) !!}
                        </div>
                        {{ Form::close() }}

                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
