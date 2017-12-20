@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">
                @include('patients.actions-top')
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12">
                @include('patients.pregnancies.pregnancies-menu')
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header lead">
                        <div class="row">
                            <div class="col-md-8">
                                {{__('pregnancy.history.edit.title')}}
                            </div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>['PregnancyHistoryController@edit', $pregnancy, $history]]) !!}
                                {!! Form::button('<i class="fa fa-pencil fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-light col-md-12 ml-auto']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p align="justify">{!! nl2br(e($history->history)) !!}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
