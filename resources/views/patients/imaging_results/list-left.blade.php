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

    <div class="card-body scroller">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        @foreach($patient->imagingResults()->orderby('date')->get() as $imagingResult)
                            {{--<tr onclick="window.location='{{ route('imaging_results.show', [$patient, $imagingResult]) }}'">
                                <td class="text-center">
                                    {{ $imagingResult->date ? $imagingResult->date->format('d.m.Y') : __('imaging.no.date.label') }}
                                </td>
                                --}}{{--<td>
                                    {!! Form::model($imagingResult, ['method'=>'delete', 'action'=>['ImagingResultsController@destroy', $patient, $imagingResult], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-delete']) !!}
                                    {!! Form::close() !!}
                                </td>--}}{{--
                            </tr>--}}
                            <tr>
                                <form action="{{ route('imaging_results.show', [$patient, $imagingResult]) }}">
                                    <input class="btn btn-outline-cool col-md-12 mt-1" type="submit" value="{{ $imagingResult->date ? $imagingResult->date->format('d.m.Y') : __('imaging.no.date.label') }}">
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>