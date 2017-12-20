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

                    <div class="card-header lead font-weight-bold">
                        <div class="row">
                            <div class="col-md-6">
                                {{ $surgery->date ? $surgery->date->format('d.m.Y') : __('surgery.no.date.label') . ' : ' . $surgery->therapy }}
                            </div>
                            <div class="col-md-2 py-1 ml-auto">
                                <form method="get" action="{{ route('surgeries.index', $patient) }}"
                                      class="form-inline">
                                    <button type="submit" class="btn btn-cool col-md-12"><i
                                                class="fa fa-arrow-left fa-lg"></i></button>

                                </form>
                            </div>
                            <div class="col-md-2 py-1 ml-auto">
                                <form method="get" action="{{ route('surgeries.pdf',[$patient, $surgery]) }}"
                                      class="form-inline">
                                    <button type="submit" class="btn btn-light col-md-12"><i
                                                class="fa fa-file-pdf-o fa-lg"></i></button>
                                </form>
                            </div>
                            <div class="col-md-2 py-1 ml-auto">
                                <form method="get" action="{{ route('surgeries.edit',[$patient, $surgery]) }}"
                                      class="form-inline">
                                    <button type="submit" class="btn btn-light col-md-12"><i
                                                class="fa fa-pencil fa-lg"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 font-weight-bold text-right">{{__('surgery.diagnosis2.label')}} </div>
                            <div class="col-md-4">{{ $surgery->diagnosis }}</div>
                            <div class="col-md-2 font-weight-bold text-right">{{__('surgery.therapy2.label')}}</div>
                            <div class="col-md-4">{{ $surgery->therapy }}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2 font-weight-bold text-right">{{__('surgery.surgeon.label')}}</div>
                            <div class="col-md-4">{{ $surgery->surgeon }}</div>
                            <div class="col-md-2 font-weight-bold text-right">{{__('surgery.assistant.label')}}</div>
                            <div class="col-md-4">{{ $surgery->assistant }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 font-weight-bold text-right">{{__('surgery.anesthesia.label')}}</div>
                            <div class="col-md-4">{{ $surgery->anesthesia }}</div>
                            <div class="col-md-2 font-weight-bold text-right">{{__('surgery.anesthesist.label')}}</div>
                            <div class="col-md-4">{{ $surgery->anesthesist }}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2 font-weight-bold text-right">{{__('surgery.text.label')}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">{!! nl2br(e($surgery->text)) !!}</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
