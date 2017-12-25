<div class="card">

    <div class="card-header">
        <div class="row my-1">
            <div class="col-md-6 lead">
                {{__('patients.Actions') . ' - ' . $patient->last_name . ' ' . $patient->first_name}}
            </div>
            <div class="col-md-3">
                {!! Form::open(['method'=>'get', 'action'=>'PatientsController@index']) !!}
                {!! Form::button('<i class="fa fa-home fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-md-12']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-3">
                {!! Form::open(['method'=>'get', 'action'=>['PatientsController@show', $patient]]) !!}
                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-outline-cool col-md-12']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('history.show', [$patient, $patient->history]) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients.Medical History')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('examinations.index', $patient) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients.Examinations')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('pregnancies.index', $patient) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients.Pregnancies')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('surgeries.index', $patient) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients.Surgery')}}</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('cytologies.index', $patient) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients.Cytologies')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('histologies.index', $patient) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients.Histologies')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('laboratory_examinations.index', $patient) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients.Laboratory')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('imaging_results.index', $patient) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients.Imaging')}}</button>
                </form>
            </div>
        </div>
    </div>

</div>