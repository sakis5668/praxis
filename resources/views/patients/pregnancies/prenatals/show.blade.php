@extends('layouts.app')

@section('content')

    @include('layouts.language')

    @include('patients.pregnancies.pregnancies-menu')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('patients.pregnancies.prenatals.left-list')
            </div>
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                {{__('pregnancy.prenatal.findings')}}
                            </div>
                            <div class="col-md-3">
                                {!! Form::open(['method'=>'get', 'action'=>['PregnancyPrenatalsController@edit', $pregnancy, $prenatal]]) !!}
                                {!! Form::button('<i class="fa fa-pencil fa-lg"></i>',['type'=>'submit', 'class'=>'form-control btn btn-light']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-3">{{__('pregnancy.Date')}} :</div>
                            <div class="col-md-2">{{ $prenatal->date ? $prenatal->date->format('d.m.Y') : __('pregnancy.nodate') }}</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">{{__('pregnancy.Weeks')}} :</div>
                            <div class="col-md-2">{{ $prenatal->pregnancy_age }}</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">{{__('pregnancy.Type')}} :</div>
                            <div class="col-md-4">{{ \App\Enums\PregnancyPrenatalType::getDescription($prenatal->type) }}</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">{{__('pregnancy.Examiner')}} :</div>
                            <div class="col-md-4">{{ $prenatal->examiner }}</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">{{__('pregnancy.Findings')}} :</div>
                            <div class="col-md-9"><p align="justify">{!! nl2br(e($prenatal->findings)) !!}</p></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection