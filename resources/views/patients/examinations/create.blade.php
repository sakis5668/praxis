@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">

            <div class="row my-3">

            <div class="col-md-4">
                @include('patients.examinations.exam-list-left')
            </div>

            <div class="col-md-8">
                @include('patients.examinations.exam-list-right-create')
            </div>

        </div>
    </div>

@endsection