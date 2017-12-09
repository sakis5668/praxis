@extends('layouts.admin')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 offset-2">

                <div class="card">

                    <div class="card-header">
                        <div class="row lead my-1 mx-1">
                            <div class="col-md-12">
                                {{__('admin-users.create.new.user.label')}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['method'=> 'post', 'action'=>'AdminUsersController@store']) !!}

                        <div class="row my-1 mx-1">
                            {!! Form::label('name', __('admin-users.user.name.label') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::text('name', null, ['class'=>'form-control col-md-8']) !!}
                        </div>
                        <div class="row my-1 mx-1">
                            {!! Form::label('email', __('admin-users.user.email.label') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::email('email', null, ['class'=>'form-control col-md-8']) !!}
                        </div>
                        <div class="row my-1 mx-1">
                            {!! Form::label('role_id', __('admin-users.user.role.label') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::select('role_id', ['' => __('admin-users.select.role')] + $roles, null, ['class'=>'form-control col-md-8']) !!}
                        </div>
                        <div class="row my-1 mx-1">
                            {!! Form::label('language_id', __('admin-users.user.language.label') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::select('language_id', [''=>__('admin-users.select.language')] + $languages, null, ['class'=>'form-control col-md-8']) !!}
                        </div>
                        <div class="row my-1 mx-1">
                            {!! form::label('password', __('admin-users.user.password.label') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! form::password('password',null, ['class'=>'form-control col-md-8']) !!}
                        </div>
                        <div class="row my-1 mx-1">
                            {!! Form::label('password_confirmation', __('admin-users.user.password.confirm.label') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::password('password_confirmation', null, ['class'=>'form_control col-md-8']) !!}
                        </div>
                        <hr>
                        <div class="row my-1 mx-1">
                            {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-primary col-md-2 ml-auto']) !!}
                        </div>
                        {!! Form::close() !!}

                        @include('layouts.form-errors')
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
