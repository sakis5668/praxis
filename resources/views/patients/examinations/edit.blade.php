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

@section('scripts')
    <script>
        function ConfirmDelete() {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection
