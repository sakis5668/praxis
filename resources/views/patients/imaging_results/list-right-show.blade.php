<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-10">
                @if(!is_null($imagingResult))
                    {{__('imaging.imaging.label')}} ( {{$imagingResult->date ? $imagingResult->date->format('d.m.Y') : __('imaging.no.date.label')}} )
                @else
                    {{__('imaging.imaging.label')}}
                @endif
            </div>
            <div class="col-md-2">
                @if(!is_null($imagingResult))
                    <form method="get" action="{{ route('imaging_results.edit',[$patient, $imagingResult]) }}"
                          class="form-inline">
                        <button type="submit" class="btn btn-light col-md-12 ml-auto"><i class="fa fa-pencil fa-lg"></i></button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row mx-2">
            <div class="col-md-12">
                @if(!is_null($imagingResult))
                    <iframe src="{{url('/') . $patient->getShortPatientPath() . '/imaging_results/' . $imagingResult->filename}}"
                            name="imagingResultFrame" width="100%" height="600px" frameborder="0"></iframe>
                @else
                    <iframe src="" name="imagingResultFrame" width="100%" height="600px" frameborder="0"></iframe>
                @endif
            </div>
        </div>
    </div>

</div>