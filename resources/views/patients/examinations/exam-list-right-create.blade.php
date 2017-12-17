<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-8">
                 {{__('examinations.new.findings.label')}} - {{ \Carbon\Carbon::now()->format('d.m.Y') }}
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row mx-2">
            <div class="col-md-12">
                {!! Form::open(['method'=>'post', 'action'=>['ExaminationsController@store', $patient]]) !!}
                <div class="row mt-3">
                    <div class="col-md-3 text-right font-weight-bold">{{__('examinations.date.label')}} :</div>
                    <div class="col-md-3">{!! Form::text('date', \Carbon\Carbon::now()->format('d.m.Y'), ['class'=>'form-control']) !!}</div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 text-right font-weight-bold">{{__('examinations.findings.label')}} :</div>
                    <div class="col-md-9">{!! Form::textarea('findings', null, ['class'=> 'form-control', 'rows'=>'8']) !!}</div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 text-right font-weight-bold">{{__('examinations.instructions.label')}} :</div>
                    <div class="col-md-9">{!! Form::textarea('instructions', null, ['class'=>'form-control', 'rows'=>'4']) !!}</div>
                </div>
                <div class="row mt-3 col-md-2 ml-auto">
                    {!! Form::button('<i class="fa fa-check fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
