<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-12 lead">
                {{__('examinations.findings.label')}} - {{ $examination->date->format('d.m.Y') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-3 ml-auto">
                {!! Form::model($examination, ['method'=>'delete', 'action'=>['ExaminationsController@destroy', $patient, $examination], 'onsubmit' => 'return ConfirmDelete()']) !!}
                {!! Form::button('<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-delete col-md-12']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-3 ml-auto">
                {!! Form::open(['method'=>'get', 'action'=>['ExaminationsController@show', $patient, $examination]]) !!}
                {!! Form::button('<i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-outline-cool col-md-12']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($examination, ['method'=>'patch', 'action'=>['ExaminationsController@update', $patient, $examination]]) !!}
                <div class="col-md-12 font-weight-bold">{!! Form::label('date', __('examinations.date.label'). ' :') !!}</div>
                <div class="col-md-12">{!! Form::text('date', $examination->date ? $examination->date->format('d.m.Y') : '' , ['class'=>'form-control', 'autofocus', 'onfocus'=>'this.select();']) !!}</div>
                <div class="mt-3 col-md-12 font-weight-bold">{!! Form::label('findings', __('examinations.findings.label').' :') !!}</div>
                <div class="col-md-12">{!! Form::textarea('findings', null, ['class'=> 'form-control', 'rows'=>'6']) !!}</div>
                <div class="mt-3 col-md-12 font-weight-bold">{!! Form::label('instructions', __('examinations.instructions.label') . ' :') !!}</div>
                <div class="col-md-12">{!! Form::textarea('instructions', null, ['class'=>'form-control', 'rows'=>'4']) !!}</div>
                <hr>
                <div class="mt-3 col-md-3 ml-auto">
                    {!! Form::button('<i class="fa fa-check fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

</div>

</div>
