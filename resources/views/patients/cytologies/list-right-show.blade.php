<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-10">
                @if(!is_null($cytology))
                    {{__('cytology.cytology.label')}}
                    ( {{$cytology->date ? $cytology->date->format('d.m.Y') : __('cytology.no.date.label')}} )
                @else
                    {{__('cytology.cytology.label')}}
                @endif
            </div>
            <div class="col-md-2">
                @if(!is_null($cytology))
                    <form method="get" action="{{ route('cytologies.edit',[$patient, $cytology]) }}"
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
                @if(!is_null($cytology))
                    <iframe src="{{url('/') . $patient->getShortPatientPath() . '/cytologies/' . $cytology->filename}}"
                            name="cytologyFrame" width="100%" height="600px" frameborder="0"></iframe>
                @else
                    <iframe src="" name="cytologyFrame" width="100%" height="600px" frameborder="0"></iframe>
                @endif
            </div>
        </div>
    </div>

</div>