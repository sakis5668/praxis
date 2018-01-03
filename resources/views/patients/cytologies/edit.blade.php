@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row my-3">
            <div class="col-md-12">
                @include('patients.actions-top')
            </div>
        </div>

        <div class="row  my-3">
            <div class="col-md-4">
                @include('patients.cytologies.list-left')
            </div>
            <div class="col-md-8">
                @include('patients.cytologies.list-right-edit')
            </div>
        </div>

    </div>

@endsection

@section('styles')
    {{--<link rel="stylesheet" href="{{ asset('css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themes/default.css') }}">--}}
@endsection

@section('scripts')
{{--    <script src="{{asset('js/alertify.min.js')}}"></script>--}}
    <script>
        $('#deleteButton').on('click', function () {
            alertify.confirm(
                '{{__('msg_layouts_app.Confirmation')}}',
                '{{__('msg_layouts_app.confirmMsg')}}',
                function (e) {
                    if (e) {
                        $('#deleteForm').submit();
                    }
                },
                function () {
                    alertify.error('{{__('msg_layouts_app.Cancel')}}');
                });
        });
    </script>

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
