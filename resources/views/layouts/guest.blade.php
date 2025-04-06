<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Gamma Alpha Chapter</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Style+Script&display=swap" rel="stylesheet">

	<!-- STYLESHEETS -->
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="icon" href="{{asset('assets/images/custom/favicon/favicon.png') }}" type="image/x-icon">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/normalize.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/scrollbar.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/fontawesome/fontawesome-all.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/linearicons.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/tipso.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/chosen.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/prettyPhoto.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/main.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/color.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/transitions.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/responsive.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/custome/founders.css') }}">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">	
	
	<script src="{{asset('assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>

	<!-- <x-head.tinymce-config/> -->
</head>

<body class="wt-login">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!-- Preloader Start -->
	<div class="preloader-outer">
		<div class="loader"></div>
	</div>
	<!-- Preloader End -->
	<!-- Wrapper Start -->
	<div id="wt-wrapper" class="wt-wrapper wt-haslayout">
		<!-- Content Wrapper Start -->
		<div class="wt-contentwrapper">
			<!-- Header Start -->

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
													<a href="javascript:void(0);">Main</a>
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
			<!--Header End-->
			<!--Home Banner Start-->
			<div class="wt-haslayout wt-bannerholder">
				<div class="container">
					<div class="row hero-banner">
						<img src="{{ asset('assets/images/custom/hero-banner/oppf-founders.png') }}" alt="Banner Image" class="hero-image">
						<div class="overlay"></div>
						<div class="hero-text">
							<h1>Gamma Alpha Chapter of Omega Psi Phi</h1>
						</div>
					</div>
				</div>
			</div>
			<!--Home Banner End-->
			<!--Main Start-->
			<main id="wt-main" class="wt-main wt-haslayout">
				<!--Categories Start-->
				<section class="wt-haslayout wt-main-section">
					<div class="container">
                         @yield('content')
                    </div>
                </section>
			</main>
			<!--Main End-->
			<!--Footer Start-->
			<footer id="wt-footer" class="wt-footer wt-haslayout">

				<div class="wt-haslayout wt-joininfo" style="background-color: #7851a9;">
					<div class="container">
						<div class="row justify-content-md-center" style="background-color: #7851a9;">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 push-lg-1">
								<div class="wt-companyinfo">
									<span><a href="javascript:void(0);" style="color: #cfb53b">Gamma Alpha Chapter Omega Psi Phi Fraternity, Inc.</a></span>
								</div>
								<!-- <div class="wt-fbtnarea">
									<a href="javascript:void(0)" class="wt-btn">Join Now</a>
								</div> -->
							</div>
						</div>
					</div>
				</div>
				<div class="wt-haslayout wt-footerbottom">
					<div class="container">
						<div class="row">
							<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<p class="wt-copyrights"><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>								
							</div> -->
						</div>
					</div>
				</div>
			</footer>
			<!--Footer End-->
		</div>
		<!--Content Wrapper End-->
	</div>

	<script>
		document.getElementById('submitbtn').addEventListener('click', function(e) {
			e.preventDefault(); // Prevent the default anchor behavior
			window.alert("Submit search form!");
			document.getElementById('searchform').submit(); // Submit the form
		});
	</script>

	<!--Wrapper End-->
	<script src="{{asset('assets/js/vendor/jquery-3.3.1.js') }}"></script>
	<script src="{{asset('assets/js/vendor/jquery-library.js') }}"></script>
	<script src="{{asset('assets/js/vendor/bootstrap.min.js') }}"></script>
	<script src="{{asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{asset('assets/js/chosen.jquery.js') }}"></script>
	<script src="{{asset('assets/js/scrollbar.min.js') }}"></script>
	<script src="{{asset('assets/js/tilt.jquery.js') }}"></script>
	<script src="{{asset('assets/js/prettyPhoto.js') }}"></script>
	<script src="{{asset('assets/js/jquery-ui.js') }}"></script>
	<script src="{{asset('assets/js/readmore.js') }}"></script>
	<script src="{{asset('assets/js/countTo.js') }}"></script>
	<script src="{{asset('assets/js/appear.js') }}"></script>
	<script src="{{asset('assets/js/tipso.js') }}"></script>
	<script src="{{asset('assets/js/jRate.js') }}"></script>
	<script src="{{asset('assets/js/main.js') }}"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>

</html>