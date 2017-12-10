@extends('layouts.app')

@section('content')

    @include('layouts.language')

    {{-- MENU --}}
    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header lead font-weight-bold">
                        <div class="row">
                            <div class="col-md-10">
                                Pregnancy - EDD
                                : {{ $pregnancy->edd ? $pregnancy->edd->format('d.m.Y') : 'no EDD found (should be fixed!)' }}
                            </div>
                            <div class="col-md-2 ml-auto">
                                <form method="get" action="{{ route('pregnancies.index', $patient) }}">
                                    <button type="submit" class="btn btn-cool col-md-12"><i
                                                class="fa fa-arrow-left"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3 py-1">
                                <form method="get"
                                      action="{{ route('pregnancy.history.show', [$pregnancy, $pregnancy->pregnancyHistory]) }}"
                                      class="form-inline">
                                    <button type="submit" class="btn btn-cool col-md-12">History</button>
                                </form>
                            </div>
                            <div class="col-md-3 py-1">
                                <form method="get" action="" class="form-inline">
                                    <button type="submit" class="btn btn-cool col-md-12">Examinations</button>
                                </form>
                            </div>
                            <div class="col-md-3 py-1">
                                <form method="get" action="" class="form-inline">
                                    <button type="submit" class="btn btn-cool col-md-12">Prenatal</button>
                                </form>
                            </div>
                            <div class="col-md-3 py-1">
                                <form method="get" action="" class="form-inline">
                                    <button type="submit" class="btn btn-cool col-md-12">Outcome</button>
                                </form>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>

    {{-- HISTORY AREA--}}
    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header lead">
                        <div class="row">
                            <div class="col-md-8">
                                Pregnancy History

                            </div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>['PregnancyHistoryController@edit', $pregnancy, $history]]) !!}
                                {!! Form::button('<i class="fa fa-pencil fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-light col-md-12 ml-auto']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p align="justify">{!! nl2br(e($history->history)) !!}</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
