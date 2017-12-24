<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-md-8">
                {{__('cytology.cytology.label')}}
                ( {{$cytology->date ? $cytology->date->format('d.m.Y') : __('cytology.no.date.label')}} )
            </div>

            <div class="col-md-4">
                {!! Form::model($cytology,['method'=>'patch', 'action'=>['CytologiesController@update', $patient, $cytology]]) !!}
                {!! Form::text('date', $cytology->date ? $cytology->date->format('d.m.Y') : null, ['class' => 'form-control col-md-12', 'autofocus', 'onfocus'=>'this.select();']) !!}
                {!! Form::button('<i class="fa fa-check fa-lg" aria-hidden="true"></i>', ['type'=>'submit', 'class'=> 'btn btn-primary col-md-12 mt-1']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row mx-2">
            <div class="col-md-12">
                <div class='embed-responsive' style='padding-bottom:150%'>
                    <object
                            data='{{url('/') . $patient->getShortPatientPath() . '/cytologies/' . $cytology->filename}}'
                            width='100%' height='100%'>
                    </object>
                </div>
            </div>
        </div>
    </div>

</div>