<div class="card">

    <div class="card-header font-weight-bold">
        <div class="row">
            <div class="col-md-9">
                {{__('histology.histologies.label')}}
            </div>
            <div class="col-md-3 ml-auto">
                {!! Form::open(['method' => 'get', 'action' => ['HistologiesController@create', $patient]]) !!}
                {!! Form::button('<i class="fa fa-plus fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-cool']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            {{--<th scope="col">{{__('histology.id.label')}}</th>--}}
                            <th scope="col">{{__('histology.date.label')}}</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patient->histologies()->orderby('date')->get() as $histology)
                            <tr>
                                {{--<th scope="row">{{ $histology->id }}</th>--}}
                                <td>
                                    <a
                                            href="{{ route('histologies.show', [$patient, $histology]) }}">{{ $histology->date ? $histology->date->format('d.m.Y') : __('$histology.no.date.label') }}
                                    </a>
                                </td>
                                <td>
                                    {!! Form::model($histology, ['method'=>'delete', 'action'=>['HistologiesController@destroy', $patient, $histology], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-delete']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>