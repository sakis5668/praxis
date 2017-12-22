@extends('layouts.admin')

@section('content')

    @include('layouts.language')

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
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-secondary">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>'AdminDrugCompaniesController@create']) !!}
                                {!! Form::button('<i class="fa fa-plus fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-light col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Company</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Fax</th>
                                    <th scope="col">Homepage</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($drugCompanies as $drugCompany)
                                    <tr>
                                        <td><a href="{{ route('drugCompanies.show', $drugCompany) }}">{{ $drugCompany->name }}</a></td>
                                        <td><a href="{{ route('drugCompanies.show', $drugCompany) }}">{{ $drugCompany->city }}</a></td>
                                        <td><a href="{{ route('drugCompanies.show', $drugCompany) }}">{{ $drugCompany->phone }}</a></td>
                                        <td><a href="{{ route('drugCompanies.show', $drugCompany) }}">{{ $drugCompany->fax }}</a></td>
                                        <td><a href="{{ route('drugCompanies.show', $drugCompany) }}">{{ $drugCompany->website }}</a></td>
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