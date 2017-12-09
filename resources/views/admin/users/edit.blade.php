@extends('layouts.admin')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 offset-2">

                <div class="card">

                    <div class="card-header">
                        <div class="row lead my-1 mx-1">
                            <div class="col-md-10">
                                {{__('admin-users.edit.user.label')}}
                            </div>
                            <div class="col-md-2">
                                {!! Form::open(['method'=>'delete', 'action'=>['AdminUsersController@destroy', $user], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-delete col-md-12 ml-auto']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::model($user, ['method'=> 'patch', 'action'=>['AdminUsersController@update', $user]]) !!}

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
                            {!! Form::select('role_id', $roles, $user->role_id, ['class'=>'form-control col-md-8']) !!}
                        </div>
                        <div class="row my-1 mx-1">
                            {!! Form::label('language_id', __('admin-users.user.language.label') . ' :', ['class'=>'col-md-4 font-weight-bold']) !!}
                            {!! Form::select('language_id', $languages, $user->language_id, ['class'=>'form-control col-md-8']) !!}
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
