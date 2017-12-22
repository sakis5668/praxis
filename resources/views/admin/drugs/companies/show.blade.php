@extends('layouts.admin')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 lead">
                               Company Data
                            </div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>['AdminDrugCompaniesController@edit', $drugCompany]]) !!}
                                {!! Form::button('<i class="fa fa-pencil fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-light col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>'AdminDrugCompaniesController@index']) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-light col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ $drugCompany->logo ? url('/') . '/docs/logos/' . $drugCompany->logo : 'http://placehold.it/400x400' }}"
                                     alt="" class="img-thumbnail" width="100%">
                            </div>
                            <div class="col-md-8">
                                <div class="row mt-2">
                                    <div class="col-md-3 font-weight-bold text-right">Name :</div>
                                    <div class="col-md-9">{{ $drugCompany->name }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3 font-weight-bold text-right">Subtitle :</div>
                                    <div class="col-md-9">{{ $drugCompany->subtitle }}</div>
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-md-3 font-weight-bold text-right">Street :</div>
                                    <div class="col-md-9">{{ $drugCompany->street }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3 font-weight-bold text-right">Postal :</div>
                                    <div class="col-md-9">{{ $drugCompany->postal }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3 font-weight-bold text-right">City :</div>
                                    <div class="col-md-9">{{ $drugCompany->city }}</div>
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-md-3 font-weight-bold text-right">Phone :</div>
                                    <div class="col-md-9">{{ $drugCompany->phone }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3 font-weight-bold text-right">Fax :</div>
                                    <div class="col-md-9">{{ $drugCompany->fax }}</div>
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-md-3 font-weight-bold text-right">E-Mail :</div>
                                    <div class="col-md-9">{{ $drugCompany->email }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3 font-weight-bold text-right">Homepage :</div>
                                    <div class="col-md-9"><a href="http://{{ $drugCompany->website }}" target="_blank">{{ $drugCompany->website }}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection