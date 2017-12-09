<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-10">
                {{__('examinations.findings.label')}} - {{ $examination->date->format('d.m.Y') }}
            </div>
            <div class="col-md-2 ml-auto">
                {!! Form::model($examination, ['method'=>'delete', 'action'=>['ExaminationsController@destroy', $patient, $examination], 'onsubmit' => 'return ConfirmDelete()']) !!}
                {!! Form::button('<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-delete col-md-12']) !!}
                {!! Form::close() !!}
            </div>
            {{--<div class="col-md-4 ml-auto">
                {!! Form::model($examination, ['method'=>'delete', 'action'=>['ExaminationsController@destroy', $patient, $examination], 'onsubmit' => 'return ConfirmDelete()']) !!}
                <div class="row">
                    {!! Form::submit(__('examinations.delete.button'), ['class' => 'btn btn-delete col-md-12']) !!}
                </div>
                {!! Form::close() !!}
            </div>--}}
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($examination, ['method'=>'patch', 'action'=>['ExaminationsController@update', $patient, $examination], 'class' => 'col-md-12']) !!}
                <div class="row mt-3">
                    {!! Form::textarea('findings', null, ['class'=> 'form-control']) !!}
                </div>
                <div class="row mt-3 col-md-2 ml-auto">
                    {{--{!! Form::submit(__('examinations.save.button'), ['class' => 'btn btn-light mt-3 col-md-4 ml-auto']) !!}--}}
                    {!! Form::button('<i class="fa fa-check fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-light col-md-12']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

</div>
