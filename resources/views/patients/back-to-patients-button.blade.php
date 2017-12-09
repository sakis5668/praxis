<div class="container">
    <div class="row my-3">
        <div class="col-md-10">
            <div class="col-md-12 font-weight-bold lead">
                {{ $patient->last_name . ', ' . $patient->first_name }}
            </div>
        </div>
        <div class="col-md-2 ml-auto">
            <form method="get" action="{{ route('patients.show', $patient->id) }}">
                <button type="submit" class="btn btn-cool col-md-12"><i class="fa fa-arrow-left"></i></button>
            </form>
        </div>
    </div>
</div>