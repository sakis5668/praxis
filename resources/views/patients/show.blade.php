@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">

        <div class="row">
            <div class="col-md-12 my-3">
                @include('patients.actions-top')
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header lead font-weight-bold">
                        <div class="row">
                            <div class="col-md-10">
                                {{ $patient->last_name . ', ' . $patient->first_name}}
                            </div>
                            <div class="col-md-2">
                                <form method="get" action="{{ route('patients.edit', $patient->id) }}"
                                      class="form-inline">
                                    <button type="submit" class="btn btn-outline-cool col-md-12"><i
                                                class="fa fa-pencil fa-lg"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{{__('patients.Middle Name')}} :</div>
                            <div class="col-md-8">{{$patient->middle_name}}</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{{__('patients.Birth Date')}} :</div>
                            @if($patient->birth_date)
                                <div class="col-md-8">{{ $patient->birth_date->format('d.m.Y') }}</div>
                            @else
                                <div class="col-md-8"><i>{{__('patients.no birth date')}}</i></div>
                            @endif
                        </div>

                        <hr>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{{__('patients.E-Mail')}} :</div>
                            <div class="col-md-8">{{ $patient->email }}</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{{__('patients.Mobile Number')}} :</div>
                            <div class="col-md-8">{{ $patient->mobile_number }}</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{{__('patients.Phone Number')}} :</div>
                            <div class="col-md-8">{{ $patient->phone_number }}</div>
                        </div>

                        <hr>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{{__('patients.Address')}} :</div>
                            <div class="col-md-8">{{ $patient->address }}</div>
                        </div>

                        <hr>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{{__('patients.Information')}} :</div>
                            <div class="col-md-8"><p align="justify">{!! nl2br(e($patient->information)) !!}</p></div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection