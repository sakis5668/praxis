<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-md-9">
                Prenatal Diagnosis
            </div>
            <div class="col-md-3 ml-auto">
                {!! Form::open(['method'=>'get', 'action'=>['PregnancyPrenatalsController@create', $pregnancy]]) !!}
                {!! Form::button('<i class="fa fa-plus fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-cool']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Date</th>
                <th scope="col">Wks</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pregnancy->prenatals as $prenatal)
                <tr>
                    <th scope="row">{{$prenatal->id}}</th>
                    <td><a href="{{ route('pregnancy.prenatals.show', [$pregnancy, $prenatal]) }}">{{ $prenatal->date ? $prenatal->date->format('d.m.Y') : 'no date' }}</a></td>
                    <td>{{ $prenatal->pregnancy_age }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</div>