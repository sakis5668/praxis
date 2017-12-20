@extends('layouts.app')

@section('content')

    @include('layouts.language')

    <div class="container">

        <div class="row my-3">
            <div class="col-md-12">
                @include('patients.actions-top')
            </div>
        </div>

        <div class="row  my-3">
            <div class="col-md-4">
                @include('patients.cytologies.list-left')
            </div>
            <div class="col-md-8">
                @include('patients.cytologies.list-right-create')
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>

    <script>
        Dropzone.uploadMultiple=true;
        Dropzone.options.mydropzone = {
            success: function() {
                var pat_id = {{$patient->id}};
                var myUrl = "/patients/" + pat_id + "/cytologies";
                this.on("queuecomplete", function () {
                    window.setTimeout("window.location.href='" + myUrl+"'", 100)
                })
            }
        };
    </script>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css">
@endsection