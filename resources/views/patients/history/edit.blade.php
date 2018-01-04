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
                    <div class="card-header">

                        <!-- Start Row -->
                        <div class="row">
                            <div class="col-md-8 lead">
                                {{ $history->patient->last_name . ', ' . $history->patient->first_name . ' - ' . __('history.medical.history.label')}}
                            </div>
                        </div>
                        <!-- End Row -->

                        <!-- Start Row -->
                        <div class="row justify-content-end">
                            <div class="col-6 col-md-3">
                                {!! Form::open(['method' => 'delete', 'action' => ['HistoriesController@destroy', $patient, $history], 'id' => 'deleteForm']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>', ['class'=>'btn btn-delete col-md-12', 'id'=> 'deleteButton']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-6 col-md-3">
                                {!! Form::open(['method' => 'get', 'action' => ['HistoriesController@show', $patient, $history]]) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- End Row -->

                    </div>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <div class="card-body">

                        {{ Form::model($history, ['method'=>'patch', 'action' => ['HistoriesController@update', $patient, $history]]) }}
                        <div class="row mt-3 mx-1">
                            {!! Form::textarea('history', null, ['class' => 'form-control col-md-12', 'rows' => 10, 'autofocus']) !!}
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="row mt-3">
                                {!! Form::button('<i class="fa fa-check fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-primary col-md-2 ml-auto']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}

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


@section('scripts')
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
                }).set({
                'labels': {ok: '{{__('msg_layouts_app.Ok')}}', cancel: '{{__('msg_layouts_app.Cancel')}}'}
            });
        });
    </script>
@endsection
