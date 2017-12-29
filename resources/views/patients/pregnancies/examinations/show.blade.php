@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">
                @include('patients.actions-top')
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                @include('patients.pregnancies.pregnancies-menu')
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mt-3">
                @include('patients.pregnancies.examinations.left-list')
            </div>
            <div class="col-md-8 mt-3">
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-6 col-md-9">
                                {{__('pregnancy.Findings')}}
                            </div>
                            <div class="col-6 col-md-3">
                                {!! Form::model($examination, ['method'=>'get', 'action'=>['PregnancyExaminationsController@edit', $pregnancy, $examination]]) !!}
                                {!! Form::button('<i class="fa fa-pencil fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-4 font-weight-bold">
                                {{__('pregnancy.Date')}} :
                            </div>
                            <div class="col-md-8">
                                {{ $examination->date ? $examination->date->format('d.m.Y') : 'no date' }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 font-weight-bold">
                                {{__('pregnancy.Weeks')}} :
                            </div>
                            <div class="col-md-8">
                                {{ $examination->pregnancy_age }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 font-weight-bold">
                                {{__('pregnancy.Findings')}} :
                            </div>
                            <div class="col-md-8">
                                <p align="justify">{!! nl2br(e($examination->findings)) !!}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 font-weight-bold">
                                {{__('pregnancy.Instructions')}} :
                            </div>
                            <div class="col-md-8">
                                <p align="justify">{!! nl2br(e($examination->instructions)) !!}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection