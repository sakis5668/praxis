@extends('layouts.admin')

@section('content')

    @include('layouts.language')

    <div class="container">

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 lead">
                               {{__('drug-companies.Drug Data')}}
                            </div>
                            <div class="col-md-3 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>['AdminDrugsController@edit', $drug]]) !!}
                                {!! Form::button('<i class="fa fa-pencil fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-3 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>'AdminDrugsController@index']) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ $drug->filename ? url('/') . '/docs/images/drugs/' . $drug->filename : 'http://placehold.it/400x400' }}"
                                     alt="" class="img-thumbnail" width="100%">
                            </div>
                            <div class="col-md-8">
                                <div class="row mt-2">
                                    <div class="col-md-3 font-weight-bold text-right">{{__('drug-companies.Name')}} :</div>
                                    <div class="col-md-9">{{ $drug->name }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3 font-weight-bold text-right">{{__('drug-companies.Company')}} :</div>
                                    @if($drug->drugCompany)
                                        <div class="col-md-9">{{ $drug->drugCompany->name }}</div>
                                    @else
                                        <div class="col-md-9"><i>{{__('drug-companies.no company data')}}</i></div>
                                    @endif
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-md-3 font-weight-bold text-right">{{__('drug-companies.Information')}} :</div>
                                    <div class="col-md-9"><p align="justify">{!! nl2br(e($drug->information)) !!}</p></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3 font-weight-bold text-right">{{__('drug-companies.Content')}} :</div>
                                    <div class="col-md-9">{{ $drug->content }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3 font-weight-bold text-right">{{__('drug-companies.Dosage')}} :</div>
                                    <div class="col-md-9">{{ $drug->dosage }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection