<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center">
                {{__('imaging.imaging.label')}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                {!! Form::open(['method' => 'get', 'action' => ['ImagingResultsController@create', $patient]]) !!}
                {!! Form::button('<i class="fa fa-plus fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-outline-cool']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-3"></div>
        </div>

    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        @foreach($patient->imagingResults()->orderby('date')->get() as $imagingResult)
                            <tr>
                                <td>
                                    <a
                                            href="{{ route('imaging_results.show', [$patient, $imagingResult]) }}">{{ $imagingResult->date ? $imagingResult->date->format('d.m.Y') : __('imaging.no.date.label') }}
                                    </a>
                                </td>
                                <td>
                                    {!! Form::model($imagingResult, ['method'=>'delete', 'action'=>['ImagingResultsController@destroy', $patient, $imagingResult], 'onsubmit' => 'return ConfirmDelete()']) !!}
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