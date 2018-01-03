@extends('layouts.app')

@section('content')

    <div class="container">

        <!-- Start Row -->
        <div class="row mt-3">

            <!-- Start Column -->
            <div class="col-md-12">

                <!-- Start Card -->
                <div class="card">

                    <!-- Start Card Header -->
                    <div class="card-header">

                        <!-- Start Row -->
                        <div class="row mt-3">

                            <!-- Start Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <form method="get" action="{{ route('patients.index') }}" role="search">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-cool" type="submit">
                                                    <i class="fa fa-search fa-lg"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Column -->

                            <!-- Start Column -->
                            <div class="col-md-3 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>'PatientsController@create']) !!}
                                {!! Form::button('<i class="fa fa-plus fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-md-12']) !!}
                                {!! Form::close() !!}
                            </div>
                            <!-- End Column -->

                        </div>
                        <!-- End Row -->

                    </div>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <div class="card-body">

                        <!-- Table -->
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
                        <!-- End Table -->

                    </div>
                    <!-- End Card Body -->

                </div>
                <!-- End Card -->

            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

    </div>

    <!-- Pagination -->
    <div class="container mt-3">
        {{ $patients->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
    </div>
    <!-- End Pagination -->

@endsection
