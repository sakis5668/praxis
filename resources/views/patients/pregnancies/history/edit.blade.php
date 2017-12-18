@extends('layouts.app')

@section('content')

    @include('layouts.language')

    {{-- MENU --}}
    @include('patients.pregnancies.pregnancies-menu')

    {{-- HISTORY AREA--}}
    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header lead">
                        <div class="row">
                            <div class="col-md-8">
                                {{__('pregnancy.history.edit.title')}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                {!! Form::model($history, ['method'=>'patch', 'action'=> ['PregnancyHistoryController@update', $pregnancy, $history]]) !!}
                                <div class="row mx-1">
                                    {!! Form::textarea('history', null, ['class'=> 'form-control']) !!}
                                </div>
                                <hr>
                                <div class="row mx-1">
                                    {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-primary col-md-2 ml-auto']) !!}
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

