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
    @yield('styles')
</head>

<body>
<div id="app">

    @if(Auth::user())
        @include('layouts.language')
    @endif

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedXContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedXContent">
                <ul class="navbar-nav">
                    @if(Auth::guest())
                        {{-- write nothing !--}}
                    @else

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLeft"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{__('msg_layouts_app.patients') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownLeft">
                                <a href="{{ route('patients.index') }}"
                                   class="dropdown-item">{{__('msg_layouts_app.list.patients')}}</a>
                                {{--<a href="{{ route('patients.create') }}"
                                   class="dropdown-item">{{__('msg_layouts_app.create.new.patient')}}</a>--}}
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('pregnancies') }}" class="dropdown-item">{{__('msg_layouts_app.Pregnant')}}</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDrugs"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{__('msg_layouts_app.Products')}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDrugs">
                                <a href="{{ route('user.drugs.index') }}"
                                   class="dropdown-item">{{__('msg_layouts_app.Products')}}</a>

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLeft"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{__('msg_layouts_app.utils') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownLeft">
                                <a href="{{ route('wks.calculate') }}"
                                   class="dropdown-item">{{__('msg_layouts_app.utils.pregnancy.calculator')}}</a>
                                <a href="{{ route('bmi.calculate') }}"
                                   class="dropdown-item">{{__('msg_layouts_app.utils.calculate.bmi')}}</a>
                            </div>
                        </li>

                    @endif
                </ul>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    @if (Auth::guest())
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                @if(Auth::user()->isAdmin())
                                    <a href="{{ route('admin.index') }}" class="dropdown-item">
                                        {{__('msg_layouts_app.administration')}}
                                    </a>
                                @endif
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{__('msg_layouts_app.logout')}}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </nav>

    @yield('content')
</div>

@yield('scripts')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://use.fontawesome.com/4e3ff56bb8.js"></script>

</body>
</html>
