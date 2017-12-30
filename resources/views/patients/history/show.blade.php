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
            <div class="col-md-12 mt-3">

                <!-- Card -->
                <div class="card">

                    <!-- Card Header -->
                    <div class="card-header lead">

                        <!-- Start Row -->
                        <div class="row">

                            <!-- Start Column -->
                            <div class="col-md-9">
                                {{__('history.medical.history.label')}}
                            </div>
                            <!-- End Column -->

                            <!-- Start Column -->
                            <div class="col-md-3">
                                <form method="get" action="{{ route('history.edit', [$patient, $patient->history]) }}"
                                      class="form-inline">
                                    <button type="submit" class="btn btn-outline-cool col-md-12"><i
                                                class="fa fa-pencil fa-lg"></i></button>
                                </form>
                            </div>
                            <!-- End Column -->

                        </div>
                        <!-- End Row -->

                    </div>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p align="justify">{!! nl2br(e($patient->history->history)) !!}</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card Body -->

                </div>
                <!-- End Card -->

            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

    </div>

@endsection