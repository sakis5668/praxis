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
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header lead">
                        <div class="row">
                            <div class="col-9">
                                {{__('pregnancy.history.edit.title')}}
                            </div>
                            <div class="col-3">
                                {!! Form::open(['method'=>'get', 'action'=>['PregnancyHistoryController@edit', $pregnancy, $history]]) !!}
                                {!! Form::button('<i class="fa fa-pencil fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <p align="justify">{!! nl2br(e($history->history)) !!}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
