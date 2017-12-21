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

                    <div class="card-header font-weight-bold">
                        <div class="row">
                            <div class="col-md-10">
                                <p>{{__('surgery.surgery.overview.label')}}</p>
                            </div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>['SurgeriesController@create', $patient]]) !!}
                                {!! Form::button('<i class="fa fa-plus fa-lg"></i>', ['type'=> 'submit', 'class'=>'form-control btn btn-light']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    {{--<th scope="col">{{__('surgery.id.label')}}</th>--}}
                                    <th scope="col">{{__('surgery.date.label')}}</th>
                                    <th scope="col">{{__('surgery.diagnosis.label')}}</th>
                                    <th scope="col">{{__('surgery.therapy.label')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($patient->surgeries as $surgery)
                                    <tr>
                                        {{--<th scope="row">{{ $surgery->id }}</th>--}}
                                        <td>
                                            <a href="{{ route('surgeries.show', [$patient, $surgery]) }}">{{ $surgery->date ? $surgery->date->format('d.m.Y') : __('surgery.no.date.label') }} </a>
                                        </td>
                                        <td>{{ $surgery->diagnosis }}</td>
                                        <td>{{ $surgery->therapy }}</td>
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
