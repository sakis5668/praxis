<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-12 lead">
                {{__('examinations.new.findings.label')}} - {{ \Carbon\Carbon::now()->format('d.m.Y') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-auto">
                {!! Form::open(['method'=>'get', 'action'=>['ExaminationsController@index', $patient]]) !!}
                {!! Form::button('<i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-outline-cool']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['method'=>'post', 'action'=>['ExaminationsController@store', $patient]]) !!}
                <div class="col-md-12 font-weight-bold">{{__('examinations.date.label')}} :</div>
                <div class="col-md-6">{!! Form::text('date', \Carbon\Carbon::now()->format('d.m.Y'), ['class'=>'form-control', 'autofocus', 'onfocus'=>'this.select();']) !!}</div>
                <div class="mt-3 col-md-12 font-weight-bold">{{__('examinations.findings.label')}} :</div>
                <div class="col-md-12">{!! Form::textarea('findings', null, ['class'=> 'form-control', 'rows'=>'6']) !!}</div>
                <div class="mt-3 col-md-12 font-weight-bold">{{__('examinations.instructions.label')}} :</div>
                <div class="col-md-12">{!! Form::textarea('instructions', null, ['class'=>'form-control', 'rows'=>'4']) !!}</div>
                <hr>
                <div class="mt-3 col-md-3 ml-auto">
                    {!! Form::button('<i class="fa fa-check fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
