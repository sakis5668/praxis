@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <form method="get" action="{{ route('pregnancies') }}" role="search">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-outline-cool">
                                                    <i class="fa fa-search fa-lg"></i>
                                                </button>
                                             </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="lead text-right">{{__('active-pregnancies-index.active.pregnancies')}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{__('active-pregnancies-index.last.name')}}</th>
                                    <th scope="col">{{__('active-pregnancies-index.first.name')}}</th>
                                    <th scope="col">{{__('active-pregnancies-index.lmp')}}</th>
                                    <th scope="col">{{__('active-pregnancies-index.edd')}}</th>
                                    <th scope="col">{{__('active-pregnancies-index.edd_corr')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pregnancies as $pregnancy)
                                    @if($pregnancy->patient)
                                        {{--<tr onclick="window.location='{{ route('pregnancies.show', [$pregnancy->patient, $pregnancy]) }}'">--}}
                                        <tr onclick="window.location=' {{ route('pregnancy.history.show', [$pregnancy, $pregnancy->pregnancyHistory]) }}'">

                                        <td>
                                                {{ $pregnancy->patient->last_name }}
                                            </td>
                                            <td>
                                                {{ $pregnancy->patient->first_name }}
                                            </td>
                                            <td>
                                                {{ $pregnancy->lmp ? $pregnancy->lmp->format('d.m.Y') : __('active-pregnancies-index.no_date') }}
                                            </td>
                                            <td>
                                                {{ $pregnancy->edd ? $pregnancy->edd->format('d.m.Y') : __('active-pregnancies-index.no_date') }}
                                            </td>
                                            <td>
                                                {{ $pregnancy->corrected_edd ? $pregnancy->corrected_edd->format('d.m.Y') : __('active-pregnancies-index.no_date') }}
                                            </td>
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
    </div>


    {{-- PAGINATION --}}
    <div class="container mt-3">
        {{ $pregnancies->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
    </div>

@endsection