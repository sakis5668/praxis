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
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <p class="lead">{{__('surgery.Surgery Overview Table')}}</p>
                            </div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>['SurgeriesController@create', $patient]]) !!}
                                {!! Form::button('<i class="fa fa-plus fa-lg"></i>', ['type'=> 'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{__('surgery.Date')}}</th>
                                    <th scope="col">{{__('surgery.Diagnosis')}}</th>
                                    <th scope="col">{{__('surgery.Therapy')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($patient->surgeries as $surgery)
                                    <tr>
                                        <td>
                                            <a href="{{ route('surgeries.show', [$patient, $surgery]) }}">{{ $surgery->date ? $surgery->date->format('d.m.Y') : __('surgery.no.date.label') }} </a>
                                        </td>
                                        <td><a href="{{ route('surgeries.show', [$patient, $surgery]) }}">{{ $surgery->diagnosis }}</a></td>
                                        <td><a href="{{ route('surgeries.show', [$patient, $surgery]) }}">{{ $surgery->therapy }}</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
