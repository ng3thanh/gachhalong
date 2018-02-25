<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Tân Định Phát, gạch Hạ Long, gạch, gạch ngói" />
        <meta name="description" content="{{ $meta }}" />
		<meta name="revised" content="ng3thanh, 25/02/2018" />
		<meta name="author" content="ng3thanh" />
		@yield('robots')
		<title>@yield('title')</title>
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
		<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
		@include('web.assets.css')
		@include('web.assets.js')
		@yield('css')
		@yield('js')
	</head>
    <body>
    	@include('web.partials.header')
    	@include('web.partials.menu')
		<div class="count-access">
			<div>
				<i class="fa fa-bolt"></i>
				<span>&nbsp;&nbsp;&nbsp;Truy cập hiện tại: {{ $visitor['now'] }}</span>
			</div>
			<div>
				<i class="fa fa-hourglass-start"></i>
				<span>&nbsp; Truy cập hôm nay: {{ $visitor['today'] }}</span>
			</div>
			<div>
				<i class="fa fa-calendar"></i>
				<span>&nbsp; Truy cập tháng: {{ $visitor['month'] }}</span>
			</div>
			<div>
				<i class="fa fa-area-chart"></i>
				<span>&nbsp;Tổng lượng truy cập: {{ $visitor['total'] }}</span>
			</div>
		</div>
		@yield('content')
		@include('web.partials.guide')
		@include('web.partials.footer')
    </body>
</html>
