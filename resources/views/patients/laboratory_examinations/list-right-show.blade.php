<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-10">
                @if(!is_null($laboratoryExamination))
                    {{__('laboratory.laboratory.label')}} ( {{$laboratoryExamination->date ? $laboratoryExamination->date->format('d.m.Y') : __('laboratory.no.date.label')}} )
                @else
                    {{__('laboratory.laboratory.label')}}
                @endif
            </div>
            <div class="col-md-2">
                @if(!is_null($laboratoryExamination))
                    <form method="get" action="{{ route('laboratory_examinations.edit',[$patient, $laboratoryExamination]) }}"
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
                @if(!is_null($laboratoryExamination))
                    <iframe src="{{url('/') . $patient->getShortPatientPath() . '/laboratory_examinations/' . $laboratoryExamination->filename}}"
                            name="laboratoryFrame" width="100%" height="600px" frameborder="0"></iframe>
                @else
                    <iframe src="" name="laboratoryFrame" width="100%" height="600px" frameborder="0"></iframe>
                @endif
            </div>
        </div>
    </div>

</div>