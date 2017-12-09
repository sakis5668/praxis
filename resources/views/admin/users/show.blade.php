@extends('layouts.admin')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 offset-2">

                <div class="card">

                    <div class="card-header">
                        <div class="row lead font-weight-bold">
                            <div class="col-md-8">
                                {{ $user->name }}
                            </div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>['AdminUsersController@edit', $user]]) !!}
                                {!! Form::button('<i class="fa fa-pencil fa-lg"></i>', ['type'=>'submit', 'class'=> 'btn btn-light col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>'AdminUsersController@index']) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=> 'btn btn-cool col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row my-1">
                            <div class="col-md-4 font-weight-bold">{{__('admin-users.user.name.label')}} :</div>
                            <div class="col-md-8">{{$user->name}}</div>
                        </div>
                        <div class="row my-1">
                            <div class="col-md-4 font-weight-bold">{{__('admin-users.user.email.label')}} :</div>
                            <div class="col-md-8">{{$user->email}}</div>
                        </div>
                        <div class="row my-1">
                            <div class="col-md-4 font-weight-bold">{{__('admin-users.user.role.label')}} :</div>
                            <div class="col-md-8">{{$user->role->name}}</div>
                        </div>
                        <div class="row my-1">
                            <div class="col-md-4 font-weight-bold">{{__('admin-users.user.language.label')}} :</div>
                            <div class="col-md-8">{{$user->language->description}}</div>
                        </div>
                        <div class="row my-1">
                            <div class="col-md-4 font-weight-bold">{{__('admin-users.user.created.at.label')}} :</div>
                            <div class="col-md-4">{{$user->created_at->format('d.m.Y')}}</div>
                        </div>
                        <div class="row my-1">
                            <div class="col-md-4 font-weight-bold">{{__('admin-users.user.updated.at.label')}} :</div>
                            <div class="col-md-4">{{$user->updated_at->format('d.m.Y')}}</div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection