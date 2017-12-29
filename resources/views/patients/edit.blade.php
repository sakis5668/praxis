@extends('layouts.app')

@section('content')

    <div class="container">
        <!-- Start Row -->
        <div class="row my-3">

            <!-- Start Column -->
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header lead">

                        <div class="row">
                            <div class="col-md-6 lead mt-1">{{__('patients.Edit Patient')}}</div>
                            <div class="col-md-3 mt-1">
                                {!! Form::open(['method' => 'delete', 'action' => ['PatientsController@destroy', $patient], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-delete col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-3 mt-1">
                                {!! Form::open(['method'=>'get','action'=>['PatientsController@show', $patient] ]) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::model($patient,['method'=>'patch', 'action'=>['PatientsController@update', $patient]]) !!}
                        <div class="row mt-2 mx-1">
                            {!! Form::label('last_name', __('patients.Last Name') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::text('last_name', null, ['class' => 'form-control col-md-8', 'autofocus']) !!}

                        </div>
                        <div class="row mt-2 mx-1">
                            {!! Form::label('first_name', __('patients.First Name') . ' :', ['class' => 'col-md-4 font-weight-bold']) !!}
                            {!! Form::text('first_name', null, ['class'=>'form-control col-md-8']) !!}
                        </div>
                        <div class="row mt-2 mx-1">
                            {!! Form::label('middle_name', __('patients.Middle Name') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::text('middle_name', null, ['class' => 'form-control col-md-8']) !!}
                        </div>
                        <hr>
                        <div class="row mt-2 mx-1">
                            {!! Form::label('birth_date', __('patients.Birth Date') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::text('birth_date', $patient->birth_date ? $patient->birth_date->format('d.m.Y') : null, ['class' => 'form-control col-md-4']) !!}
                        </div>
                        <div class="row mt-2 mx-1">
                            {!! Form::label('email', __('patients.E-Mail') . ' :', ['class' => 'col-md-4 font-weight-bold']) !!}
                            {!! Form::text('email', null, ['class'=>'form-control col-md-8']) !!}
                        </div>
                        <div class="row mt-2 mx-1">
                            {!! Form::label('mobile_number', __('patients.Mobile Number') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::text('mobile_number', null, ['class' => 'form-control col-md-4']) !!}
                        </div>
                        <div class="row mt-2 mx-1">
                            {!! Form::label('phone_number', __('patients.Phone Number') . ' :', ['class' => 'col-md-4 font-weight-bold']) !!}
                            {!! Form::text('phone_number', null, ['class'=>'form-control col-md-4']) !!}
                        </div>
                        <hr>

                        <div class="row mt-2 mx-1">
                            {!! Form::label('physician_id', __('patients.Physician') . ' :', ['class'=>'col-md-4 font-weight-bold'] ) !!}
                            {!! Form::select('physician_id', $physicians, $patient->physician_id,['class' => 'form-control col-md-4'] ) !!}
                        </div>
                        <hr>
                        <div class="row mt-2 mx-1">
                            {!! Form::label('address', __('patients.Address') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::text('address', null, ['class' => 'form-control col-md-8']) !!}
                        </div>
                        <div class="row mt-2 mx-1">
                            {!! Form::label('information', __('patients.Information') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::textarea('information', null, ['class' => 'form-control col-md-8', 'rows' => 5]) !!}
                        </div>
                        <div class="row mt-2 mx-1">
                            {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-primary col-md-2 ml-auto', 'data-toggle'=>'modal', 'data-target'=>'#exampleModal']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>

                </div>

            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

        <!-- Start Row -->
        <div class="row my-3">

            <!-- Start Column -->
            <div class="col-md-12">

                @include('layouts.form-errors')

            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

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
