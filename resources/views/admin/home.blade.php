@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        {{__('msg_layouts_app.home.dashboard')}}
                    </div>
                    <div class="card-body">
                        {{__('msg_layouts_app.admin.main.message')}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection