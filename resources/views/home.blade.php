@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row mt-5">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header">{{__('msg_layouts_app.home.dashboard')}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p align="justify">{!! nl2br(e(__('hippocrates.oath-original'))) !!}</p>
                        <hr>
                            <p align="justify"><i>{!! nl2br(e(__('hippocrates.oath'))) !!}</i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
