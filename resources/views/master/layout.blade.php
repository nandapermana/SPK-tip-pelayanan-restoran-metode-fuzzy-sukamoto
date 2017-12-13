<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">

	@yield('styles')
</head>
<body>
	<div class="container">
		@yield('content')
	</div>

	<script src="{{URL::to ('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/bootstrap.js')}}"></script>
	@stack('scripts')
</body>
</html>