<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-10">
                @if(!is_null($histology))
                    {{__('histology.histology.label')}}
                    ( {{$histology->date ? $histology->date->format('d.m.Y') : __('histology.no.date.label')}} )
                @else
                    {{__('histology.histology.label')}}
                @endif
            </div>
            <div class="col-md-2">
                @if(!is_null($histology))
                    <form method="get" action="{{ route('histologies.edit',[$patient, $histology]) }}"
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
                @if(!is_null($histology))
                    <iframe src="{{url('/') . $patient->getShortPatientPath() . '/histologies/' . $histology->filename}}"
                            name="histologyFrame" width="100%" height="600px" frameborder="0"></iframe>
                @else
                    <iframe src="" name="histologyFrame" width="100%" height="600px" frameborder="0"></iframe>
                @endif
            </div>
        </div>
    </div>

</div>