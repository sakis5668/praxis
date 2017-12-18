<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-md-9">
                {{__('pregnancy.Examinations')}}
            </div>
            <div class="col-md-3 ml-auto">
                {!! Form::open(['method'=>'get', 'action'=>['PregnancyExaminationsController@create', $pregnancy]]) !!}
                {!! Form::button('<i class="fa fa-plus fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-cool']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="card-body">

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">{{__('pregnancy.ID')}}</th>
                <th scope="col">{{__('pregnancy.Date')}}</th>
                <th scope="col">{{__('pregnancy.Weeks')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pregnancy->examinations as $examination)
                <tr>
                    <th scope="row">{{$examination->id}}</th>
                    <td><a href="{{ route('pregnancy.examinations.show', [$pregnancy, $examination]) }}">{{ $examination->date ? $examination->date->format('d.m.Y') : __('pregnancy.nodate') }}</a></td>
                    <td>{{ $examination->pregnancy_age }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>