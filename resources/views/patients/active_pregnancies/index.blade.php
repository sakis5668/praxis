@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4  my-1">
                                <div class="form-group">
                                    <form method="get" action="{{ route('pregnancies') }}" role="search">
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
                            <div class="col-md-6 mt-2">
                                <p class="lead font-weight-bold text-center">Active Pregnancies</p>
                            </div>
                        </div>
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
                                @if($pregnancy->patient)
                                <tr>
                                    <td><a href="{{ route ('pregnancies.show', [$pregnancy->patient, $pregnancy]) }}">{{ $pregnancy->patient->last_name }}</a></td>
                                    <td><a href="{{ route ('pregnancies.show', [$pregnancy->patient, $pregnancy]) }}">{{ $pregnancy->patient->first_name }}</a></td>
                                    <td><a href="{{ route ('pregnancies.show', [$pregnancy->patient, $pregnancy]) }}">{{ $pregnancy->lmp ? $pregnancy->lmp->format('d.m.Y') : 'no date' }}</a></td>
                                    <td><a href="{{ route ('pregnancies.show', [$pregnancy->patient, $pregnancy]) }}">{{ $pregnancy->edd ? $pregnancy->edd->format('d.m.Y') : 'no date' }}</a></td>
                                    <td><a href="{{ route ('pregnancies.show', [$pregnancy->patient, $pregnancy]) }}">{{ $pregnancy->corrected_edd ? $pregnancy->corrected_edd->format('d.m.Y') : 'no date' }}</a></td>
                                </tr>
                                @endif
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