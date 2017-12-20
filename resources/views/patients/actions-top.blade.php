<div class="card">

    <div class="card-header">
        <div class="row my-1 lead font-weight-bold">
            <div class="col-md-10">
                {{__('patients-show-view.actions.label') . ' - ' . $patient->last_name . ' ' . $patient->first_name}}
            </div>
            <div class="col-md-2">
                {!! Form::open(['method'=>'get', 'action'=>['PatientsController@show', $patient->id]]) !!}
                {!! Form::button('<i class="fa fa-arrow-left fa-lg"></i>', ['type'=>'submit', 'class'=>'btn btn-light col-md-12']) !!}
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
                            class="btn btn-cool col-md-12">{{__('patients-show-view.medical.history.button')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('examinations.index', $patient) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients-show-view.examinations.button')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('pregnancies.index', $patient) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients-show-view.pregnancies.button')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('surgeries.index', $patient) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients-show-view.surgery.button')}}</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('cytologies.index', $patient) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients-show-view.cytologies.button')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('histologies.index', $patient) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients-show-view.histologies.button')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('laboratory_examinations.index', $patient) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients-show-view.laboratory.button')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('imaging_results.index', $patient) }}"
                      class="form-inline">
                    <button type="submit"
                            class="btn btn-cool col-md-12">{{__('patients-show-view.imaging.button')}}</button>
                </form>
            </div>
        </div>
    </div>

</div>