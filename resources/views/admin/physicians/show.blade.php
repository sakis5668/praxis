@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row mt-3">

            <div class="col-md-10 offset-md-1">

                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-6 lead">
                                {{__('physicians.Physician Data')}}
                            </div>
                            <div class="col-3">
                                {!! Form::open(['method'=>'get', 'action'=>['PhysicianController@edit', $physician]]) !!}
                                {!! Form::button('<i class="fa fa-pencil fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-3">
                                {!! Form::open(['method'=>'get', 'action'=>'PhysicianController@index']) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{{__('physicians.Name')}} :</div>
                            <div class="col-md-8">{{$physician->name}}</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{{__('physicians.Specialty')}} :</div>
                            <div class="col-md-8">{{$physician->specialty}}</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{{__('physicians.Information')}} :</div>
                            <div class="col-md-8">{{$physician->information}}</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{{__('physicians.Address')}} :</div>
                            <div class="col-md-8">{{$physician->address}}</div>
                        </div>

                        <div class="row mt-2 justify-content-end">
                            <div class="col-md-8">{{$physician->postal}}, {{$physician->city}}</div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection