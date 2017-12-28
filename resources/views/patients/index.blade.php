@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">

                {{-- CREATE A CARD--}}
                <div class="card">

                    {{-- THE HEADER CONTAINS THE SEARCH FIELD --}}
                    <div class="card-header">
                        <div class="row mt-3">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <form method="get" action="{{ route('patients.index') }}" role="search">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-outline-cool">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                             </span>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-3 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>'PatientsController@create']) !!}
                                {!! Form::button('<i class="fa fa-plus fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>

                    {{-- THE BODY CONTAINS THE RESULTS TABLE--}}
                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th>{{__('patients.Last Name') }}</th>
                                    <th>{{__('patients.First Name')}}</th>
                                    <th>{{__('patients.E-Mail')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($patients as $patient)
                                    <tr onclick="window.location='{{route('patients.show', $patient)}}'">
                                        <td>
                                            {{ $patient->last_name }}
                                        </td>
                                        <td>
                                            {{ $patient->first_name }}
                                        </td>
                                        <td>
                                            {{ $patient->email }}
                                        </td>
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
        {{ $patients->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
    </div>

@endsection
