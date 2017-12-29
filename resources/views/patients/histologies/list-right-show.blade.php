<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center">
                @if(!is_null($histology))
                    {{__('histology.histology.label')}}
                    ({{$histology->date ? $histology->date->format('d.m.Y') : __('histology.no.date.label')}})
                @else
                    {{__('histology.histology.label')}}
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                @if(!is_null($histology))
                    <form method="get" action="{{ route('histologies.edit',[$patient, $histology]) }}"
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
                @if(!is_null($histology))
                    <div class='embed-responsive' style='padding-bottom:150%'>
                       {{-- <object
                                data='{{url('/') . $patient->getShortPatientPath() . '/histologies/' . $histology->filename}}'
                                width='100%' height='100%'>
                        </object>--}}
                        <object data="https://docs.google.com/viewer?url={{url('/') . $patient->getShortPatientPath() . '/histologies/' . $histology->filename}}&embedded=true"
                                width="100%" height="100%"
                                type="">
                        </object>
                    </div>
                @else
                    <iframe src="" name="histologyFrame" width="100%" height="600px" frameborder="0"></iframe>
                @endif
            </div>
        </div>
    </div>

</div>