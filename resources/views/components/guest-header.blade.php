<!-- HEADER BEGIN -->
    <header id="wt-header" class="wt-header wt-haslayout">
        <div class="wt-navigationarea">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <!-- <strong class="wt-logo"><a href="index-2.html"><img src="{{asset('assets/images/logo.png') }}" alt="company logo here"></a></strong> -->
                        <strong class="wt-logo"><a href="{{ url('/') }}">
                                <h4>Gamma Alpha chapter Omega Psi Phi Fraternity, Inc.</h4>
                            </a></strong>

                        <div class="wt-rightarea">
                            <nav id="wt-nav" class="wt-nav navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="lnr lnr-menu"></i>
                                </button>
                                <div class="collapse navbar-collapse wt-navigation" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="menu-item-has-children page_item_has_children">
                                            <a href="{{ url('/') }}">Main</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item-has-children page_item_has_children wt-notificationicon"><span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                                                    <a href="{{ url('/home') }}">Home</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('about_ga') }}">About GA</a>
                                            <!-- <ul class="sub-menu">
                                                <li>
                                                    <a href="javascript:void(0);">founders</a>
                                                </li>
                                            </ul> -->
                                        </li>


                                        <li class="menu-item-has-children page_item_has_children">
                                            <a href="{{ route('mandated_programs') }}">Mandated Programs</a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="javascript:void(0);">Achievement Week</a>
                                                </li>
                                                <li class="current-menu-item">
                                                    <a href="javascript:void(0);">Talent Hunt</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Omega STEM Program</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Fatherhood & Mentoring</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Social Action</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children page_item_has_children">
                                            <a href="{{ route('event.public-index') }}">Events</a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="javascript:void(0);">Calendar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children page_item_has_children">
                                            <a href="javascript:void(0);">Scholarships</a>
                                        </li>
                                        <li class="menu-item-has-children page_item_has_children">
                                            <a href="javascript:void(0);">Contact GA</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <div class="wt-loginarea">
                                <figure class="wt-userimg">
                                    <img src="{{asset('assets/images/user-login.') }}" alt="img description">
                                </figure>
                                <div class="wt-loginoption">
                                    <a href="javascript:void(0);" id="wt-loginbtn" class="wt-loginbtn">Login</a>
                                    <div class="wt-loginformhold">
                                        <div class="wt-loginheader">
                                            <span>Login</span>
                                            <a href="javascript:;"><i class="fa fa-times"></i></a>
                                        </div>
                                        <form class="wt-formtheme wt-loginform do-login-form">
                                            <fieldset>
                                                <div class="form-group">
                                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="wt-logininfo">
                                                    <a href="javascript:;" class="wt-btn do-login-button">Login</a>
                                                    <span class="wt-checkbox">
                                                        <input id="wt-login" type="checkbox" name="rememberme">
                                                        <label for="wt-login">Keep me logged in</label>
                                                    </span>
                                                </div>
                                            </fieldset>
                                            <div class="wt-loginfooterinfo">
                                                <a href="javascript:;" class="wt-forgot-password">Forgot password?</a>
                                                <a href="register.html">Create account</a>
                                            </div>
                                        </form>
                                        <form class="wt-formtheme wt-loginform do-forgot-password-form wt-hide-form">
                                            <fieldset>
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control get_password" placeholder="Email">
                                                </div>

                                                <div class="wt-logininfo">
                                                    <a href="javascript:;" class="wt-btn do-get-password">Get Pasword</a>
                                                </div>
                                            </fieldset>
                                            <div class="wt-loginfooterinfo">
                                                <a href="javascript:void(0);" class="wt-show-login">Login</a>
                                                <a href="register.html">Create account</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <a href="register.html" class="wt-btn">Join Now</a>
                            </div>
                            <div class="wt-userlogedin">
                                @auth
                                <figure class="wt-userimg">
                                    <img src="{{asset('assets/images/user-img.jpg') }}" alt="image description">
                                </figure>
                                <div class="wt-username">
                                    <h3>{{ auth()->user()->name }}</h3>
                                </div>
                                @else
                                <div class="wt-username">
                                    <!-- <h3>Louanne Mattioli</h3> -->
                                    <span>Access Site Features</span>
                                </div>
                                @endauth

                                <nav class="wt-usernav">
                                    <ul>



                                        @if (Route::has('login'))
                                        <!-- <nav class="-mx-3 flex flex-1 justify-end"> -->
                                        @auth
                                        @if (true == (auth()->user()->hasRole('Admin'))) <li>
                                        <li>
                                            <span>{{ auth()->user()->hasRole('Admin') }}</span>
                                            <a
                                                href="{{ url('/admin') }}"
                                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                Admin Dashboard
                                            </a>
                                        </li>
                                        @elseif (true !== (auth()->user()->hasRole('Admin')))
                                        <li class="menu-item-has-children">
                                            <a href="javascript:void(0);">My Profile</a>
                                            <ul class="sub-menu">
                                                <li><span class="wt-dropdownarrow"><i class="lnr lnr-chevron-right"></i></span>
                                                    @if(null == (auth()->user()->userProfile))
                                                    <ul>
                                                        <li><a href="#">Create My Profile</a></li>
                                                    </ul>
                                                    @else
                                                    <ul class="sub-menu">
                                                        <li class="wt-newnoti"><a href="{{ route('home') }}">View My Profile</a></li>
                                                        <li class="wt-newnoti"><a href="javascript:void(0);">Edit My Profile</a></li>
                                                    </ul>
                                                    @endif
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>Account Settings</span>
                                            </a>
                                        </li>
                                        @endif
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                        @else
                                        <li>
                                            <a
                                                href="{{ route('login') }}"
                                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                Log in
                                            </a>
                                        </li>

                                        @if (Route::has('register'))
                                        <li>
                                            <a
                                                href="{{ route('register') }}"
                                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                Register
                                            </a>
                                        </li>
                                        @endif
                                        @endauth
                                        <!-- </nav> -->
                                        @endif

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER END -->