@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row mt-3">
            <div class="col-md-12">
                @include('patients.actions-top')
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mt-3">
                @include('patients.examinations.exam-list-left')
            </div>
            <div class="col-md-8 mt-3">
                @include('patients.examinations.exam-list-right-create')
            </div>
        </div>

    </div>

@endsection
