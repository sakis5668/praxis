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
                @include('patients.pregnancies.pregnancies-menu')
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-4">
                @include('patients.pregnancies.examinations.left-list')
            </div>
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        {{__('pregnancy.Findings')}}
                    </div>

                    <div class="card-body">

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection