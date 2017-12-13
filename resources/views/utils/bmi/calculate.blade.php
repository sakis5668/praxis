@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 offset-md-4">

                <div class="card">

                    <div class="card-header lead text-center">
                        Calculate Body Mass Index
                    </div>

                    <div class="card-body">
                        {!! Form::open(['method'=>'get']) !!}
                        <div class="row my-2 mx-1">
                            {!! Form::label('height_label', 'Height [cm] :', ['class'=>'col-md-8']) !!}
                            {!! Form::text('height', null, ['class'=>'form-control col-md-4', 'id'=>'height']) !!}
                        </div>
                        <div class="row my-2 mx-1">
                            {!! Form::label('weight_label', 'Weight [kg] :', ['class'=>'col-md-8']) !!}
                            {!! Form::text('weight', null, ['class'=>'form-control col-md-4', 'id'=>'weight']) !!}
                        </div>
                        <hr>
                        <div class="row my-2 mx-1">
                            {!! Form::label('bmi_label', 'BMI :', ['class' => 'col-md-8']) !!}
                            {!! Form::text('bmi', null, ['class'=>'form-control col-md-4', 'id'=>'bmi']) !!}
                        </div>
                        <hr>
                        <div class="row my-2 mx-1">
                            {!! Form::button('<i class="fa fa-calculator fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-primary col-md-4 ml-auto', 'onclick'=>'return calculateBMI()']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>

                <div class="card">

                    <div class="card-header lead text-center">
                        Results
                    </div>

                    <div class="card-body">
                        <div class="row my-2 mx-1 text-right">
                            <div class="col-md-6">Underweight</div>
                            <div class="col-md-6"><=18.5</div>
                        </div>
                        <div class="row my-2 mx-1 text-right">
                            <div class="col-md-6">Normal Weight</div>
                            <div class="col-md-6">18.5 - 24.9</div>
                        </div>
                        <div class="row my-2 mx-1 text-right">
                            <div class="col-md-6">Overweight</div>
                            <div class="col-md-6">25.0 - 29.9</div>
                        </div>
                        <div class="row my-2 mx-1 text-right">
                            <div class="col-md-6">Obesity</div>
                            <div class="col-md-6">> 30.0</div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <script>
        function calculateBMI() {
            var height = document.getElementById('height').value;
            var weight = document.getElementById('weight').value;
            var h = height / 100;
            var h2 = h * h;
            var bmi = weight / h2;
            document.getElementById('bmi').value=bmi.toFixed(1);
        }
    </script>

@endsection