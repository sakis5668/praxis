@extends('layouts.app')

@section('content')

    @include('layouts.language')


    <div class="container">

        <div class="row mt-3">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 lead">
                                {{__('drug-companies.Drug Data')}}
                            </div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>'UserDrugsController@index']) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-light col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        {{-- Here comes the Drug Data --}}
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

                        <hr>

                        {{-- Here comes the Company Data --}}
                        <div class="row">
                            @if($drug->drugCompany)
                                <div class="col-md-4">
                                    {{--<img src="{{ $drug->drugCompany->logo ? url('/') . '/docs/images/logos/' . $drug->drugCompany->logo : 'http://placehold.it/400x400' }}"
                                         alt="" class="img-thumbnail" width="100%">--}}
                                </div>

                                <div class="col-md-8">
                                    <div class="row mt-2">
                                        <div class="col-md-3 font-weight-bold text-right">{{__('drug-companies.Name')}} :</div>
                                        <div class="col-md-9">{{ $drug->drugCompany->name }}</div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3 font-weight-bold text-right">{{__('drug-companies.Subtitle')}} :</div>
                                        <div class="col-md-9">{{ $drug->drugCompany->subtitle }}</div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3 font-weight-bold text-right">{{__('drug-companies.Street')}} :</div>
                                        <div class="col-md-9">{{ $drug->drugCompany->street }}</div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3 font-weight-bold text-right">{{__('drug-companies.Postal')}}, {{__('drug-companies.City')}} :</div>
                                        <div class="col-md-9">{{ $drug->drugCompany->postal }}
                                            , {{ $drug->drugCompany->city }}</div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3 font-weight-bold text-right">{{__('drug-companies.Phone')}}, {{__('drug-companies.Fax')}} :</div>
                                        <div class="col-md-9">{{ $drug->drugCompany->phone }}
                                            , {{ $drug->drugCompany->fax }}</div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3 font-weight-bold text-right">{{__('drug-companies.E-Mail')}} :</div>
                                        <div class="col-md-9">{{ $drug->drugCompany->email }}</div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3 font-weight-bold text-right">{{__('drug-companies.Homepage')}} :</div>
                                        <div class="col-md-9"><a href="http://{{ $drug->drugCompany->website }}" target="_blank">{{ $drug->drugCompany->website }}</a></div>
                                    </div>
                                </div>

                            @else

                                <div class="col-md-12">
                                    <p class="lead text-center"><i>{{__('drug-companies.no company data')}}</i></p>
                                </div>

                            @endif
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>


@endsection