<div class="card">

<div class="card-header">
    <div class="row">
        <div class="col-md-12 lead">
            {{__('examinations.examinations')}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['method'=>'get', 'action'=>['ExaminationsPDFController@pdfOverview', $patient]]) !!}
            {!! Form::button('<i class="fa fa-file-pdf-o fa"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-md-6">
            {!! Form::open(['method' => 'get', 'action' => ['ExaminationsController@create', $patient]]) !!}
            {!! Form::button('<i class="fa fa-plus fa" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-outline-cool']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="card-body">

    <div class="col-md-12">
        <div class="row">

            <div class="table-responsive">

            <table class="table">
                {{--<thead class="thead-light">
                <tr>
                    <th scope="col">{{__('examinations.date.label')}}</th>
                </tr>
                </thead>--}}
                <thead>
                <tr>

                </tr>
                </thead>
                <tbody>
                @foreach($patient->examinationsOrderByDateDesc as $examination)
                    <tr>
                        <td>
                            <a href="{{ route('examinations.show', [$patient, $examination])  }}">{{ $examination->date ? $examination->date->format('d.m.Y') : __('examinations.no.date.label') }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            </div>

        </div>
    </div>

</div>

</div>
