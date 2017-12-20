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
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        {{__('pregnancy.edit.outcome.title')}}
                    </div>

                    <div class="card-body">
                        {!! Form::model($outcome, ['method'=>'patch', 'action'=>['PregnancyOutcomesController@update', $pregnancy, $outcome]]) !!}

                        <div class="row mt-2">
                            {!! Form::label('date', __('pregnancy.Date') . ' :', ['class'=>'col-md-2 text-right']) !!}
                            @if($outcome->date)
                                {!! Form::text('date', $outcome->date->format('d.m.Y'), ['class'=>'form-control col-md-2']) !!}
                            @else
                                {!! Form::text('date', null, ['class'=>'form-control col-md-2']) !!}
                            @endif
                        </div>

                        <div class="row mt-2">
                            {!! Form::label('termination_type', __('pregnancy.Termination') . ' :', ['class'=>'col-md-2 text-right']) !!}
                            @if($outcome->termination_type)
                                {!! Form::select('termination_type', \App\Enums\PregnancyTerminationType::getDescriptions(), $outcome->termination_type, ['class'=>'form-control col-md-4']) !!}
                            @else
                                {!! Form::select('termination_type', [''=>__('pregnancy.select')] + \App\Enums\PregnancyTerminationType::getDescriptions(), ['class'=>'form-control col-md-4']) !!}
                            @endif
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('delivery_type', __('pregnancy.Delivery') . ' :', ['class'=>'col-md-2 text-right']) !!}
                            @if($outcome->delivery_type)
                                {!! Form::select('delivery_type', \App\Enums\PregnancyDeliveryMode::getDescriptions(), $outcome->delivery_type, ['class'=>'form-control col-md-4']) !!}
                            @else
                                {!! Form::select('delivery_type', [''=>__('pregnancy.select')] + \App\Enums\PregnancyDeliveryMode::getDescriptions(), ['class'=>'form-control col-md-4']) !!}
                            @endif
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('gender', __('pregnancy.Gender') . ' :', ['class'=>'col-md-2 text-right']) !!}
                            @if($outcome->gender)
                                {!! Form::select('gender', \App\Enums\PregnancyGender::getDescriptions(), $outcome->gender, ['class'=>'form-control col-md-4']) !!}
                            @else
                                {!! Form::select('gender', [''=>__('pregnancy.select')] + \App\Enums\PregnancyGender::getDescriptions(), ['class'=>'form-control col-md-4']) !!}
                            @endif
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('weight', __('pregnancy.WeightInGrams') . ' :', ['class'=>'col-md-2 text-right']) !!}
                            {!! Form::text('weight', null, ['class'=>'form-control col-md-2']) !!}
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('indication', __('pregnancy.Indication') . ' :', ['class'=>'col-md-2 text-right']) !!}
                            {!! Form::text('indication', null, ['class'=>'form-control col-md-10']) !!}
                        </div>

                        <div class="row mt-2">
                            {!! Form::label('comment', __('pregnancy.Comment') . ' :', ['class'=>'col-md-2 text-right']) !!}
                            {!! Form::textarea('comment', null, ['class'=>'form-control col-md-10']) !!}
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