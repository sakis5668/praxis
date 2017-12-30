@extends('layouts.app')

@section('content')

    <div class="container">

        <!-- Start Row -->
        <div class="row mt-5">

            <!-- Start Column -->
            <div class="col-md-12">

                <!-- Card -->
                <div class="card">

                    <!-- Card Header -->
                    <div class="card-header">{{__('msg_layouts_app.home.dashboard')}}</div>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <div class="card-body">

                        <!-- Start Row -->
                        <div class="row m3-3">

                            <!-- Start Column -->
                            <div class="col-6">
                                <p align="justify">{!! nl2br(e(__('hippocrates.oath-original'))) !!}</p>
                            </div>
                            <!-- End Column -->

                            <!-- Start Column -->
                            <div class="col-6">
                                <p align="justify"><i>{!! nl2br(e(__('hippocrates.oath'))) !!}</i></p>
                            </div>
                            <!-- End Column -->

                        </div>
                        <!-- End Row -->

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
