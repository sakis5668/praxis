@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 offset-md-4">

                <div class="card">

                    <div class="card-header lead text-center">
                        Calculate Pregnacy Age
                    </div>

                    <div class="card-body">
                        {!! Form::open(['method'=>'post', 'action'=>'SSWCalculatorController@calculateResult']) !!}
                        <div class="row my-2 mx-1">
                            {!! Form::label('lp', 'LP :', ['class'=>'col-md-4']) !!}
                            {!! Form::text('lp', null, ['class'=>'form-control col-md-8 ml-auto']) !!}
                        </div>
                        <div class="row my-2 mx-1">
                            {!! Form::label('et', 'ET :', ['class'=> 'col-md-4']) !!}
                            {!! Form::text('et', null, ['class'=>'form-control col-md-8 ml-auto']) !!}
                        </div>
                        <hr>
                        <div class="row my-2 mx-1">
                            {!! Form::button('<i class="fa fa-calculator fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-primary col-md-4 ml-auto']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.4/moment.min.js"></script>

@endsection