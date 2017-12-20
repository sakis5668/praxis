<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        {{__('cytology.cytology.label')}}
                        ( {{$cytology->date ? $cytology->date->format('d.m.Y') : __('cytology.no.date.label')}} )
                    </div>
                    <div class="col-md-4">
                        {!! Form::model($cytology,['method'=>'patch', 'action'=>['CytologiesController@update', $patient, $cytology]]) !!}
                        <div class="row">
                            {!! Form::text('date', $cytology->date ? $cytology->date->format('d.m.Y') : null, ['class' => 'form-control col-md-6 px-1 ml-auto']) !!}
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
                <iframe src="{{url('/') . $patient->getShortPatientPath() . '/cytologies/' . $cytology->filename}}"
                        name="cytologyFrame" width="100%" height="600px" frameborder="0"></iframe>
            </div>
        </div>
    </div>

</div>