@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                @include('patients.actions-top')
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                @include('patients.pregnancies.pregnancies-menu')
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-9 lead">
                                {{__('pregnancy.history.edit.title')}}
                            </div>
                            <div class="col-3">
                                {!! Form::open(['method'=>'get', 'action'=>['PregnancyHistoryController@show', $pregnancy, $history]]) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>',['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                {!! Form::model($history, ['method'=>'patch', 'action'=> ['PregnancyHistoryController@update', $pregnancy, $history]]) !!}
                                <div class="row">
                                    {!! Form::textarea('history', null, ['class'=> 'form-control']) !!}
                                </div>
                                <hr>
                                <div class="row justify-content-end">
                                    {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-primary col-3']) !!}
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

