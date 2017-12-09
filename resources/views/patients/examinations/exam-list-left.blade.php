<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-9">
                {{__('examinations.examinations')}}
            </div>
            <div class="col-md-3 ml-auto">
                {!! Form::open(['method' => 'get', 'action' => ['ExaminationsController@create', $patient]]) !!}
                {!! Form::button('<i class="fa fa-plus fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-cool']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="card-body">

        <div class="col-md-12">
            <div class="row">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">{{__('examinations.id.label')}}</th>
                        <th scope="col">{{__('examinations.date.label')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($patient->examinations as $examination)
                        <tr>
                            <th scope="row">{{ $examination->id }}</th>
                            <td>
                                <a href="{{ route('examinations.show', [$patient, $examination])  }}">{{ $examination->date ? $examination->date->format('d.m.Y') : __('examinations.no.date.label') }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
