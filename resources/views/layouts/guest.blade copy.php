<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>

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

	<link rel="icon" href="{{ asset('favicon.ico') }}?v={{ filemtime(public_path('favicon.ico')) }}">

    @stack('styles')
</head>
<body>
    @yield('content')
    @stack('scripts') 
</body>
</html>
