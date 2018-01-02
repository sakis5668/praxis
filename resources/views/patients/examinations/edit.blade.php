@extends('layouts.app')

@section('content')

    <div class="container">

        <!-- Start Row -->
        <div class="row mt-3">
            <div class="col-md-12">
                @include('patients.actions-top')
            </div>
        </div>
        <!-- End Row -->

        <!-- Start Row -->
        <div class="row mt-3">

            <!-- Start Column -->
            <div class="col-md-4">
                @include('patients.examinations.exam-list-left')
            </div>
            <!-- End Column -->

            <!-- Start Column -->
            <div class="col-md-8">
                @include('patients.examinations.exam-list-right-edit')
            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

    </div>

@endsection


@section('styles')
    <link rel="stylesheet" href="{{ asset('css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themes/default.css') }}">
@endsection


@section('scripts')
    <script src="{{asset('js/alertify.min.js')}}"></script>
    <script>

        $('#deleteButton').on('click', function () {
            alertify.confirm(
                '{{__('msg_layouts_app.Confirmation')}}',
                '{{__('msg_layouts_app.confirmMsg')}}',
                function(e) {
                    if(e) {
                        $('#deleteForm').submit();
                    }
                },
                function() {
                    alertify.error('{{__('msg_layouts_app.Cancel')}}');
                });
        });

    </script>
@endsection
