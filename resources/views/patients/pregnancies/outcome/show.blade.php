@extends('layouts.app')

@section('content')

    @include('layouts.language')

    @include('patients.pregnancies.pregnancies-menu')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                Pregnancy Outcome
                            </div>
                            <div class="col-md-2">
                                {!! Form::open(['method'=>'get', 'action'=>['PregnancyOutcomesController@edit', $pregnancy, $outcome ]]) !!}
                                {!! Form::button('<i class="fa fa-pencil fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-light']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row mt-2">
                            <div class="col-md-2 text-right">Date :</div>
                            <div class="col-md-4">{{ $outcome->date ? $outcome->date->format('d.m.Y') : 'no date' }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2 text-right">Termination :</div>
                            <div class="col-md-4">{{ $outcome->termination_type ?  \App\Enums\PregnancyTerminationType::getDescription($outcome->termination_type) : 'no data'}}</div>
                            <div class="col-md-2 text-right">Delivery mode :</div>
                            <div class="col-md-4">{{ $outcome->delivery_type ? \App\Enums\PregnancyDeliveryMode::getDescription($outcome->delivery_type) : 'no data' }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2 text-right">Gender :</div>
                            <div class="col-md-4">{{ $outcome->gender ? \App\Enums\PregnancyGender::getDescription($outcome->gender) : 'no data' }}</div>
                            <div class="col-md-2 text-right">Weight [g]:</div>
                            <div class="col-md-4">{{ $outcome->weight ? $outcome->weight : 'no data' }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2 text-right">Indication :</div>
                            <div class="col-md-10">{{ $outcome->indication }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2 text-right">Comment :</div>
                            <div class="col-md-10"><p align="justify">{!! nl2br(e($outcome->comment)) !!}</p></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection