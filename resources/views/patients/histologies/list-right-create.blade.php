<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center">
                {{__('histology.new.histology.label')}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                {!! Form::open(['method' => 'get', 'action' => ['HistologiesController@index', $patient]]) !!}
                {!! Form::button('<i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-outline-cool']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <div class="card-body">
        <div class="row mx-2">
            <div class="col-md-12">
                {!! Form::open(['method'=> 'post', 'action'=>['HistologiesController@store', $patient], 'class' => 'dropzone', 'id'=>'mydropzone']) !!}
                {!! Form::text('date', \Carbon\Carbon::now()->format('d.m.Y'), ['class' => 'form-control']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>