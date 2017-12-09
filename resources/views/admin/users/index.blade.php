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
                                <form method="get" action="{{ route('users.index') }}" role="search">
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
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{__('admin-users.user.id.label')}}</th>
                                    <th scope="col">{{__('admin-users.user.name.label')}}</th>
                                    <th scope="col">{{__('admin-users.user.email.label')}}</th>
                                    <th scope="col">{{__('admin-users.user.role.label')}}</th>
                                    <th scope="col">{{__('admin-users.user.language.label')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->name }}</td>
                                        <td>{{ $user->language->description }}</td>
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
        {{ $users->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
    </div>

@endsection