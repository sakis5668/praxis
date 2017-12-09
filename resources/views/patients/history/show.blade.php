@extends('layouts.app')

@section('content')
    @include('layouts.language')
    @include('patients.back-to-patients-button')

    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header lead font-weight-bold">
                        <div class="row">
                            <div class="col-md-10">
                                {{ $patient->last_name . ', ' . $patient->first_name . ' - ' . __('history.medical.history.label')}}
                            </div>
                            <div class="col-md-2 ml-auto">
                                <form method="get" action="{{ route('history.edit', [$patient, $patient->history]) }}" class="form-inline">
                                    <button type="submit" class="btn btn-light col-md-12"><i class="fa fa-pencil fa-lg"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-md-12">
                            {!! nl2br(e($patient->history->history)) !!}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection