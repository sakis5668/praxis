@extends('layouts.app')

@section('content')
    <div class="demo-droppable">Drop your files here.</div>
@endsection


@section('scripts')

    <script>
        function makeDroppable(element, callback) {

            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('multiple', true);
            input.style.display = 'none';

            input.addEventListener('change', triggerCallback);
            element.appendChild(input);

            element.addEventListener('dragover', function (e) {
                e.preventDefault();
                e.stopPropagation();
                element.classList.add('dragover');
            });

            element.addEventListener('dragleave', function (e) {
                e.preventDefault();
                e.stopPropagation();
                element.classList.remove('dragover');
            });

            element.addEventListener('drop', function (e) {
                e.preventDefault();
                e.stopPropagation();
                element.classList.remove('dragover');
                triggerCallback(e);
            });

            element.addEventListener('click', function () {
                input.value = null;
                input.click();
            });

            function triggerCallback(e) {
                var files;
                if (e.dataTransfer) {
                    files = e.dataTransfer.files;
                } else if (e.target) {
                    files = e.target.files;
                }
                callback.call(null, files);
            }
        }

        var element = document.querySelector('.droppable');

        function callback(files) {
            var formData = new FormData();
            formData.append("files", files);

            $.ajax({
                url: '/server_upload_url',
                method: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert('Files uploaded successfully.');
                }
            });
        }

        makeDroppable(element, callback);
    </script>


@endsection


@section('styles)


    <style>
        .demo-droppable {
            background: #08c;
            color: #fff;
            padding: 100px 0;
            text-align: center;
        }

        .demo-droppable.dragover {
            background: #00CC71;
        }
    </style>


@endsection