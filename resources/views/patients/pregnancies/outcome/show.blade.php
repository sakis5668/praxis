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

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                {{__('pregnancy.outcome.title')}}
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
                            <div class="col-md-2 text-right">{{__('pregnancy.Date')}} :</div>
                            <div class="col-md-4">{{ $outcome->date ? $outcome->date->format('d.m.Y') : __('pregnancy.nodate') }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2 text-right">{{__('pregnancy.Termination')}} :</div>
                            <div class="col-md-4">{{ $outcome->termination_type ?  \App\Enums\PregnancyTerminationType::getDescription($outcome->termination_type) : __('pregnancy.notavail') }}</div>
                            <div class="col-md-2 text-right">{{__('pregnancy.Delivery')}} :</div>
                            <div class="col-md-4">{{ $outcome->delivery_type ? \App\Enums\PregnancyDeliveryMode::getDescription($outcome->delivery_type) : __('pregnancy.notavail') }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2 text-right">{{__('pregnancy.Gender')}} :</div>
                            <div class="col-md-4">{{ $outcome->gender ? \App\Enums\PregnancyGender::getDescription($outcome->gender) : __('pregnancy.notavail') }}</div>
                            <div class="col-md-2 text-right">{{__('pregnancy.WeightInGrams')}} :</div>
                            <div class="col-md-4">{{ $outcome->weight ? $outcome->weight : __('pregnancy.notavail') }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2 text-right">{{__('pregnancy.Indication')}} :</div>
                            <div class="col-md-10">{{ $outcome->indication }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2 text-right">{{__('pregnancy.Comment')}} :</div>
                            <div class="col-md-10"><p align="justify">{!! nl2br(e($outcome->comment)) !!}</p></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection