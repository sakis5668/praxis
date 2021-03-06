@extends('layouts.app')

@section('content')

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
                            <div class="col-md-10">{{__('surgery.Enter New Surgery Data')}}</div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>['SurgeriesController@index', $patient]]) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        {!! Form::open(['method'=>'post', 'action'=>['SurgeriesController@store', $patient]]) !!}
                        <div class="row mt-2">
                            <div class="col-md-6">
                                {!! Form::label('date', __('surgery.Date') . ' :', ['class' => 'font-weight-bold']) !!}
                                {!! Form::text('date',null, ['class'=>'form-control', 'autofocus', 'onfocus'=>'this.select();']) !!}
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                {!! Form::label('diagnosis', __('surgery.Diagnosis') . ' :', ['class'=>'font-weight-bold']) !!}
                                {!! Form::text('diagnosis', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('therapy', __('surgery.Therapy') . ' :', ['class'=>'font-weight-bold']) !!}
                                {!! Form::text('therapy', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                {!! Form::label('surgeon', __('surgery.Surgeon') . ' :', ['class'=>'font-weight-bold']) !!}
                                {!! Form::text('surgeon', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('assistant', __('surgery.Assistant'). ' :', ['class'=>'font-weight-bold']) !!}
                                {!! Form::text('assistant', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                {!! Form::label('anesthesia', __('surgery.Anesthesia') . ' :', ['class'=>'font-weight-bold']) !!}
                                {!! Form::text('anesthesia', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('anesthesist', __('surgery.Anesthesist') . ' :', ['class'=>'font-weight-bold']) !!}
                                {!! Form::text('anesthesist', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                {!! Form::label('text', __('surgery.Text') . ' :', ['class'=>'font-weight-bold']) !!}
                                {!! Form::textarea('text', null, ['class'=>'form-control', 'rows'=>5]) !!}
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-3 ml-auto">
                                {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-primary form-control']) !!}
                            </div>
                        </div>
                        {{ Form::close() }}

                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
