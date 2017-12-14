<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-10">
                {{__('examinations.findings.label')}} - {{ $examination->date->format('d.m.Y') }}
            </div>
            <div class="col-md-2 ml-auto">
                {!! Form::model($examination, ['method'=>'get', 'action'=>['ExaminationsController@edit', $patient, $examination]]) !!}
                {!! Form::button('<i class="fa fa-pencil fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-light col-md-12']) !!}
                {!! Form::close() !!}
            </div>
            {{--<div class="col-md-4 ml-auto">
                {!! Form::model($examination, ['method'=>'get', 'action'=>['ExaminationsController@edit', $patient, $examination]]) !!}
                <div class="row">
                    {!! Form::submit(__('examinations.edit.button'), ['class' => 'btn btn-light col-md-12']) !!}
                </div>
                {!! Form::close() !!}
            </div>--}}
        </div>
    </div>

    <div class="card-body">
        <div class="col-md-12">
            <div class="row">
                {!! nl2br(e($examination->findings)) !!}
            </div>
        </div>

    </div>

</div>
