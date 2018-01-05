<!-- Card -->
<div class="card">

    <!-- Card Header -->
    <div class="card-header">

        <!-- Start Row -->
        <div class="row">
            <div class="col-md-12 lead">
                {{__('examinations.findings.label')}} - {{ $examination->date->format('d.m.Y') }}
            </div>
        </div>
        <!-- End Row -->

        <!-- Start Row -->
        <div class="row justify-content-end">
            <div class="col-6 col-md-3 mt-1">
                {!! Form::model($examination, ['method'=>'delete', 'action'=>['ExaminationsController@destroy', $patient, $examination], 'id'=>'deleteForm']) !!}
                {!! Form::button('<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>', ['class' => 'form-control btn btn-delete col-md-12', 'id'=>'deleteButton']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-6 col-md-3 mt-1">
                {!! Form::open(['method'=>'get', 'action'=>['ExaminationsController@show', $patient, $examination]]) !!}
                {!! Form::button('<i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-outline-cool col-md-12']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <!-- End Row -->

    </div>
    <!-- End Card Header -->

    <!-- Card Body -->
    <div class="card-body">

        {!! Form::model($examination, ['method'=>'patch', 'action'=>['ExaminationsController@update', $patient, $examination]]) !!}
        <div class="row">
            <div class="col-md-12 font-weight-bold">{!! Form::label('date', __('examinations.date.label'). ' :') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::text('date', $examination->date ? $examination->date->format('d.m.Y') : '' , ['class'=>'form-control', 'autofocus', 'onfocus'=>'this.select();']) !!}</div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-12 font-weight-bold">{!! Form::label('findings', __('examinations.findings.label').' :') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::textarea('findings', null, ['class'=> 'form-control', 'rows'=>'6', 'onkeydown'=>'processKey(this,event)']) !!}</div>
        </div>
        <div class="row">
            <div class="mt-3 col-md-12 font-weight-bold">{!! Form::label('instructions', __('examinations.instructions.label') . ' :') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::textarea('instructions', null, ['class'=>'form-control', 'rows'=>'4', 'onkeydown'=>'processKey(this,event)']) !!}</div>
        </div>
        <hr>
        <div class="row">
            <div class="mt-3 col-md-3 ml-auto">
                {!! Form::button('<i class="fa fa-check fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}

    </div>
    <!-- End Card Body -->

</div>
<!-- End Card -->
