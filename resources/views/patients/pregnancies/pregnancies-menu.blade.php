<div class="card">

    <div class="card-header lead font-weight-bold">
        <div class="row">
            <div class="col-md-10">
                {{__('pregnancy.Pregnancy')}} - {{__('pregnancy.EDD')}} : {{ $pregnancy->edd ? $pregnancy->edd->format('d.m.Y') : __('pregnancy.no.edd.msg') }}
            </div>
            <div class="col-md-2 ml-auto">
                <form method="get" action="{{ route('pregnancies.index', $pregnancy->patient) }}">
                    <button type="submit" class="btn btn-light col-md-12"><i class="fa fa-arrow-left"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('pregnancy.history.show', [$pregnancy, $pregnancy->pregnancyHistory]) }}" class="form-inline">
                    <button type="submit" class="btn btn-cool col-md-12">{{__('pregnancy.History')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('pregnancy.examinations.index', $pregnancy) }}" class="form-inline">
                    <button type="submit" class="btn btn-cool col-md-12">{{__('pregnancy.Examinations')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('pregnancy.prenatals.index', $pregnancy) }}" class="form-inline">
                    <button type="submit" class="btn btn-cool col-md-12">{{__('pregnancy.Prenatal')}}</button>
                </form>
            </div>
            <div class="col-md-3 py-1">
                <form method="get" action="{{ route('pregnancy.outcome.show', [$pregnancy, $pregnancy->outcome]) }}" class="form-inline">
                    <button type="submit" class="btn btn-cool col-md-12">{{__('pregnancy.Outcome')}}</button>
                </form>
            </div>
        </div>

    </div>


</div>