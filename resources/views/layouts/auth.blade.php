<!DOCTYPE HTML>
<html lang="en">
	<head>
		@include('partials.head')

		@yield('head')
	</head>

	<body class="login-page">
		<div class="login-box">
			<div class="login-logo">
				<span class="logo-lg">{!! trans('branding.logo.large') !!}</span>
			</div>

			<div class="login-box-body">
				@yield('content')
			</div>
		</div>
	</body>
</html>
