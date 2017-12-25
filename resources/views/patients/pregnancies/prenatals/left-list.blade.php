<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-12 text-center">
                {{__('pregnancy.prenatal.diagnosis')}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                {!! Form::open(['method'=>'get', 'action'=>['PregnancyPrenatalsController@create', $pregnancy]]) !!}
                {!! Form::button('<i class="fa fa-plus fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table">
            <tbody>
            @foreach($pregnancy->prenatals as $prenatal)
                <tr>
                    <td>
                        <a href="{{ route('pregnancy.prenatals.show', [$pregnancy, $prenatal]) }}">{{ $prenatal->date ? $prenatal->date->format('d.m.Y') : __('pregnancy.nodate') }}</a>
                    </td>
                    <td>{{ $prenatal->pregnancy_age }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>