@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 lead">
                                {{__('drug-companies.Edit Drug Data')}}
                            </div>
                            <div class="col-md-3">
                                {!! Form::open(['method'=>'delete', 'action'=>['AdminDrugsController@destroy', $drug], 'id' => 'deleteForm']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg"></i>', ['id'=>'deleteButton', 'class'=>'btn btn-delete col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::open(['method'=>'get', 'action'=>'AdminDrugsController@index']) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            {!! Form::model($drug, ['method'=>'patch', 'action'=>['AdminDrugsController@update', $drug]]) !!}
                            <div class="row mt-2">
                                {!! Form::label('name', __('drug-companies.Name') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('name', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('drug_company_id', __('drug-companies.Company') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::select('drug_company_id', $companies, $drug->drug_company_id,['class'=>'form-control col-md-9']) !!}
                            </div>
                            <hr>
                            <div class="row mt-2">
                                {!! Form::label('information', __('drug-companies.Information') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::textarea('information', null, ['class'=>'form-control col-md-9', 'rows' => 5]) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('content', __('drug-companies.Content') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('content', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('dosage', __('drug-companies.Dosage') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('dosage', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-md-3 ml-auto">
                                    {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-primary form-control']) !!}
                                </div></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
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
