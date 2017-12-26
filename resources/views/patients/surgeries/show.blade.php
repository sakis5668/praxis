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

                    <div class="card-header lead">
                        <div class="row">
                            <div class="col-md-6">
                                {{ $surgery->date ? $surgery->date->format('d.m.Y') : __('surgery.no date') . ' : ' . $surgery->therapy }}
                            </div>

                            <div class="col-md-2 ml-auto">
                                <form method="get" action="{{ route('surgeries.pdf',[$patient, $surgery]) }}"
                                      class="form-inline" target="_blank">
                                    <button type="submit" class="btn btn-outline-cool col-md-12"><i
                                                class="fa fa-file-pdf-o fa-lg"></i></button>
                                </form>
                            </div>
                            <div class="col-md-2 ml-auto">
                                <form method="get" action="{{ route('surgeries.edit',[$patient, $surgery]) }}"
                                      class="form-inline">
                                    <button type="submit" class="btn btn-outline-cool col-md-12"><i
                                                class="fa fa-pencil fa-lg"></i></button>
                                </form>
                            </div>
                            <div class="col-md-2 ml-auto">
                                <form method="get" action="{{ route('surgeries.index', $patient) }}"
                                      class="form-inline">
                                    <button type="submit" class="btn btn-outline-cool col-md-12"><i
                                                class="fa fa-arrow-left fa-lg"></i></button>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-weight-bold">{{__('surgery.Diagnosis')}} :</div>
                                <div>{{ $surgery->diagnosis }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-weight-bold">{{__('surgery.Therapy')}} :</div>
                                <div>{{ $surgery->therapy }}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-weight-bold">{{__('surgery.Surgeon')}} :</div>
                                <div>{{ $surgery->surgeon }}</div>
                            </div>
                           <div class="col-md-6">
                               <div class="font-weight-bold">{{__('surgery.Assistant')}} :</div>
                               <div>{{ $surgery->assistant }}</div>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-weight-bold">{{__('surgery.Anesthesia')}} :</div>
                                <div>{{ $surgery->anesthesia }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-weight-bold">{{__('surgery.Anesthesist')}} :</div>
                                <div>{{ $surgery->anesthesist }}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="font-weight-bold">{{__('surgery.Text')}} :</div>
                                <div"><p align="justify">{!! nl2br(e($surgery->text)) !!}</p></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
