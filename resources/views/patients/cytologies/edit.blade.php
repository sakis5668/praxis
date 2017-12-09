@extends('layouts.app')

@section('content')

    @include('layouts.language')

    @include('patients.back-to-patients-button')

    {{-- CONTAINER --}}
    <div class="container">
        <div class="row my-3">
            <div class="col-md-4">
                @include('patients.cytologies.list-left')
            </div>
            <div class="col-md-8">
                @include('patients.cytologies.list-right-edit')
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
