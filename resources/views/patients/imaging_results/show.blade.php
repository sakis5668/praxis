@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row my-3">
            <div class="col-md-12">
                @include('patients.actions-top')
            </div>
        </div>

        <div class="row  my-3">
            <div class="col-md-4">
                @include('patients.imaging_results.list-left')
            </div>
            <div class="col-md-8">
                @include('patients.imaging_results.list-right-show')
            </div>
        </div>

    </div>

@endsection
