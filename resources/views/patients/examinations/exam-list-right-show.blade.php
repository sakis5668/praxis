<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-md-12 lead">
                {{__('examinations.findings.label')}} - {{ $examination->date->format('d.m.Y') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-3 ml-auto">
                {!! Form::open(['method'=>'get', 'action'=>['ExaminationsPDFController@pdfExamination', $patient, $examination]]) !!}
                {!! Form::button('<i class="fa fa-file-pdf-o fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-3 ml-auto">
                {!! Form::model($examination, ['method'=>'get', 'action'=>['ExaminationsController@edit', $patient, $examination]]) !!}
                {!! Form::button('<i class="fa fa-pencil fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-outline-cool col-md-12']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="col-md-12">
                <div class="col-md-12 font-weight-bold">{{__('examinations.findings.label')}} :</div>
                <div class="col-md-12">{!! nl2br(e($examination->findings)) !!}</div>
            <hr>
                <div class="col-md-12 font-weight-bold">{{__('examinations.instructions.label')}} :</div>
                <div class="col-md-12">{!! nl2br(e($examination->instructions)) !!}</div>
        </div>
    </div>

</div>
