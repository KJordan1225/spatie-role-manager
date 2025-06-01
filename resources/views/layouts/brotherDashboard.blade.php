<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin Dashboard') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- jQuery script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .sidebar {
            height: 100vh;
            width: 200px;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #4B006E;
            color: #CFB53B;
            padding-top: 20px;
            margin-top: 80px;
        }

        .accordion-item {
            background-color: #4B006E;
            border: none;
			color: #CFB53B;
        }

        .accordion-button {
            color: #CFB53B;
            background-color: #4B006E;
            box-shadow: none;
        }

        .accordion-button:not(.collapsed) {
            background-color: #495057;
        }

        .accordion-button:focus {
            box-shadow: none;
			text-decoration: none;
			color: #CFB53B;
        }

        .accordion-body a {
            color: #CFB53B;
            text-decoration: none;
            padding: 8px 15px;
            display: block;
        }

        .accordion-body a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Admin Dashboard') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                                <!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div> -->
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        
    <!-- Sidebar Section -->
    <div class="sidebar">
        <div class="accordion" id="sidebarAccordion">

            <!-- To Homepage -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingRoles">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseRoles" aria-expanded="false" aria-controls="collapseRoles">
                        To Homepage
                    </button>
                </h2>
                <div id="collapseRoles" class="accordion-collapse collapse" aria-labelledby="headingRoles"
                    data-bs-parent="#sidebarAccordion">
                    <div class="accordion-body">
                        <a href="{{ url('/') }}">Homepage</a>
                    </div>
                </div>
            </div>

            <!-- My Profile Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDirectory">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseDirectory1" aria-expanded="false" aria-controls="collapseDirectory1">
                        Manage My Profile
                    </button>
                </h2>
                @if (Auth::user()->userProfile)
                    <div id="collapseDirectory1" class="accordion-collapse collapse" aria-labelledby="headingDirectory"
                        data-bs-parent="#sidebarAccordion">
                        <div class="accordion-body">
                            <a href="{{ route('my_profile.edit') }}">Edit My Profile</a>
                        </div>
                    </div>
                @else
                    <div id="collapseDirectory1" class="accordion-collapse collapse" aria-labelledby="headingDirectory"
                        data-bs-parent="#sidebarAccordion">
                        <div class="accordion-body">
                            <a href="{{ route('my_profile.create') }}">Create My Profile</a>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Directory Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDirectory">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseDirectory" aria-expanded="false" aria-controls="collapseDirectory">
                        Chapter Directory
                    </button>
                </h2>
                <div id="collapseDirectory" class="accordion-collapse collapse" aria-labelledby="headingDirectory"
                    data-bs-parent="#sidebarAccordion">
                    <div class="accordion-body">
                        <a href="{{ route('chapter_directory.view') }}">View/Print Chapter Directory</a>
                        <!-- <a href="#edit-documents">Edit Documents</a> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Sidebar Section -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://kit.fontawesome.com/9e77b5ca56.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
