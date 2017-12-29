@extends('layouts.app')

@section('content')

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
                @include('patients.pregnancies.prenatals.left-list')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{__('pregnancy.prenatal.findings')}}
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
