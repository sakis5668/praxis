@extends('layouts.app')

@section('content')

    @include('layouts.language')

    @include('patients.pregnancies.pregnancies-menu')

    <div class="container">
        <div class="row">
            <div class="col-md-4">

                @include('patients.pregnancies.examinations.left-list')

            </div>

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                Findings
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
                            <div class="col-md-2">
                                Date :
                            </div>
                            <div class="col-md-2">
                                {{ $examination->date ? $examination->date->format('d.m.Y') : 'no date' }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2">
                                Weeks :
                            </div>
                            <div class="col-md-2">
                                {{ $examination->pregnancy_age }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2">
                                Findings :
                            </div>
                            <div class="col-md-10">
                                <p align="justify">{!! nl2br(e($examination->findings)) !!}</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection