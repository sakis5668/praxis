<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-12">
               {{__('cytology.new.cytology.label')}}
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row mx-2">
            <div class="col-md-12">
                {!! Form::open(['method'=> 'post', 'action'=>['CytologiesController@store', $patient], 'class' => 'dropzone', 'id'=>'mydropzone']) !!}
                {!! Form::text('date', \Carbon\Carbon::now()->format('d.m.Y'), ['class' => 'form-control']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>