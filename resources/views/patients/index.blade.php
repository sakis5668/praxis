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
                        <div class="row">
                            <div class="col-md-4  my-1">
                                <div class="form-group">
                                    <form method="get" action="{{ route('patients.index') }}" role="search">
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
                            </div>
                            <div class="col-md-6  my-1 ml-auto">
                                @if(Session::has('patient_deleted'))
                                    <p class="btn-delete font-weight-bold">{{ session('patient_deleted') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- THE BODY CONTAINS THE RESULTS TABLE--}}
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    {{--<th scope="col">{{__('patients-index-view.id')}}</th>--}}
                                    <th scope="col">{{__('patients-index-view.last.name') }}</th>
                                    <th scope="col">{{__('patients-index-view.first.name')}}</th>
                                    <th scope="col">{{__('patients-index-view.email')}}</th>
                                    <th scope="col">{{__('patients-index-view.mobile.number')}}</th>
                                    <th scope="col">{{__('patients-index-view.phone.number')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($patients as $patient)
                                    <tr>
                                        {{--<th scope="row">{{ $patient->id }}</th>--}}
                                        <td>
                                            <a href="{{ route('patients.show', $patient->id) }}">{{ $patient->last_name }}</a>
                                        </td>
                                        <td>{{ $patient->first_name }}</td>
                                        <td>{{ $patient->email }}</td>
                                        <td>{{ $patient->mobile_number }}</td>
                                        <td>{{ $patient->phone_number }}</td>
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