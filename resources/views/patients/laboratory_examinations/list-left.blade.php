<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center">
                {{__('laboratory.laboratory.label')}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                {!! Form::open(['method' => 'get', 'action' => ['LaboratoryExaminationsController@create', $patient]]) !!}
                {!! Form::button('<i class="fa fa-plus fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-outline-cool']) !!}
                {!! Form::close() !!}
            </div>
            <col class="md-3">
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        @foreach($patient->laboratoryExaminations()->orderby('date')->get() as $laboratoryExamination)
                            <tr onclick="window.location='{{ route('laboratory_examinations.show', [$patient, $laboratoryExamination]) }}'">
                                <td class="text-center">
                                    {{ $laboratoryExamination->date ? $laboratoryExamination->date->format('d.m.Y') : __('laboratory.no.date.label') }}
                                </td>
                                {{--<td>
                                    {!! Form::model($laboratoryExamination, ['method'=>'delete', 'action'=>['LaboratoryExaminationsController@destroy', $patient, $laboratoryExamination], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-delete']) !!}
                                    {!! Form::close() !!}
                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>