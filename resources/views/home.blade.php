@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">{{__('msg_layouts_app.home.dashboard')}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{__('msg_layouts_app.home.login.message')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
