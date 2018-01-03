<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themes/default.css') }}">
    @yield('styles')
</head>

<body>
<div id="app">

    @include('layouts.app-navbar')
    @yield('content')

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<script src="{{asset('js/alertify.min.js')}}"></script>
<script>
    alertify.defaults = {
        // dialogs defaults
        autoReset:true,
        basic:false,
        closable:false,
        closableByDimmer:true,
        frameless:false,
        maintainFocus:true, // <== global default not per instance, applies to all dialogs
        maximizable:true,
        modal:false,
        movable:true,
        moveBounded:true,
        overflow:true,
        padding: true,
        pinnable:false,
        pinned:true,
        preventBodyShift:false, // <== global default not per instance, applies to all dialogs
        resizable:true,
        startMaximized:false,
        transition:'zoom',

        // notifier defaults
        notifier:{
            // auto-dismiss wait time (in seconds)
            delay:3,
            // default position
            position:'bottom-right',
            // adds a close button to notifier messages
            closeButton: false
        },

        // language resources
        glossary:{
            // dialogs default title
            title:'Praxis',
            // ok button text
            ok: '{{ __('msg_layouts_app.Ok') }}',
            // cancel button text
            cancel: '{{__('msg_layouts_app.Cancel')}}'
        },

        // theme settings
        theme:{
            // class name attached to prompt dialog input textbox.
            input:'ajs-input',
            // class name attached to ok button
            ok:'ajs-ok',
            // class name attached to cancel button
            cancel:'ajs-cancel'
        }
    };
</script>


@yield('scripts')

</body>
</html>
