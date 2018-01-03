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
                @include('patients.histologies.list-left')
            </div>
            <div class="col-md-8">
                @include('patients.histologies.list-right-show')
            </div>
        </div>

    </div>

@endsection
