@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-3">
                <div class="card">

                    <div class="card-header lead text-center">
                        <p>Calculation Results</p>
                    </div>

                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row my-1 mx-1">
                                <div class="col-md-4 font-weight-bold text-right">LP :</div>
                                <div class="col-md-8">{{$lmpDate}}</div>
                            </div>
                            <div class="row my-1 mx-1">
                                <div class="col-md-4 font-weight-bold text-right">ET :</div>
                                <div class="col-md-8">{{$eddDate}}</div>
                            </div>
                            <div class="row my-1 mx-1">
                                <div class="col-md-4 font-weight-bold text-right">Today :</div>
                                <div class="col-md-8">{{$dString}}</div>
                            </div>
                            <hr>
                            <div class="row">
                                {!! Form::open(['method'=>'get', 'action'=>'SSWCalculatorController@inputData']) !!}
                                {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection