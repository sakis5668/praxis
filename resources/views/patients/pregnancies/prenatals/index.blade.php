@extends('layouts.app')

@section('content')

    @include('layouts.language')

    @include('patients.pregnancies.pregnancies-menu')

    <div class="container">

        <div class="row">

            <div class="col-md-4">
                @include('patients.pregnancies.prenatals.left-list')
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Prenatal Diagnosis Findings
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection