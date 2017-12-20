@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">

        <div class="row my-3">
            <div class="col-md-12">
                @include('patients.actions-top')
            </div>
        </div>

        <div class="row  my-3">
            <div class="col-md-4">
                @include('patients.laboratory_examinations.list-left')
            </div>
            <div class="col-md-8">
                @include('patients.laboratory_examinations.list-right-show')
            </div>
        </div>

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

@section('styles')

@endsection