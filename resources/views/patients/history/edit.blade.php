@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">

        <div class="row my-3">
            <div class="col-md-12">
                @include('patients.actions-top')
            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header lead font-weight-bold">
                        <div class="row">
                            <div class="col-md-8">
                                {{ $history->patient->last_name . ', ' . $history->patient->first_name . ' - ' . __('history.medical.history.label')}}
                            </div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method' => 'delete', 'action' => ['HistoriesController@destroy', $patient, $history], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>', ['type'=>'submit', 'class'=>'btn btn-delete col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method' => 'get', 'action' => ['HistoriesController@show', $patient, $history]]) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

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

                </div>

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
