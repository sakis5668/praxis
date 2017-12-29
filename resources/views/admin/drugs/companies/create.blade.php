@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">

                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9 lead">
                                {{__('drug-companies.Enter New Company Data')}}
                            </div>
                            <div class="col-md-3">
                                {!! Form::open(['method'=>'get', 'action'=>'AdminDrugCompaniesController@index']) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="col-md-12">
                            {!! Form::open(['method'=>'post', 'action'=>'AdminDrugCompaniesController@store', 'files'=>true]) !!}

                            <div class="row mt-2">
                                {!! Form::label('name', __('drug-companies.Name') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('name', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('subtitle', __('drug-companies.Subtitle') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('subtitle', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <hr>
                            <div class="row mt-2">
                                {!! Form::label('street', __('drug-companies.Street') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('street', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('postal', __('drug-companies.Postal') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('postal', null, ['class'=>'form-control col-md-2']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('city', __('drug-companies.City') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('city', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <hr>
                            <div class="row mt-2">
                                {!! Form::label('phone', __('drug-companies.Phone') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('phone', null, ['class'=>'form-control col-md-4']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('fax', __('drug-companies.Fax') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('fax', null, ['class'=>'form-control col-md-4']) !!}
                            </div>
                            <hr>
                            <div class="row mt-2">
                                {!! Form::label('email', __('drug-companies.E-Mail') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('email', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('website', __('drug-companies.Homepage') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('website', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <hr>
                            <div class="form-group row mt-2">
                                {!! Form::label('logo', __('drug-companies.Logo') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                <input type="button" class="btn btn-outline-cool" id="loadFileXml" value="{{__('drug-companies.Select File')}}" onclick="document.getElementById('logo').click();" />
                                <input type="file" style="display:none;" id="logo" name="logo"/>

                            </div>
                            <hr>
                            <div class="row mt-2">
                                {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-primary form-control col-md-3 ml-auto']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
