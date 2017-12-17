<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-8">
                {{__('examinations.findings.label')}} - {{ $examination->date->format('d.m.Y') }}
            </div>
            <div class="col-md-2">
                {!! Form::open(['method'=>'get', 'action'=>['ExaminationsPDFController@pdfExamination', $patient, $examination]]) !!}
                {!! Form::button('<i class="fa fa-file-pdf-o fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-light']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-2 ml-auto">
                {!! Form::model($examination, ['method'=>'get', 'action'=>['ExaminationsController@edit', $patient, $examination]]) !!}
                {!! Form::button('<i class="fa fa-pencil fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-light col-md-12']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 text-right font-weight-bold">{{__('examinations.findings.label')}} :</div>
                <div class="col-md-9">{!! nl2br(e($examination->findings)) !!}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3 text-right font-weight-bold">{{__('examinations.instructions.label')}} :</div>
                <div class="col-md-9">{!! nl2br(e($examination->instructions)) !!}</div>
            </div>
        </div>

    </div>

</div>
