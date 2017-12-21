@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header lead">

                        <div class="row">
                            <div class="col-md-12">{{__('patients-create-view.enter.new.patient')}}</div>
                        </div>
                    </div>

                    <div class="card-body">

                        {!! Form::open(['method'=>'post', 'action'=>'PatientsController@store']) !!}
                        <div class="row mt-3">
                            {!! Form::label('last_name', __('patients-create-view.last.name.label'), ['class'=>'col-md-2']) !!}
                            {!! Form::text('last_name', null, ['class' => 'form-control col-md-4', 'autofocus']) !!}
                            {!! Form::label('first_name', __('patients-create-view.first.name.label'), ['class' => 'col-md-2']) !!}
                            {!! Form::text('first_name', null, ['class'=>'form-control col-md-4']) !!}
                        </div>
                        <div class="row mt-3">
                            {!! Form::label('middle_name', __('patients-create-view.middle.name.label'), ['class'=>'col-md-2']) !!}
                            {!! Form::text('middle_name', null, ['class' => 'form-control col-md-4']) !!}
                        </div>
                        <hr>
                        <div class="row mt-3">
                            {!! Form::label('birth_date', __('patients-create-view.birthdate.label'), ['class'=>'col-md-2']) !!}
                            {!! Form::text('birth_date', null, ['class' => 'form-control col-md-4']) !!}
                            {!! Form::label('email', __('patients-create-view.email.label'), ['class' => 'col-md-2']) !!}
                            {!! Form::text('email', null, ['class'=>'form-control col-md-4']) !!}
                        </div>
                        <div class="row mt-3">
                            {!! Form::label('mobile_number', __('patients-create-view.mobile.number.label'), ['class'=>'col-md-2']) !!}
                            {!! Form::text('mobile_number', null, ['class' => 'form-control col-md-4']) !!}
                            {!! Form::label('phone_number', __('patients-create-view.phone.number.label'), ['class' => 'col-md-2']) !!}
                            {!! Form::text('phone_number', null, ['class'=>'form-control col-md-4']) !!}
                        </div>
                        <hr>
                        <div class="row mt-3">
                            {!! Form::label('address', __('patients-create-view.address.label'), ['class'=>'col-md-2']) !!}
                            {!! Form::text('address', null, ['class' => 'form-control col-md-10']) !!}
                        </div>
                        <hr>
                        <div class="row mt-3">
                            {!! Form::label('information', __('patients-create-view.information.label'), ['class'=>'col-md-2']) !!}
                            {!! Form::textarea('information', null, ['class' => 'form-control col-md-10', 'rows' => '10']) !!}
                        </div>
                        <hr>
                        <div class="row mt-3">
                            {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-primary col-md-2 ml-auto']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>

                </div>

            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-12">
                @include('layouts.form-errors')
            </div>
        </div>

    </div>

@endsection
