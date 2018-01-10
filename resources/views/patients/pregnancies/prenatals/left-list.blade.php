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
        <table class="table table-hover">
            <tbody>
            @foreach($pregnancy->prenatalsOrderByDateDesc as $prenatal)
                {{--<tr onclick="window.location='{{ route('pregnancy.prenatals.show', [$pregnancy, $prenatal]) }}'">
                    <td>
                       {{ $prenatal->date ? $prenatal->date->format('d.m.Y') : __('pregnancy.nodate') }}
                    </td>
                    <td>
                        {{$prenatal->type ? \App\Enums\PregnancyPrenatalType::getDescription($prenatal->type) : '-'}}
                    </td>
                </tr>--}}
                <tr>
                    <form action="{{ route('pregnancy.prenatals.show', [$pregnancy, $prenatal]) }}">
                        <input class="btn btn-outline-cool col-md-12 mt-1"
                               type="submit"
                               value="{{ $prenatal->date ? $prenatal->date->format('d.m.Y') : __('pregnancy.nodate') }} ({{$prenatal->type ? \App\Enums\PregnancyPrenatalType::getDescription($prenatal->type) : '-'}})">
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>