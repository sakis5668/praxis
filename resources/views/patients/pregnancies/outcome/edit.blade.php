@extends('layouts.app')

@section('content')

    @include('layouts.language')

    @include('patients.pregnancies.pregnancies-menu')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        Edit Pregnancy Outcome Data
                    </div>

                    <div class="card-body">
                        {!! Form::model($outcome, ['method'=>'patch', 'action'=>['PregnancyOutcomesController@update', $pregnancy, $outcome]]) !!}

                        <div class="row mt-2">
                            {!! Form::label('date', 'Date :', ['class'=>'col-md-2 text-right']) !!}
                            @if($outcome->date)
                                {!! Form::text('date', $outcome->date->format('d.m.Y'), ['class'=>'form-control col-md-2']) !!}
                            @else
                                {!! Form::text('date', null, ['class'=>'form-control col-md-2']) !!}
                            @endif
                        </div>

                        <div class="row mt-2">
                            {!! Form::label('termination_type', 'Termination :', ['class'=>'col-md-2 text-right']) !!}
                            @if($outcome->termination_type)
                                {!! Form::select('termination_type', \App\Enums\PregnancyTerminationType::getDescriptions(), $outcome->termination_type, ['class'=>'form-control col-md-4']) !!}
                            @else
                                {!! Form::select('termination_type', [''=>'Select...'] + \App\Enums\PregnancyTerminationType::getDescriptions(), ['class'=>'form-control col-md-4']) !!}
                            @endif
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('delivery_type', 'Delivery :', ['class'=>'col-md-2 text-right']) !!}
                            @if($outcome->delivery_type)
                                {!! Form::select('delivery_type', \App\Enums\PregnancyDeliveryMode::getDescriptions(), $outcome->delivery_type, ['class'=>'form-control col-md-4']) !!}
                            @else
                                {!! Form::select('delivery_type', [''=>'Select...'] + \App\Enums\PregnancyDeliveryMode::getDescriptions(), ['class'=>'form-control col-md-4']) !!}
                            @endif
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('gender', 'Gender :', ['class'=>'col-md-2 text-right']) !!}
                            @if($outcome->gender)
                                {!! Form::select('gender', \App\Enums\PregnancyGender::getDescriptions(), $outcome->gender, ['class'=>'form-control col-md-4']) !!}
                            @else
                                {!! Form::select('gender', [''=>'Select...'] + \App\Enums\PregnancyGender::getDescriptions(), ['class'=>'form-control col-md-4']) !!}
                            @endif
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('weight', 'Weight [g]:', ['class'=>'col-md-2 text-right']) !!}
                            {!! Form::text('weight', null, ['class'=>'form-control col-md-2']) !!}
                        </div>
                        <div class="row mt-2">
                            {!! Form::label('indication', 'Indication :', ['class'=>'col-md-2 text-right']) !!}
                            {!! Form::text('indication', null, ['class'=>'form-control col-md-10']) !!}
                        </div>

                        <div class="row mt-2">
                            {!! Form::label('comment', 'Comment :', ['class'=>'col-md-2 text-right']) !!}
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