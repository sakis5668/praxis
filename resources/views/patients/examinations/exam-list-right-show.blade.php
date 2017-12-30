<!-- Card -->
<div class="card">

    <!-- Card Header -->
    <div class="card-header">

        <!-- Start Row -->
        <div class="row">
            <div class="col-md-12 lead">
                {{__('examinations.findings.label')}} - {{ $examination->date->format('d.m.Y') }}
            </div>
        </div>
        <!-- End Row -->

        <!-- Start Row -->
        <div class="row justify-content-end">

            <!-- Start Column -->
            <div class="col-6 col-md-3 mt-1">
                {!! Form::open(['method'=>'get', 'action'=>['ExaminationsPDFController@pdfExamination', $patient, $examination], 'target'=>'_blank']) !!}
                {!! Form::button('<i class="fa fa-file-pdf-o fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                {!! Form::close() !!}
            </div>
            <!-- End Column -->

            <!-- Start Column -->
            <div class="col-6 col-md-3 mt-1">
                {!! Form::model($examination, ['method'=>'get', 'action'=>['ExaminationsController@edit', $patient, $examination]]) !!}
                {!! Form::button('<i class="fa fa-pencil fa-lg" aria-hidden="true"></i>', ['type'=>'submit' ,'class' => 'form-control btn btn-outline-cool col-md-12']) !!}
                {!! Form::close() !!}
            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

    </div>
    <!-- End Card Header -->

    <!-- Card Body -->
    <div class="card-body">

        <!-- Start Row -->
        <div class="row">

            <!-- Start Column -->
            <div class="col-md-12">
                <div class="font-weight-bold">{{__('examinations.findings.label')}} :</div>
            </div>
            <!-- End Column -->

            <!-- Start Column -->
            <div class="col-md-12">
                {!! nl2br(e($examination->findings)) !!}
            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

        <hr>

        <!-- Start Row -->
        <div class="row">

            <!-- Start Column -->
            <div class="col-md-12">
                <div class="font-weight-bold">{{__('examinations.instructions.label')}} :</div>
            </div>
            <!-- End Column -->

            <!-- Start Column -->
            <div class="col-md-12">
                {!! nl2br(e($examination->instructions)) !!}
            </div>
            <!-- End Column -->

        </div>
        <!-- End Row -->

    </div>
    <!-- End Card Body -->

</div>
<!-- End Card -->