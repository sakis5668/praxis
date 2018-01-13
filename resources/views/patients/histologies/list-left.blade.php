<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center">
                {{__('histology.histologies.label')}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                {!! Form::open(['method' => 'get', 'action' => ['HistologiesController@create', $patient]]) !!}
                {!! Form::button('<i class="fa fa-plus fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-outline-cool']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <div class="card-body scroller">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        @foreach($patient->histologies()->orderby('date')->get() as $histology)
                           {{-- <tr onclick="window.location='{{ route('histologies.show', [$patient, $histology]) }}'">
                                <td class="text-center">
                                    {{ $histology->date ? $histology->date->format('d.m.Y') : __('$histology.no.date.label') }}
                                </td>
                            </tr>--}}
                           <tr>
                               <form action="{{ route('histologies.show', [$patient, $histology]) }}">
                                   <input class="btn btn-outline-cool col-md-12 mt-1" type="submit" value="{{ $histology->date ? $histology->date->format('d.m.Y') : __('$histology.no.date.label') }}">
                               </form>
                           </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>