<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center">
                {{__('cytology.cytologies.label')}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                {!! Form::open(['method' => 'get', 'action' => ['CytologiesController@create', $patient]]) !!}
                {!! Form::button('<i class="fa fa-plus fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-outline-cool']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        @foreach($patient->cytologies()->orderby('date')->get() as $cytology)
                            <tr onclick="window.location='{{ route('cytologies.show', [$patient, $cytology]) }}'">
                                <td class="text-center">
                                    {{ $cytology->date ? $cytology->date->format('d.m.Y') : __('cytology.no.date.label') }}
                                </td>
                                {{--<td>
                                    --}}{{--{!! Form::model($cytology, ['method'=>'delete', 'action'=>['CytologiesController@destroy', $patient, $cytology], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['type'=>'submit', 'class' => 'form-control btn btn-delete']) !!}
                                    {!! Form::close() !!}--}}{{--
                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>