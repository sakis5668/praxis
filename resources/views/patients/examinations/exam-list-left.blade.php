<!-- Card -->
<div class="card">

    <!-- Card Header -->
    <div class="card-header">

        <!-- Start Row -->
        <div class="row">
            <div class="col-md-12 lead">
                {{__('examinations.examinations')}}
            </div>
        </div>
        <!-- End Row -->

        <!-- Start Row -->
        <div class="row mt-1">
            <div class="col-6">
                {!! Form::open(['method'=>'get', 'action'=>['ExaminationsPDFController@pdfOverview', $patient], 'target'=>'_blank']) !!}
                {!! Form::button('<i class="fa fa-file-pdf-o fa"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-6">
                {!! Form::open(['method' => 'get', 'action' => ['ExaminationsController@create', $patient]]) !!}
                {!! Form::button('<i class="fa fa-plus fa" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-outline-cool']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <!-- End Row -->

    </div>
    <!-- End Card Header -->

    <!-- Card Body -->
    <div class="card-body scroller">

        <!-- Start Row -->
        <div class="row">

            <!-- Start Column -->
            <div class="col-md-12">

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        @foreach($patient->examinationsOrderByDateDesc as $examination)
                            <tr onclick="window.location='{{ route('examinations.show', [$patient, $examination]) }}'">
                                <td class="text-center">
                                    {{ $examination->date ? $examination->date->format('d.m.Y') : __('examinations.no.date.label') }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->

            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

    </div>
    <!-- End Card Body -->

</div>
<!-- End Card -->