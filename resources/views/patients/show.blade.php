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
                                    <button type="submit" class="btn btn-light col-md-12"><i
                                                class="fa fa-pencil fa-lg"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row my-1">
                            <div class="col-md-3 font-weight-bold text-right">{{__('patients-show-view.middle.name.label')}}</div>
                            <div class="col-md-4">{{$patient->middle_name}}</div>
                        </div>

                        <div class="row my-1">
                            <div class="col-md-3 font-weight-bold text-right">{{__('patients-show-view.birthdate.label')}}</div>
                            <div class="col-md-2">{{ $patient->birth_date ? $patient->birth_date->format('d.m.Y') : __('patients-show-view.no.birthdate.label') }}</div>
                        </div>

                        <hr>

                        <div class="row my-1">
                            <div class="col-md-3 font-weight-bold text-right">{{__('patients-show-view.email.label')}}</div>
                            <div class="col-md-4">{{ $patient->email }}</div>
                        </div>

                        <div class="row my-1">
                            <div class="col-md-3 font-weight-bold text-right">{{__('patients-show-view.mobile.number.label')}}</div>
                            <div class="col-md-4">{{ $patient->mobile_number }}</div>
                        </div>

                        <div class="row my-1">
                            <div class="col-md-3 font-weight-bold text-right">{{__('patients-show-view.phone.number.label')}}</div>
                            <div class="col-md-4">{{ $patient->phone_number }}</div>
                        </div>

                        <hr>

                        <div class="row my-1">
                            <div class="col-md-3 font-weight-bold text-right">{{__('patients-show-view.address.label')}}</div>
                            <div class="col-md-4">{{ $patient->address }}</div>
                        </div>

                        <hr>

                        <div class="row my-1">
                            <div class="col-md-3 font-weight-bold text-right">{{__('patients-show-view.information.label')}}</div>
                            <div class="col-md-9">{!! nl2br(e($patient->information)) !!}</div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection