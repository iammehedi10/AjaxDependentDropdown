<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="shortcut icon" href="{{asset('FrontEnd/images/m.ico')}}" type="image/x-icon" />
	<link rel="stylesheet" href="{{asset('FrontEnd/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('FrontEnd/css/style.css')}}">
</head>
<body>
	<section id="main">
		@yield('main_content')
	</section>

	<script src="{{asset('FrontEnd/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('FrontEnd/js/jquery.min.js')}}"></script>
	@stack('js')
</body>
</html>