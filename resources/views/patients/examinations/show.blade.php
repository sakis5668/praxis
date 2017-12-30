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
            <div class="col-md-4 mt-3">
                @include('patients.examinations.exam-list-left')
            </div>
            <!-- End Column -->

            <!-- Start Column -->
            <div class="col-md-8 mt-3">
                @include('patients.examinations.exam-list-right-show')
            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

    </div>

@endsection