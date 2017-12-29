@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row mt-3">

            <div class="col-md-10 offset-md-1">

                <div class="card">

                    <div class="card-header">

                        <div class="row">

                            <div class="col-6 lead">
                                {{__('physicians.Edit Physician')}}
                            </div>

                            <div class="col-3">
                                {!! Form::open(['method' => 'delete', 'action' => ['PhysicianController@destroy', $physician], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-delete col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>

                            <div class="col-3">
                                {!! Form::open(['method'=>'get', 'action'=>['PhysicianController@show', $physician]]) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                                {!! Form::close() !!}
                            </div>

                        </div>

                    </div>

                    <div class="card-body">

                        {!! Form::model($physician, ['method'=>'patch', 'action'=>['PhysicianController@update', $physician]]) !!}

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('name', __('physicians.Name') . ' :') !!}</div>
                            <div class="col-md-8">{!! Form::text('name', null, ['class'=>'form-control', 'autofocus']) !!}</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('specialty', __('physicians.Specialty') . ' :') !!}</div>
                            <div class="col-md-8">{!! Form::text('specialty', null, ['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('information', __('physicians.Information') . ' :') !!}</div>
                            <div class="col-md-8">{!! Form::text('information', null, ['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('address', __('physicians.Address') . ' :') !!}</div>
                            <div class="col-md-8">{!! Form::text('address', null, ['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('postal', __('physicians.Postal') . ' :') !!}</div>
                            <div class="col-md-4">{!! Form::text('postal', null, ['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 font-weight-bold">{!! Form::label('city', __('physicians.City') . ' :') !!}</div>
                            <div class="col-md-8">{!! Form::text('city', null, ['class'=>'form-control']) !!}</div>
                        </div>

                        <hr>

                        <div class="row mt-2 justify-content-end">
                            <div class="col-md-3">{!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-primary']) !!}</div>
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
