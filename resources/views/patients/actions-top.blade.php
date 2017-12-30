<!-- Card -->
<div class="card">

    <!-- Card Header -->
    <div class="card-header">

        <!-- Start Row -->
        <div class="row">

            <!-- Start Column -->
            <div class="col-md-6 lead">
                {{  $patient->last_name . ' ' . $patient->first_name}}
            </div>
            <!-- End Column -->

            <!-- Start Column -->
            <div class="col-md-3 mt-1">
                {!! Form::open(['method'=>'get', 'action'=>'PatientsController@index']) !!}
                {!! Form::button('<i class="fa fa-home fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-md-12']) !!}
                {!! Form::close() !!}
            </div>
            <!-- End Column -->

            <!-- Start Column -->
            <div class="col-md-3 mt-1">
                {!! Form::open(['method'=>'get', 'action'=>['PatientsController@show', $patient]]) !!}
                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-md-12']) !!}
                {!! Form::close() !!}
            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

    </div>
    <!-- End Card Header -->

    <!-- Card Body -->
    <div class="card-body">

        <!-- Start Row -->
        <div class="row">

            <!-- Start Column -->
            <div class="col-md-3 mt-1">
                {!! Form::open(['method'=>'get', 'action'=>['HistoriesController@show',$patient, $patient->history]]) !!}
                {!! Form::button(__('patients.Medical History'), ['type'=>'submit', 'class'=>'form-control btn btn-cool']) !!}
                {!! Form::close() !!}
            </div>
            <!-- End Column -->

            <!-- Start Column -->
            <div class="col-md-3 mt-1">
                {!! Form::open(['method'=>'get', 'action'=>['ExaminationsController@index', $patient]]) !!}
                {!! Form::button(__('patients.Examinations'), ['type'=>'submit', 'class'=>'form-control btn btn-cool']) !!}
                {!! Form::close() !!}
            </div>
            <!-- End Column -->

            <!-- Start Column -->
            <div class="col-md-3 mt-1">
                {!! Form::open(['method'=>'get', 'action'=>['PregnanciesController@index', $patient]]) !!}
                {!! Form::button(__('patients.Pregnancies'), ['type'=>'submit', 'class'=>'form-control btn btn-cool']) !!}
                {!! Form::close() !!}
            </div>
            <!-- End Column -->

            <!-- Start Column -->
            <div class="col-md-3 mt-1">
                {!! Form::open(['method'=>'get', 'action'=>['SurgeriesController@index', $patient]]) !!}
                {!! Form::button(__('patients.Surgery'),['type'=>'submit', 'class'=>'form-control btn btn-cool']) !!}
                {!! Form::close() !!}
            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

        <!-- Start Row -->
        <div class="row">

            <!-- Start Column -->
            <div class="col-md-3 mt-1">
                {!! Form::open(['method'=>'get', 'action' => ['CytologiesController@index', $patient]]) !!}
                {!! Form::button(__('patients.Cytologies'), ['type'=>'submit', 'class'=>'form-control btn btn-cool']) !!}
                {!! Form::close() !!}
            </div>
            <!-- End Column -->

            <!-- Start Column -->
            <div class="col-md-3 mt-1">
                {!! Form::open(['method'=>'get', 'action' => ['HistologiesController@index', $patient]]) !!}
                {!! Form::button(__('patients.Histologies'), ['type'=>'submit', 'class'=>'form-control btn btn-cool']) !!}
                {!! Form::close() !!}
            </div>
            <!-- End Column -->

            <!-- Start Column -->
            <div class="col-md-3 mt-1">
                {!! Form::open(['method'=>'get', 'action' => ['LaboratoryExaminationsController@index', $patient]]) !!}
                {!! Form::button(__('patients.Laboratory'), ['type'=>'submit', 'class'=>'form-control btn btn-cool']) !!}
                {!! Form::close() !!}
            </div>
            <!-- End Column -->

            <!-- Start Column -->
            <div class="col-md-3 mt-1">
                {!! Form::open(['method'=>'get', 'action' => ['ImagingResultsController@index', $patient]]) !!}
                {!! Form::button(__('patients.Imaging'), ['type'=>'submit', 'class'=>'form-control btn btn-cool']) !!}
                {!! Form::close() !!}
            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

    </div>
    <!-- End Card Body -->

</div>
<!-- End Card -->