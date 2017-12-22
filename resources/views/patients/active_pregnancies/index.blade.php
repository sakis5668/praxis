@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        Active Pregnancies
                    </div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Last Name</th>
                                <th scope="col">First Name</th>
                                <th scope="col">LMP</th>
                                <th scope="col">EDD</th>
                                <th scope="col">EDD (corr.)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pregnancies as $pregnancy)
                                <tr>
                                    <td><a href="{{ route ('pregnancies.show', [$pregnancy->patient, $pregnancy]) }}">{{ $pregnancy->patient->last_name }}</a></td>
                                    <td><a href="{{ route ('pregnancies.show', [$pregnancy->patient, $pregnancy]) }}">{{ $pregnancy->patient->first_name }}</a></td>
                                    <td><a href="{{ route ('pregnancies.show', [$pregnancy->patient, $pregnancy]) }}">{{ $pregnancy->lmp ? $pregnancy->lmp->format('d.m.Y') : 'no date' }}</a></td>
                                    <td><a href="{{ route ('pregnancies.show', [$pregnancy->patient, $pregnancy]) }}">{{ $pregnancy->edd ? $pregnancy->edd->format('d.m.Y') : 'no date' }}</a></td>
                                    <td><a href="{{ route ('pregnancies.show', [$pregnancy->patient, $pregnancy]) }}">{{ $pregnancy->corrected_edd ? $pregnancy->corrected_edd->format('d.m.Y') : 'no date' }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>


    {{-- PAGINATION --}}
    <div class="container mt-3">
        {{ $pregnancies->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
    </div>

@endsection