<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamma Alpha Chapter Omega Psi Phi</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- External Custom CSS -->
	<link href="{{asset('assets/css/custom-1/styles-ga1.css')}}" rel="stylesheet">
	<!-- <link href="{{asset('assets/css/custom-1/main.css')}}" rel="stylesheet"> -->
</head>
<body>

<div class="position-sticky top-0 sticky-box">
    <!-- Header Section -->
    <header id="topbar" class="text-white pt-2">
		<div id="socmed-icons-container" class="float-end">
		   <a href="https://facebook.com" target="_blank">
				<i class="fa-brands fa-facebook-f"></i>				
		   </a>
		   &nbsp;&nbsp;&nbsp;
		   <a href="https://instagram.com" target="_blank">
				<i class="fa-brands fa-instagram"></i>
			</a>			
			&nbsp;&nbsp;&nbsp;
			<a href="https://twitter.com" target="_blank">
				<i class="fa-brands fa-twitter"></i>
			</a>			
			&nbsp;&nbsp;&nbsp;
		</div>
    </header>
	
	<nav class="navbar navbar-expand-lg custom-navbar w-100">
	  <div class="container-fluid">
		<a class="navbar-brand" href="#">
			<img src="{{ asset('assets/images/custom-1/EDITTED-LOGO4.png') }}" />
		</a>
		<div class="collapse navbar-collapse justify-content-center">
		  <ul class="navbar-nav">
			<li class="nav-item">
			  <a class="nav-link" href="{{ url('/') }}">Home</a>
			</li>

			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#">About Us</a>
			  <ul class="dropdown-menu">
				<li><a class="dropdown-item" href="{{ route('fraternity_history') }}">Fraternity History</a></li>
				<li><a class="dropdown-item" href="{{ route('about_ga') }}">Chapter History</a></li>
			  </ul>
			</li>

			<li class="nav-item">
			  <a class="nav-link" href="#">Leadership</a>
			</li>

			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#">Programs</a>
			  <ul class="dropdown-menu">
				<li><a class="dropdown-item" href="{{ route('mandated_programs') }}">Mandated Programs</a></li>
			  </ul>
			</li>

			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#">Events</a>
			  <ul class="dropdown-menu">
				<li><a class="dropdown-item" href="{{ route('event.public-index') }}">Upcoming Events</a></li>
			  </ul>
			</li>

			<li class="nav-item">
			  <a class="nav-link" href="{{route('contact.show')}}">Contact Us</a> 
			</li>

			@auth
				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#">Member Access</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="{{ route('home') }}">Dashboard</a></li>
					<!-- <li><a class="dropdown-item" href="#">Logout</a></li> -->
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
				</ul>
				</li>
			@else
				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#">Member Login</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
					<li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
				</ul>
				</li>
			@endauth
		  </ul>
		</div>
	  </div>
	</nav>
</div>


<div class="image-container-header">	
	<img src="{{ asset('assets/images/custom-1/guest-header-img-overlay.png') }}" alt="Banner Image">
</div>

@yield('content')    
		
    <!-- Footer -->
    <footer class="bg-dark text-white text-center p-3 mt-5">
        <p>&copy; 2025 Gamma Alpha Chapter Omega Psi Phi Fraternity, Inc. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	
	<script>
		const collapseElementList = document.querySelectorAll('.collapse')
		const collapseList = [...collapseElementList].map(collapseEl => new bootstrap.Collapse(collapseEl))
	</script>
</body>
</html>
