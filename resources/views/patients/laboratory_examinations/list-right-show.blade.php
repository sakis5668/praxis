<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center">
                @if(!is_null($laboratoryExamination))
                    {{__('laboratory.laboratory.label')}} ( {{$laboratoryExamination->date ? $laboratoryExamination->date->format('d.m.Y') : __('laboratory.no.date.label')}} )
                @else
                    {{__('laboratory.laboratory.label')}}
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                @if(!is_null($laboratoryExamination))
                    <form method="get" action="{{ route('laboratory_examinations.edit',[$patient, $laboratoryExamination]) }}"
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
                @if(!is_null($laboratoryExamination))
                    <div class='embed-responsive' style='padding-bottom:150%'>
                        {{--<object
                                data='{{url('/') . $patient->getShortPatientPath() . '/laboratory_examinations/' . $laboratoryExamination->filename}}'
                                width='100%' height='100%'>
                        </object>--}}
                        <object data="https://docs.google.com/viewer?url={{url('/') . $patient->getShortPatientPath() . '/laboratory_examinations/' . $laboratoryExamination->filename}}&embedded=true"
                                width="100%" height="100%"
                                type="">
                        </object>
                    </div>
                @else
                    <iframe src="" name="laboratoryFrame" width="100%" height="600px" frameborder="0"></iframe>
                @endif
            </div>
        </div>
    </div>

</div>