<!-- header -->
<div class="header">
	<div class="container">
		<ul>
			<li>
				<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
				Giao hàng nhanh chóng
			</li>
			<li>
				<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
				Miễn phí giao hàng
			</li>
			<li>
				<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
				<a href="mailto:{{ env('APP_MAIL') }}">{{ env('APP_MAIL') }}</a>
			</li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1>
				<a href="{{ URL::route('main') }}">
					<img src="{{ asset('images/logo3.jpg') }}">
				</a>
			</h1>
		</div>
		<div class="col-md-6 header-middle">
			<form role="form" id="search-product" class="form-horizontal" action="{{ URL::route('search_product') }}" method="GET">
				<div class="search">
					<input type="search" name="key_words" placeholder="Tìm kiếm">
				</div>
				<div class="section_room">
					<select id="country" class="frm-field required" name="menu_keywords">
						<option value="">Tất cả</option>
						@foreach($menus as $menu)
							@foreach($menu as $k => $m)
								<option value="{{ $m->id }}">{{ $m->name }}</option>
							@endforeach
						@endforeach
					</select>
				</div>
				<div class="sear-sub">
					<input type="submit" value=" ">
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="col-md-3 header-right footer-bottom">
			<ul>
				<li>
					<a href="{{ URL::route('get_login') }}" class="use1">
						<span>Login</span>
					</a>
				</li>
				<li>
					<a class="fb" href="#"></a>
				</li>
				<li>
					<a class="twi" href="#"></a>
				</li>
				<li>
					<a class="insta" href="#"></a>
				</li>
				<li>
					<a class="you" href="#"></a>
				</li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->