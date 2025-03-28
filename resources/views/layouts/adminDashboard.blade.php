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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }

        .accordion-item {
            background-color: #343a40;
            border: none;
			color: white;
        }

        .accordion-button {
            color: white;
            background-color: #343a40;
            box-shadow: none;
        }

        .accordion-button:not(.collapsed) {
            background-color: #495057;
        }

        .accordion-button:focus {
            box-shadow: none;
			text-decoration: none;
			color: white;
        }

        .accordion-body a {
            color: white;
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
                    <!-- {{ config('app.name', 'Admin Dashboard') }} -->
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

                <!-- Sidebar Section -->
                <div class="sidebar">
                    <div class="accordion" id="sidebarAccordion">

                        <!-- Roles Section -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingRoles">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseRoles" aria-expanded="false" aria-controls="collapseRoles">
                                    Manage Roles/Permissions
                                </button>
                            </h2>
                            <div id="collapseRoles" class="accordion-collapse collapse" aria-labelledby="headingRoles"
                                data-bs-parent="#sidebarAccordion">
                                <div class="accordion-body">
                                    <a href="#showRoles">List Roles</a>
                                    <!-- <a href="#createRole">Create Role</a>
                                    <a href="#editRole">Edit Role</a>
                                    <a href="#deleteRole">Delete Role</a> -->
                                </div>
                            </div>
                        </div>

                        <!-- Users Section -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingUsers">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                                    Manage Users
                                </button>
                            </h2>
                            <div id="collapseUsers" class="accordion-collapse collapse" aria-labelledby="headingUsers"
                                data-bs-parent="#sidebarAccordion">
                                <div class="accordion-body">
                                    <a href="#showUsers">List Users</a>
                                    <!-- <a href="#create-user">Create User</a>
                                    <a href="#edit-user">Edit User</a>
                                    <a href="#delete-user">Delete User</a> -->
                                </div>
                            </div>
                        </div>
                        
                        <!-- User Profiles Section -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingProfiles">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseProfiles" aria-expanded="false" aria-controls="collapseProfiles">
                                    Manage User Profiles
                                </button>
                            </h2>
                            <div id="collapseProfiles" class="accordion-collapse collapse" aria-labelledby="headingProfiles"
                                data-bs-parent="#sidebarAccordion">
                                <div class="accordion-body">
                                    <a href="#list-profiles">List User Profiles</a>
                                    <!-- <a href="#edit-documents">Edit Documents</a> -->
                                </div>
                            </div>
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
                                    <a href="#chapter-directory">View/Print Chapter Directory</a>
                                    <!-- <a href="#edit-documents">Edit Documents</a> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Sidebar Section -->

            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
