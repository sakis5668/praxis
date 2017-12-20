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
            <div class="col-md-4">
                @include('patients.pregnancies.examinations.left-list')
            </div>
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                {{__('pregnancy.Findings')}}
                            </div>
                            <div class="col-md-3">
                                {!! Form::model($examination, ['method'=>'get', 'action'=>['PregnancyExaminationsController@edit', $pregnancy, $examination]]) !!}
                                {!! Form::button('<i class="fa fa-pencil fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-light']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-3 text-right">
                                {{__('pregnancy.Date')}} :
                            </div>
                            <div class="col-md-2">
                                {{ $examination->date ? $examination->date->format('d.m.Y') : 'no date' }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 text-right">
                                {{__('pregnancy.Weeks')}} :
                            </div>
                            <div class="col-md-2">
                                {{ $examination->pregnancy_age }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 text-right">
                                {{__('pregnancy.Findings')}} :
                            </div>
                            <div class="col-md-9">
                                <p align="justify">{!! nl2br(e($examination->findings)) !!}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 text-right">
                                {{__('pregnancy.Instructions')}} :
                            </div>
                            <div class="col-md-9">
                                <p align="justify">{!! nl2br(e($examination->instructions)) !!}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection