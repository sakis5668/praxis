<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-9">
                {{__('imaging.imaging.label')}}
            </div>
            <div class="col-md-3 ml-auto">
                {!! Form::open(['method' => 'get', 'action' => ['ImagingResultsController@create', $patient]]) !!}
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
                            <th scope="col">{{__('imaging.id.label')}}</th>
                            <th scope="col">{{__('imaging.date.label')}}</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patient->imagingResults()->orderby('date')->get() as $imagingResult)
                            <tr>
                                <th scope="row">{{ $imagingResult->id }}</th>
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