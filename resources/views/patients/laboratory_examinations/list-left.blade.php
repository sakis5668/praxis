<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-9">
                {{__('laboratory.laboratory.label')}}
            </div>
            <div class="col-md-3 ml-auto">
                {!! Form::open(['method' => 'get', 'action' => ['LaboratoryExaminationsController@create', $patient]]) !!}
                {!! Form::button('<i class="fa fa-plus fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-cool']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            {{--<th scope="col">{{__('laboratory.id.label')}}</th>--}}
                            <th scope="col">{{__('laboratory.date.label')}}</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patient->laboratoryExaminations()->orderby('date')->get() as $laboratoryExamination)
                            <tr>
                                {{--<th scope="row">{{ $laboratoryExamination->id }}</th>--}}
                                <td>
                                    <a href="{{route('laboratory_examinations.show', [$patient, $laboratoryExamination])}}">{{ $laboratoryExamination->date ? $laboratoryExamination->date->format('d.m.Y') : __('laboratory.no.date.label') }}</a>
                                </td>
                                <td>
                                    {!! Form::model($laboratoryExamination, ['method'=>'delete', 'action'=>['LaboratoryExaminationsController@destroy', $patient, $laboratoryExamination], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-delete']) !!}
                                    {!! Form::close() !!}
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