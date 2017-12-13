@extends('layouts.app')

@section('content')

    @include('layouts.language')

    @include('patients.back-to-patients-button')

    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header font-weight-bold">
                        <div class="row">
                            <div class="col-md-10">
                                <p>Pregnancies</p>
                            </div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>['PregnanciesController@create', $patient]]) !!}
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
                                    <th scope="col">ID</th>
                                    <th scope="col">LMP</th>
                                    <th scope="col">EDD</th>
                                    <th scope="col">EDD (corr.)</th>
                                    <th scope="col">Termination</th>
                                    <th scope="col">Finished</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($patient->pregnancies as $pregnancy)
                                    <tr>
                                        <th scope="row">{{ $pregnancy->id }}</th>
                                        <td><a href="{{ route ('pregnancies.show', [$patient,$pregnancy]) }}">{{ $pregnancy->lmp ? $pregnancy->lmp->format('d.m.Y') : 'no date' }}</a></td>
                                        <td><a href="{{ route ('pregnancies.show', [$patient,$pregnancy]) }}">{{ $pregnancy->edd ? $pregnancy->edd->format('d.m.Y') : 'no date'}}</a></td>
                                        <td><a href="{{ route ('pregnancies.show', [$patient,$pregnancy]) }}">{{ $pregnancy->corrected_edd ? $pregnancy->corrected_edd->format('d.m.Y') : 'no date'}}</a></td>
                                        <td>{{ $pregnancy->pregnancyTerminationType->type }}</td>
                                        <td>{{ $pregnancy->finished ? 'Yes' : 'No'}}</td>
                                        <td>
                                            {{--@if(! $pregnancy->finished)--}}
                                                {!! Form::open(['method'=>'get', 'action'=>['PregnanciesController@edit', $patient, $pregnancy]]) !!}
                                                {!! Form::button('<i class="fa fa-pencil fa-lg"></i>',['type'=>'submit', 'class' => 'btn btn-light col-md-12']) !!}
                                                {!! Form::close() !!}
                                            {{--@endif--}}
                                        </td>
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