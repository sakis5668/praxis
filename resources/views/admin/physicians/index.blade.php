@extends('layouts.admin')

@section('content')

    @include('layouts.language')

    <div class="container">

        <div class="row mt-3">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">

                        <div class="row">

                            <div class="col-md-6">
                                <form method="get" action="{{ route('physicians.index') }}" role="search">
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

                            <div class="col-md-3 ml-auto">
                                {!! Form::open(['method'=>'get', 'action'=>'PhysicianController@create']) !!}
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
                                    <th scope="col">{{__('physicians.Name')}}</th>
                                    <th scope="col">{{__('physicians.Specialty')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($physicians as $physician)
                                    <tr>
                                        <td>
                                            <a href="{{ route('physicians.show', $physician) }}">{{ $physician->name }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('physicians.show', $physician) }}">{{ $physician->specialty }}</a>
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

@endsection