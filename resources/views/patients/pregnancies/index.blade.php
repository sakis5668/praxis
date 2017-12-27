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
                            <div class="col-md-10 lead">
                                <p>{{__('pregnancy.Pregnancies')}}</p>
                            </div>
                            <div class="col-md-2">
                                {!! Form::open(['method'=>'get', 'action'=>['PregnanciesController@create', $patient]]) !!}
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
                                    <th scope="col">{{__('pregnancy.LMP')}}</th>
                                    <th scope="col">{{__('pregnancy.EDD')}}</th>
                                    <th scope="col">{{__('pregnancy.EDDcorr')}}</th>
                                    <th scope="col">{{__('pregnancy.Termination')}}</th>
                                    <th scope="col">{{__('pregnancy.Finished')}}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($patient->pregnancies as $pregnancy)
                                    <tr onclick="window.location='{{ route('pregnancies.show', [$patient,$pregnancy]) }}'">
                                        <td>
                                            {{ $pregnancy->lmp ? $pregnancy->lmp->format('d.m.Y') : 'no date' }}
                                        </td>
                                        <td>
                                            {{ $pregnancy->edd ? $pregnancy->edd->format('d.m.Y') : 'no date'}}
                                        </td>
                                        <td>
                                            {{ $pregnancy->corrected_edd ? $pregnancy->corrected_edd->format('d.m.Y') : __('pregnancy.nodate')}}
                                        </td>
                                        <td>{{ $pregnancy->pregnancy_termination_type ?  \App\Enums\PregnancyTerminationType::getDescription($pregnancy->pregnancy_termination_type) : __('pregnancy.notavail')}}</td>
                                        <td>{{ $pregnancy->finished ? __('pregnancy.Yes') : __('pregnancy.No')}}</td>
                                        <td>
                                            {!! Form::open(['method'=>'get', 'action'=>['PregnanciesController@edit', $patient, $pregnancy]]) !!}
                                            {!! Form::button('<i class="fa fa-pencil fa"></i>',['type'=>'submit', 'class' => 'btn btn-outline-primary col-12']) !!}
                                            {!! Form::close() !!}
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

