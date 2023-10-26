<!doctype html>

<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>@yield('title', 'DashBoard')</title>
	<!-- CSS Style -->
	@include('admin.body.style')
	<meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
	<script src="{{ URL::asset('../backend/assets/dist/js/demo-theme.min.js?1684106062')}}"></script>
	<div class="page">
		<!-- Sidebar -->
		@include('admin.body.sidebar')
		<!-- Navbar -->
		@include('admin.body.navbar')

		<div class="page-wrapper">
			@yield('admin')
			<!-- Footer -->
			@include('admin.body.footer')
		</div>
	</div>
	<!-- JS Scripts -->
	@include('admin.body.scripts')



</body>

</html>