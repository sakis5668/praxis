@extends('layouts.app')

@section('content')

    @include('layouts.language')

    {{-- BACK BUTTON --}}
    @include('patients.back-to-patients-button')

    {{-- CONTAINER--}}
    <div class="container">
        <div class="row my-3">
            <div class="col-md-4">
                @include('patients.examinations.exam-list-left')
            </div>
        </div>
    </div>

@endsection