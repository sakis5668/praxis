<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-8">
                {{__('histology.histology.label')}}
                ( {{$histology->date ? $histology->date->format('d.m.Y') : __('histology.no.date.label')}} )
            </div>

            <div class="col-md-4">
                {!! Form::model($histology,['method'=>'patch', 'action'=>['HistologiesController@update', $patient, $histology]]) !!}
                {!! Form::text('date', $histology->date ? $histology->date->format('d.m.Y') : null, ['class' => 'form-control col-md-12', 'autofocus', 'onfocus'=>'this.select();']) !!}
                {!! Form::button('<i class="fa fa-check fa-lg" aria-hidden="true"></i>', ['type'=>'submit', 'class'=> 'btn btn-primary col-md-12 mt-1']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row mx-2">
            <div class="col-md-12">
                <div class='embed-responsive' style='padding-bottom:150%'>
                    <object data="https://docs.google.com/viewer?url={{url('/') . $patient->getShortPatientPath() . '/histologies/' . $histology->filename}}&embedded=true"
                            width="100%" height="100%"
                            type="">
                    </object>
                </div>
            </div>
        </div>
    </div>

</div>