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
                            {{__('msg_layouts_app.admin.users') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby#="navbarDropdownLeft">
                            <a href="{{ route('users.index') }}"
                               class="dropdown-item">{{__('msg_layouts_app.admin.users.list')}}</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="physicians"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            {{__('msg_layouts_app.Physicians')}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="physicians">
                            <a href="{{ route('physicians.index') }}" class="dropdown-item">{{__('msg_layouts_app.List Physicians')}}</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarMedications"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            {{__('msg_layouts_app.Drugs')}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarMedications">
                            <a href="{{ route('drugCompanies.index') }}" class="dropdown-item">{{__('msg_layouts_app.Companies')}}</a>
                            <a href="{{ route('drugs.index') }}" class="dropdown-item">{{__('msg_layouts_app.Products')}}</a>
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

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a href="{{ route('home') }}" class="dropdown-item">
                            {{__('msg_layouts_app.admin.home')}}
                        </a>
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
            </ul>
        </div>

    </div>
</nav>