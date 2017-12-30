@extends('layouts.app')

@section('content')

    <div class="container">

        <!-- Start Row -->
        <div class="row">
            <div class="col-md-12 mt-3">
                @include('patients.actions-top')
            </div>
        </div>
        <!-- End Row -->

        <!-- Start Row -->
        <div class="row">

            <!-- Start Column -->
            <div class="col-md-12 mt-3">

                <!-- Card -->
                <div class="card">

                    <!-- Card Header -->
                    <div class="card-header lead font-weight-bold">

                        <!-- Start Row -->
                        <div class="row">

                            <!-- Start Column -->
                            <div class="col-md-9">
                                {{ $patient->last_name . ', ' . $patient->first_name}}
                            </div>
                            <!-- End Column -->

                            <!-- Start Column -->
                            <div class="col-md-3">
                                <form method="get" action="{{ route('patients.edit', $patient->id) }}"
                                      class="form-inline">
                                    <button type="submit" class="btn btn-outline-cool col-md-12"><i
                                                class="fa fa-pencil fa-lg"></i></button>
                                </form>
                            </div>
                            <!-- End Column -->

                        </div>
                        <!-- End Row -->

                    </div>
                    <!-- End Card Header -->

                    <!-- Card Body -->
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
                                <div class="col-md-8"></div>
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
                            <div class="col-md-4 font-weight-bold">{{__('patients.Physician')}} :</div>
                            <div class="col-md-8">{{ $patient->physician ? $patient->physician->name : ''}}</div>
                        </div>

                        <hr>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{{__('patients.Address')}} :</div>
                            <div class="col-md-8">{{ $patient->address }}</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{{__('patients.Information')}} :</div>
                            <div class="col-md-8"><p align="justify">{!! nl2br(e($patient->information)) !!}</p></div>
                        </div>

                    </div>
                    <!-- End Card Body -->

                </div>
                <!-- End Card -->

            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

    </div>

@endsection
