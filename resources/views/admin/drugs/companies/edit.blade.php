@extends('layouts.admin')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">

                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 lead">
                                {{__('drug-companies.Edit Company Data')}}
                            </div>
                            <div class="col-md-2 ml-md-auto">
                                {!! Form::open(['method'=>'delete', 'action'=>['AdminDrugCompaniesController@destroy', $drugCompany], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                {!! Form::button('<i class="fa fa-trash-o fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-delete col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-2 ml-md-auto">
                                {!! Form::open(['method'=>'get', 'action'=>'AdminDrugCompaniesController@index']) !!}
                                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-light col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="col-md-12">
                            {!! Form::model($drugCompany, ['method'=>'patch', 'action'=>['AdminDrugCompaniesController@update', $drugCompany], 'files'=> true]) !!}

                            <div class="row mt-2">
                                {!! Form::label('name', __('drug-companies.Name') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('name', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('subtitle', __('drug-companies.Subtitle') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('subtitle', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <hr>
                            <div class="row mt-2">
                                {!! Form::label('street', __('drug-companies.Street') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('street', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('postal', __('drug-companies.Postal') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('postal', null, ['class'=>'form-control col-md-2']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('city', __('drug-companies.City') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('city', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <hr>
                            <div class="row mt-2">
                                {!! Form::label('phone', __('drug-companies.Phone') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('phone', null, ['class'=>'form-control col-md-4']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('fax', __('drug-companies.Fax') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('fax', null, ['class'=>'form-control col-md-4']) !!}
                            </div>
                            <hr>
                            <div class="row mt-2">
                                {!! Form::label('email', __('drug-companies.E-Mail') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('email', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <div class="row mt-2">
                                {!! Form::label('website', __('drug-companies.Homepage') . ' :', ['class'=>'col-md-3 font-weight-bold text-right']) !!}
                                {!! Form::text('website', null, ['class'=>'form-control col-md-9']) !!}
                            </div>
                            <hr>
                            <div class="row mt-2">
                                {!! Form::button('<i class="fa fa-check fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-primary form-control col-md-2 ml-auto']) !!}
                            </div>
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
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection
