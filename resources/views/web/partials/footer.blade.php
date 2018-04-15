<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="col-md-3 footer-left">
			<h2>
				<a href="{{ URL::route('main') }}"><img src="{{ asset('images/logo3.jpg') }}" alt=" " /></a>
			</h2>
			<p>Công ty Tân Định Phát là nhà phân phối chính thức các sản phẩm GẠCH NGÓI HẠ LONG: gạch lát Hạ Long, gạch gốm Hạ Long, gạch lát nền Hạ Long, hoặc gạch lát sân Hạ Long, gạch thẻ cotto, ngói lợp Hạ Long.</p>
		</div>
		<div class="col-md-9 footer-right">
			<div class="col-sm-6 newsleft">
				<h3>ĐĂNG KÝ ĐỂ NHẬN BÁO GIÁ !</h3>
			</div>
			<div class="col-sm-6 newsright">
				<form action="{{ URL::route('mail.register') }}" method="post">
					{!! csrf_field() !!}
					<input type="text" placeholder="Email" name="email" required="required">
					<input type="submit" value="Submit">
				</form>
			</div>
			<div class="clearfix"></div>
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h4>Sơ đồ trang</h4>
					<ul>
						<li>
							<i class="glyphicon glyphicon-home" aria-hidden="true"></i>&nbsp;&nbsp;
							<a href="{{ URL::route('main') }}">Trang chủ</a>
						</li>
						<li>
							<i class="glyphicon glyphicon-info-sign" aria-hidden="true"></i>&nbsp;&nbsp;
							<a href="{{ URL::route('introduce') }}">Giới thiệu</a>
						</li>
						<li>
							<i class="glyphicon glyphicon-tags" aria-hidden="true"></i>&nbsp;&nbsp;
							<a href="{{ URL::route('introduce') }}">Sản phẩm</a>
						</li>
						<li>
							<i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>&nbsp;&nbsp;
							<a href="{{ URL::route('document') }}">Tài liệu</a>
						</li>
						<li>
							<i class="glyphicon glyphicon-phone-alt" aria-hidden="true"></i>&nbsp;&nbsp;
							<a href="{{ URL::route('contact') }}">Liên hệ</a>
						</li>
					</ul>
				</div>

				<div class="col-md-4 sign-gd-two">
					<h4>Thông tin cửa hàng</h4>
					<ul>
						<li>
							<i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
							{{ config('constant.address') }}
						</li>
						<li>
							<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
							<a href="mailto:{{ config('constant.email') }}">{{ config('constant.email') }}</a>
						</li>
						<li>
							<i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
							<a href="callto:{{ config('constant.phone') }}">{{ config('constant.phone_format') }}</a>
						</li>
					</ul>
				</div>
				<div class="col-md-4 sign-gd flickr-post">
					<h4>Sản phẩm bán chạy</h4>
					<ul>
						@foreach($footerProduct as $product)
						<li>
							<a href="{{ URL::route('product_detail', [$product->slug, $product->id]) }}">
								<img src="{{ asset('upload/images/products/'. $product->image_name) }}" alt="{{ $product->alt }}" class="img-responsive" />
							</a>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
		<p class="copy-right">
			&copy 2018 Gạch Hạ Long. All rights reserved | Design by <a href="http://ngthanh2093.com/">ng3thanh</a>
		</p>
	</div>
</div>
<!-- //footer -->