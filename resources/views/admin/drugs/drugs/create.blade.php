@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">

                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9 lead">
                                {{__('drug-companies.Enter New Drug Data')}}
                            </div>
                            <div class="col-md-3">
                                {!! Form::open(['method'=>'get', 'action'=>'AdminDrugsController@index']) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['method'=>'post', 'action'=>'AdminDrugsController@store', 'files'=>true]) !!}
                        <div class="row mt-2">
                            {!! Form::label('name', __('drug-companies.Name') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                            {!! Form::text('name', null, ['class'=>'form-control col-md-9']) !!}
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('drug_company_id', __('drug-companies.Company') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                            {!! Form::select('drug_company_id', [''=>'Select...'] + $companies, ['class'=>'form-control col-md-9']) !!}
                        </div>
                        <hr>
                        <div class="row mt-2">
                            {!! Form::label('information', __('drug-companies.Information') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                            {!! Form::textarea('information', null, ['class'=>'form-control col-md-9', 'rows' => 5]) !!}
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('content', __('drug-companies.Content') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                            {!! Form::text('content', null, ['class'=>'form-control col-md-9']) !!}
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('dosage', __('drug-companies.Dosage') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                            {!! Form::text('dosage', null, ['class'=>'form-control col-md-9']) !!}
                        </div>
                        <hr>
                        <div class="row mt-2">
                            {!! Form::label('filename', __('drug-companies.Picture') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
{{--                            {!! Form::file('filename', null, ['class'=>'form-control col-md-9']) !!}--}}
                            <input type="button" class="btn btn-outline-cool" id="loadFileXml" value="{{__('drug-companies.Select File')}}" onclick="document.getElementById('filename').click();" />
                            <input type="file" style="display:none;" id="filename" name="filename"/>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-3 ml-auto">
                            {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-primary form-control']) !!}
                            </div></div>
                        {!! Form::close() !!}
                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection