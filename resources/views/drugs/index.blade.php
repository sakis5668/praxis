@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <form method="get" action="{{ route('user.drugs.index') }}" role="search">
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
                            <div class="col-md-8 lead text-right">
                                {{__('drug-companies.Products')}}
                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{__('drug-companies.Product')}}</th>
                                    <th scope="col">{{__('drug-companies.Content')}}</th>
                                    <th scope="col">{{__('drug-companies.Company')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($drugs as $drug)
                                    <tr onclick="window.location='{{ route('user.drugs.show', $drug) }}'">
                                        <td>{{ $drug->name }}</td>
                                        <td>{{ $drug->content }}</td>
                                        @if($drug->drugCompany)
                                            <td>
                                                {{ $drug->drugCompany->name }}
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
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
        {{ $drugs->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
    </div>

@endsection