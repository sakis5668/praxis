@extends('layouts.app')

@section('content')

    @include('layouts.language')

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
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-secondary">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 lead font-weight-bold text-center">
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
                                    <tr>
                                        <td><a href="{{ route('user.drugs.show', $drug) }}">{{ $drug->name }}</a></td>
                                        <td><a href="{{ route('user.drugs.show', $drug) }}">{{ $drug->content }}</a></td>
                                        @if($drug->drugCompany)
                                            <td>
                                                <a href="{{ route('user.drugs.show', $drug) }}">{{ $drug->drugCompany->name }}</a>
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