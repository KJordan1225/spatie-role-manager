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

	<!-- Script Font Family -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Luxurious+Script&family=Monsieur+La+Doulaise&family=Petit+Formal+Script&display=swap" rel="stylesheet">

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
			  <a class="nav-link" href="#">Home</a>
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
			  <a class="nav-link" href="#">Contacts</a>
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



    <!-- Main Content -->
    <main class="container mt-5">
		
		<!-- <div class="container my-4">
			<div class="row g-3">
			  <div class="col-md-4">
				<div class="image-box">
				  <img src="{{ asset('assets/images/custom-1/leadership2-400x300a.png') }}" alt="Image 1" width="400px" height="300px">				  
				</div>
			  </div>
			  <div class="col-md-4">
				<div class="image-box">
				  <img src="{{ asset('assets/images/custom-1/event2-400x300a.png') }}" alt="Image 2" width="400px" height="300px">
				</div>
			  </div>
			  <div class="col-md-4">
				<div class="image-box">
				  <img src="{{ asset('assets/images/custom-1/programs-400x300.png') }}" alt="Image 3" width="400px" height="300px">
				</div>
			  </div>
			</div>
		</div> -->
		
		<!-- BASILEUS MESSAGE START -->
		<div class="basileus-message-row">
			<div class="basileus-message-left-section">
				<h1>Basileus Message</h1>
				<p>
					Greetings from Gamma Alpha Chapter, home of the Roanoke City Ques!
				</p>
				<p>
					Welcome to our website.
				</p>
				<p>
					We are proud to represent the Gamma Alpha Chapter of Omega Psi Phi Fraternity, Inc., a fraternity
					grounded in a strong tradition of excellence and brotherhood. Our chapter is guided by the
					fraternity's esteemed four cardinal principles: Manhood, Scholarship, Perseverance, and Uplift.
					These foundational values are more than just words—they are the compass by which we navigate our
					lives, shaping our actions both individually as men and collectively as a chapter.
				</p>
				<p>
					**Manhood** speaks to our responsibility as individuals to demonstrate strength, integrity, and
					accountability in all aspects of life. We are dedicated to leading by example, standing firm in
					our convictions, and uplifting those around us.
				</p>
				<p>
					**Scholarship** emphasizes the importance of intellectual development and the pursuit of academic
					and professional excellence. We are committed to the lifelong acquisition of knowledge, encouraging
					our members to achieve the highest levels of academic and career success.
				</p>
				<p>
					**Perseverance** embodies our relentless determination to overcome challenges and obstacles. We
					understand that the path to greatness requires resilience, and we are steadfast in our pursuit of
					excellence, no matter the difficulty.
				</p>
				<p>
					**Uplift** reflects our commitment to serving others and making a positive impact in our communities.
					We believe that true greatness lies in the ability to lift others up, contributing to the betterment
					of society through service, mentoring, and leadership.
				</p>
				<p>
					Together, these principles serve as the foundation upon which we build our lives and our fraternity’s
					mission. As members of Gamma Alpha Chapter, we strive to embody the vision of our founders: that
					"men of high achievement and aspiration", when united, can become a dynamic and powerful force for
					good. It is our ambition to leave a lasting impact on the world by being men of strong character and purpose.
				</p>
				<p>
					In everything we do, we remain dedicated to the growth of our members, the betterment of our community,
					and the enduring legacy of Omega Psi Phi Fraternity, Inc.
				</p>
				<p>
					LONG LIVE OMEGA PSI PHI FRATERNITY, INC.!
				</p>
			</div>
			<div class="basileus-message-right-section">
				<img src="{{ asset('assets/images/custom-1/reggie_martin.jpg') }}" alt="Basileus-Image">
			</div>
		</div>
		<!-- BASILEUS MESSAGE END -->
	</main>	
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
