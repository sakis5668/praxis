@extends('layouts.app')

@section('content')


    <h1>Test</h1>

    <div class="container">
        <div class="col-md-12">

            {{--<embed src="docs/1.pdf"  width="800" height="1200" type='application/pdf'>--}}

            <div id="pdf">
                <object class="col-md-12 " height="800" type="application/pdf" data="docs/1.pdf?#zoom=125&scrollbar=0&toolbar=0&navpanes=0" id="pdf_content">
                    <p>Insert your error message here, if the PDF cannot be displayed.</p>
                </object>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(".case").live('click', function () {
            $.fancybox({

                opeEffect: 'elastic
                closeEffect: 'elastic'
            });
        });
    </script>


@endsection