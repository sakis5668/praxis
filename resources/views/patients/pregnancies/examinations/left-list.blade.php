<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-12 text-center">
                {{__('pregnancy.Examinations')}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 ">
                {!! Form::open(['method'=>'get', 'action'=>['PregnancyExaminationsController@create', $pregnancy]]) !!}
                {!! Form::button('<i class="fa fa-plus fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="card-body scroller">

        <table class="table table-hover">
            <tbody>
            @foreach($pregnancy->examinationsOrderByDateDesc as $examination)
                {{--<tr onclick="window.location='{{ route('pregnancy.examinations.show', [$pregnancy, $examination]) }}'">
                    <td>{{ $examination->date ? $examination->date->format('d.m.Y') : __('pregnancy.nodate') }}</td>
                    <td>{{ $examination->pregnancy_age }}</td>
                </tr>--}}
                <tr>
                    <form action="{{ route('pregnancy.examinations.show', [$pregnancy, $examination]) }}">
                        <input class="btn btn-outline-cool col-md-12 mt-1"
                               type="submit"
                               value="{{ $examination->date ? $examination->date->format('d.m.Y') : __('pregnancy.nodate') }} ({{ $examination->pregnancy_age }})">
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>