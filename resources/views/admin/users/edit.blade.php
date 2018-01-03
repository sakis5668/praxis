@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row mt-3">

            <div class="col-md-10 offset-1">

                <div class="card">

                    <div class="card-header">

                        <div class="row">

                            <div class="col-6 lead">
                                {{__('admin-users.edit.user.label')}}
                            </div>

                            <div class="col-3">
                                {!! Form::open(['method'=>'delete', 'action'=>['AdminUsersController@destroy', $user], 'id' => 'deleteForm']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg"></i>', ['id'=>'deleteButton', 'class'=>'btn btn-delete col-md-12 ml-auto']) !!}
                                {!! Form::close() !!}
                            </div>

                            <div class="col-3">
                                {!! Form::open(['method'=>'get', 'action'=>['AdminUsersController@show', $user]]) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                                {!! Form::close() !!}
                            </div>

                        </div>

                    </div>

                    <div class="card-body">
                        {!! Form::model($user, ['method'=> 'patch', 'action'=>['AdminUsersController@update', $user]]) !!}

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('name', __('admin-users.user.name.label') . ' :') !!}</div>
                            <div class="col-md-8">{!! Form::text('name', null, ['class'=>'form-control']) !!}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('email', __('admin-users.user.email.label') . ' :') !!}</div>
                            <div class="col-md-8">{!! Form::email('email', null, ['class'=>'form-control']) !!}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('role_id', __('admin-users.user.role.label') . ' :') !!}</div>
                            <div class="col-md-8">{!! Form::select('role_id', $roles, $user->role_id, ['class'=>'form-control']) !!}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('language_id', __('admin-users.user.language.label') . ' :') !!}</div>
                            <div class="col-md-8">{!! Form::select('language_id', $languages, $user->language_id, ['class'=>'form-control']) !!}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! form::label('password', __('admin-users.user.password.label') . ' :') !!}</div>
                            <div class="col-md-8">{!! form::password('password',null, ['class'=>'form-control']) !!}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('password_confirmation', __('admin-users.user.password.confirm.label') . ' :') !!}</div>
                            <div class="col-md-8">{!! Form::password('password_confirmation', null, ['class'=>'form_control']) !!}</div>
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

@section('scripts')
    <script>
        $('#deleteButton').on('click', function () {
            alertify.confirm(
                '{{__('msg_layouts_app.Confirmation')}}',
                '{{__('msg_layouts_app.confirmMsg')}}',
                function(e) {
                    if(e) {
                        $('#deleteForm').submit();
                    }
                },
                function() {
                    alertify.error('{{__('msg_layouts_app.Cancel')}}');
                });
        });
    </script>
@endsection
