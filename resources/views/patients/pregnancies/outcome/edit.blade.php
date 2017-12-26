@extends('layouts.app')

@section('content')

    @include('layouts.language')

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
                                {{__('pregnancy.edit.outcome.title')}}
                            </div>
                            <div class="col-3">
                                {!! Form::open(['method'=>'get', 'action'=>['PregnancyOutcomesController@show', $pregnancy, $outcome]]) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>',['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::model($outcome, ['method'=>'patch', 'action'=>['PregnancyOutcomesController@update', $pregnancy, $outcome]]) !!}

                        <div class="row mt-2">
                            {!! Form::label('date', __('pregnancy.Date') . ' :', ['class'=>'col-md-3 font-weight-bold']) !!}
                            @if($outcome->date)
                                {!! Form::text('date', $outcome->date->format('d.m.Y'), ['class'=>'form-control col-md-3']) !!}
                            @else
                                {!! Form::text('date', null, ['class'=>'form-control col-md-3']) !!}
                            @endif
                        </div>

                        <div class="row mt-2">
                            {!! Form::label('delivery_type', __('pregnancy.Delivery') . ' :', ['class'=>'col-md-3 font-weight-bold']) !!}
                            @if($outcome->delivery_type)
                                {!! Form::select('delivery_type', \App\Enums\PregnancyDeliveryMode::getDescriptions(), $outcome->delivery_type, ['class'=>'form-control col-md-3']) !!}
                            @else
                                {!! Form::select('delivery_type', [''=>__('pregnancy.select')] + \App\Enums\PregnancyDeliveryMode::getDescriptions(), ['class'=>'form-control col-md-3']) !!}
                            @endif
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('gender', __('pregnancy.Gender') . ' :', ['class'=>'col-md-3 font-weight-bold']) !!}
                            @if($outcome->gender)
                                {!! Form::select('gender', \App\Enums\PregnancyGender::getDescriptions(), $outcome->gender, ['class'=>'form-control col-md-3']) !!}
                            @else
                                {!! Form::select('gender', [''=>__('pregnancy.select')] + \App\Enums\PregnancyGender::getDescriptions(), ['class'=>'form-control col-md-3']) !!}
                            @endif
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('weight', __('pregnancy.WeightInGrams') . ' :', ['class'=>'col-md-3 font-weight-bold']) !!}
                            {!! Form::text('weight', null, ['class'=>'form-control col-md-3']) !!}
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('indication', __('pregnancy.Indication') . ' :', ['class'=>'col-md-3 font-weight-bold']) !!}
                            {!! Form::text('indication', null, ['class'=>'form-control col-md-9']) !!}
                        </div>

                        <div class="row mt-2">
                            {!! Form::label('comment', __('pregnancy.Comment') . ' :', ['class'=>'col-md-3 font-weight-bold']) !!}
                            {!! Form::textarea('comment', null, ['class'=>'form-control col-md-9']) !!}
                        </div>

                        <hr>

                        <div class="row mt-2">
                            {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-primary col-md-2 ml-auto']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection