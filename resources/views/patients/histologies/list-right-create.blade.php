<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-12">
                {{__('histology.new.histology.label')}}
            </div>
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