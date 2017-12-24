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

                    <div class="card-header lead">
                        <div class="row">
                            <div class="col-md-8">{{__('surgery.Edit Surgery Data')}}</div>
                            <div class="col-md-2">
                                {!! Form::model($surgery, ['method'=>'delete', 'action'=>['SurgeriesController@destroy', $patient, $surgery], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg"></i>', ['type'=>'submit', 'class'=> 'btn btn-delete col-md-12 ml-auto']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-2">
                                {!! Form::open(['method'=>'get', 'action'=>['SurgeriesController@show', $patient, $surgery]]) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=> 'btn btn-outline-cool col-md-12 ml-auto']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::model($surgery,['method'=>'patch', 'action'=>['SurgeriesController@update', $patient, $surgery]]) !!}
                                <div class="row mt-2">
                                    <div class="col">
                                        {!! Form::label('date', __('surgery.Date') . ' :', ['class'=>'font-weight-bold']) !!}
                                        {!! Form::text('date',$surgery->date ? $surgery->date->format('d.m.Y') : null, ['class'=>'form-control', 'autofocus', 'onfocus'=>'this.select();']) !!}
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        {!! Form::label('diagnosis', __('surgery.Diagnosis') . ' :', ['class'=>'font-weight-bold']) !!}
                                        {!! Form::text('diagnosis', null, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col">
                                        {!! Form::label('therapy', __('surgery.Therapy') . ' :', ['class'=>'font-weight-bold']) !!}
                                        {!! Form::text('therapy', null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col">
                                        {!! Form::label('surgeon', __('surgery.Surgeon') . ' :', ['class'=>'font-weight-bold']) !!}
                                        {!! Form::text('surgeon', null, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col">
                                        {!! Form::label('assistant', __('surgery.Assistant') . ' :', ['class'=>'font-weight-bold']) !!}
                                        {!! Form::text('assistant', null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        {!! Form::label('anesthesia', __('surgery.Anesthesia') . ' :', ['class'=>'font-weight-bold']) !!}
                                        {!! Form::text('anesthesia', null, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col">
                                        {!! Form::label('anesthesist', __('surgery.Anesthesist') . ' :', ['class'=>'font-weight-bold']) !!}
                                        {!! Form::text('anesthesist', null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        {!! Form::label('text', __('surgery.Text') . ' :', ['class'=>'font-weight-bold']) !!}
                                        {!! Form::textarea('text', null, ['class'=>'form-control', 'rows'=>5]) !!}
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-md-3 ml-auto">
                                        {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=> 'btn btn-primary form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

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
