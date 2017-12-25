@extends('layouts.admin')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 offset-2">

                <div class="card">

                    <div class="card-header">

                        <div class="row">

                            <div class="col-9 lead">
                                {{__('admin-users.create.new.user.label')}}
                            </div>

                            <div class="col-3">
                                {!! Form::open(['method'=>'get', 'action'=>'AdminUsersController@index']) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                                {!! Form::close() !!}
                            </div>

                        </div>

                    </div>

                    <div class="card-body">
                        {!! Form::open(['method'=> 'post', 'action'=>'AdminUsersController@store']) !!}

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('name', __('admin-users.user.name.label') . ' :') !!}</div>
                            <div class="col-md-8"> {!! Form::text('name', null, ['class'=>'form-control']) !!}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('email', __('admin-users.user.email.label') . ' :') !!}</div>
                            <div class="col-md-8"> {!! Form::email('email', null, ['class'=>'form-control']) !!}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('role_id', __('admin-users.user.role.label') . ' :') !!}</div>
                            <div class="col-md-8"> {!! Form::select('role_id', ['' => __('admin-users.select.role')] + $roles, null, ['class'=>'form-control']) !!}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('language_id', __('admin-users.user.language.label') . ' :') !!}</div>
                            <div class="col-md-8"> {!! Form::select('language_id', [''=>__('admin-users.select.language')] + $languages, null, ['class'=>'form-control']) !!}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! form::label('password', __('admin-users.user.password.label') . ' :') !!}</div>
                            <div class="col-md-8"> {!! form::password('password',null, ['class'=>'form-control']) !!}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('password_confirmation', __('admin-users.user.password.confirm.label') . ' :') !!}</div>
                            <div class="col-md-8"> {!! Form::password('password_confirmation', null, ['class'=>'form_control']) !!}</div>
                        </div>
                        <hr>
                        <div class="row mt-2 justify-content-end">
                            <div class="col-md-3">{!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-primary']) !!}</div>
                        </div>
                        {!! Form::close() !!}

                        @include('layouts.form-errors')
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
