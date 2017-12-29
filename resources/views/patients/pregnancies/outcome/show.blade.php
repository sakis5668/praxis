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

                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                {{__('pregnancy.outcome.title')}}
                            </div>
                            <div class="col-3">
                                {!! Form::open(['method'=>'get', 'action'=>['PregnancyOutcomesController@edit', $pregnancy, $outcome ]]) !!}
                                {!! Form::button('<i class="fa fa-pencil fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row mt-2">
                            <div class="col-md-3 font-weight-bold">{{__('pregnancy.Date')}} :</div>
                            <div class="col-md-3">{{ $outcome->date ? $outcome->date->format('d.m.Y') : __('pregnancy.nodate') }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 font-weight-bold">{{__('pregnancy.Delivery')}} :</div>
                            <div class="col-md-3">{{ $outcome->delivery_type ? \App\Enums\PregnancyDeliveryMode::getDescription($outcome->delivery_type) : __('pregnancy.notavail') }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 font-weight-bold">{{__('pregnancy.Gender')}} :</div>
                            <div class="col-md-3">{{ $outcome->gender ? \App\Enums\PregnancyGender::getDescription($outcome->gender) : __('pregnancy.notavail') }}</div>
                            <div class="col-md-3 font-weight-bold">{{__('pregnancy.WeightInGrams')}} :</div>
                            <div class="col-md-3">{{ $outcome->weight ? $outcome->weight : __('pregnancy.notavail') }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 font-weight-bold">{{__('pregnancy.Indication')}} :</div>
                            <div class="col-md-9">{{ $outcome->indication }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 font-weight-bold">{{__('pregnancy.Comment')}} :</div>
                            <div class="col-md-9"><p align="justify">{!! nl2br(e($outcome->comment)) !!}</p></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection