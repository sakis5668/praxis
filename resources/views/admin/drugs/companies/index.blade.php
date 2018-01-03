@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <form method="get" action="{{ route('drugCompanies.index') }}" role="search">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-cool">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 lead font-weight-bold text-center">
                                {{__('drug-companies.Companies')}}
                            </div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>'AdminDrugCompaniesController@create']) !!}
                                {!! Form::button('<i class="fa fa-plus fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{__('drug-companies.Company')}}</th>
                                    <th scope="col">{{__('drug-companies.City')}}</th>
                                    <th scope="col">{{__('drug-companies.Phone')}}</th>
                                    <th scope="col">{{__('drug-companies.Fax')}}</th>
                                    <th scope="col">{{__('drug-companies.Homepage')}}</t h>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($drugCompanies as $drugCompany)
                                    <tr onclick="window.location='{{ route('drugCompanies.show', $drugCompany) }}'">
                                        <td>{{ $drugCompany->name }}</td>
                                        <td>{{ $drugCompany->city }}</td>
                                        <td>{{ $drugCompany->phone }}</td>
                                        <td>{{ $drugCompany->fax }}</td>
                                        <td>{{ $drugCompany->website }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    {{-- PAGINATION --}}
    <div class="container mt-3">
        {{ $drugCompanies->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
    </div>


@endsection