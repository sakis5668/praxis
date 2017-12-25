@extends('layouts.admin')

@section('content')

    @include('layouts.language')

    <div class="container mt-3">

        <div class="col-md-10 offset-md-1">

            <div class="card">

                <div class="card-header">

                    <div class="row">

                        <div class="col-9 lead">
                            New Physician
                        </div>

                        <div class="col-3">
                            {!! Form::open(['method'=>'get', 'action'=>'PhysicianController@index']) !!}
                            {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                            {!! Form::close() !!}
                        </div>

                    </div>

                </div>

                <div class="card-body">

                    {!! Form::open(['method'=>'post', 'action'=>'PhysicianController@store']) !!}

                    <div class="row mt-2">
                        <div class="col-md-4 font-weight-bold">{!! Form::label('name', 'Name :') !!}</div>
                        <div class="col-md-8">{!! Form::text('name', null, ['class'=>'form-control', 'autofocus']) !!}</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-4 font-weight-bold">{!! Form::label('specialty', 'Specialty :') !!}</div>
                        <div class="col-md-8">{!! Form::text('specialty', null, ['class'=>'form-control']) !!}</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-4 font-weight-bold">{!! Form::label('information', 'Information :') !!}</div>
                        <div class="col-md-8">{!! Form::text('information', null, ['class'=>'form-control']) !!}</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-4 font-weight-bold">{!! Form::label('address', 'Address :') !!}</div>
                        <div class="col-md-8">{!! Form::text('address', null, ['class'=>'form-control']) !!}</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-4 font-weight-bold">{!! Form::label('postal', 'Postal :') !!}</div>
                        <div class="col-md-4">{!! Form::text('postal', null, ['class'=>'form-control']) !!}</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-4 font-weight-bold">{!! Form::label('city', 'City :') !!}</div>
                        <div class="col-md-8">{!! Form::text('city', null, ['class'=>'form-control']) !!}</div>
                    </div>

                    <hr>

                    <div class="row mt-2 justify-content-end">
                        <div class="col-md-3">{!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-primary']) !!}</div>
                    </div>

                    {!! Form::close() !!}

                </div>

            </div>

        </div>

    </div>

@endsection