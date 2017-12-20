<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        {{__('laboratory.laboratory.label')}}
                        ( {{$laboratoryExamination->date ? $laboratoryExamination->date->format('d.m.Y') : __('laboratory.no.date.label')}} )
                    </div>
                    <div class="col-md-4">
                        {!! Form::model($laboratoryExamination,['method'=>'patch', 'action'=>['LaboratoryExaminationsController@update', $patient, $laboratoryExamination]]) !!}
                        <div class="row">
                            {!! Form::text('date', $laboratoryExamination->date ? $laboratoryExamination->date->format('d.m.Y') : null, ['class' => 'form-control col-md-6 px-1 ml-auto', 'autofocus', 'onfocus'=>'this.select();']) !!}
                            {!! Form::button('<i class="fa fa-check fa-lg" aria-hidden="true"></i>', ['type'=>'submit', 'class'=> 'btn btn-primary col-md-4 ml-auto']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row mx-2">
            <div class="col-md-12">
                <iframe src="{{url('/') . $patient->getShortPatientPath() . '/laboratory_examinations/' . $laboratoryExamination->filename}}"
                        name="laboratoryFrame" width="100%" height="600px" frameborder="0"></iframe>
            </div>
        </div>
    </div>

</div>