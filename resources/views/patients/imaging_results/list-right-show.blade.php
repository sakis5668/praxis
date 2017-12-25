<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center">
                @if(!is_null($imagingResult))
                    {{__('imaging.imaging.label')}} ({{$imagingResult->date ? $imagingResult->date->format('d.m.Y') : __('imaging.no.date.label')}})
                @else
                    {{__('imaging.imaging.label')}}
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                @if(!is_null($imagingResult))
                    <form method="get" action="{{ route('imaging_results.edit',[$patient, $imagingResult]) }}"
                          class="form-inline">
                        <button type="submit" class="btn btn-outline-cool col-md-12 ml-auto"><i class="fa fa-pencil fa-lg"></i></button>
                    </form>
                @endif
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <div class="card-body">
        <div class="row mx-2">
            <div class="col-md-12">
                @if(!is_null($imagingResult))
                    <div class='embed-responsive' style='padding-bottom:150%'>
                        <object
                                data='{{url('/') . $patient->getShortPatientPath() . '/imaging_results/' . $imagingResult->filename}}'
                                width='100%' height='100%'>
                        </object>
                    </div>
                @else
                    <iframe src="" name="imagingResultFrame" width="100%" height="600px" frameborder="0"></iframe>
                @endif
            </div>
        </div>
    </div>

</div>