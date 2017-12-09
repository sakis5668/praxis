@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header lead">

                        <div class="row">
                            <div class="col-md-2">{{__('patients-edit-view.edit.patient.label')}}</div>
                            <div class="col-md-7 font-weight-bold">{{ $patient->last_name . ', ' . $patient->first_name }}</div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method' => 'delete', 'action' => ['PatientsController@destroy', $patient->id], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-delete col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        {!! Form::model($patient,['method'=>'patch', 'action'=>['PatientsController@update', $patient->id]]) !!}
                        <div class="row mt-3">
                            {!! Form::label('last_name', __('patients-edit-view.last.name.label'), ['class'=>'col-md-2']) !!}
                            {!! Form::text('last_name', null, ['class' => 'form-control col-md-4']) !!}
                            {!! Form::label('first_name', __('patients-edit-view.first.name.label'), ['class' => 'col-md-2']) !!}
                            {!! Form::text('first_name', null, ['class'=>'form-control col-md-4']) !!}
                        </div>
                        <div class="row mt-3">
                            {!! Form::label('middle_name', __('patients-edit-view.middle.name.label'), ['class'=>'col-md-2']) !!}
                            {!! Form::text('middle_name', null, ['class' => 'form-control col-md-4']) !!}
                        </div>
                        <hr>
                        <div class="row mt-3">
                            {!! Form::label('birth_date', __('patients-edit-view.birthdate.label'), ['class'=>'col-md-2']) !!}
                            {!! Form::text('birth_date', $patient->birth_date ? $patient->birth_date->format('d.m.Y') : null, ['class' => 'form-control col-md-4']) !!}
                            {!! Form::label('email', __('patients-edit-view.email.label'), ['class' => 'col-md-2']) !!}
                            {!! Form::text('email', null, ['class'=>'form-control col-md-4']) !!}
                        </div>
                        <div class="row mt-3">
                            {!! Form::label('mobile_number', __('patients-edit-view.mobile.number.label'), ['class'=>'col-md-2']) !!}
                            {!! Form::text('mobile_number', null, ['class' => 'form-control col-md-4']) !!}
                            {!! Form::label('phone_number', __('patients-edit-view.phone.number.label'), ['class' => 'col-md-2']) !!}
                            {!! Form::text('phone_number', null, ['class'=>'form-control col-md-4']) !!}
                        </div>
                        <hr>
                        <div class="row mt-3">
                            {!! Form::label('address', __('patients-edit-view.address.label'), ['class'=>'col-md-2']) !!}
                            {!! Form::text('address', null, ['class' => 'form-control col-md-10']) !!}
                        </div>
                        <hr>
                        <div class="row mt-3">
                            {!! Form::label('information', __('patients-edit-view.information.label'), ['class'=>'col-md-2']) !!}
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
    </div>

@endsection

@section('scripts')
    <script>
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection
