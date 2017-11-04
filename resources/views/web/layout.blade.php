<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="{{ $meta }}" />
		<title>@yield('title')</title>
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
		<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
		@include('web.assets.css')
		@include('web.assets.js')
		@yield('css')
	</head>
    <body>
    	@include('web.partials.header')
    	@include('web.partials.menu')
		@yield('content')
		@include('web.partials.guide')
		@include('web.partials.footer')
    </body>
</html>
