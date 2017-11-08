<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="col-md-3 footer-left">
			<h2>
				<a href="{{ URL::route('main') }}"><img src="{{ asset('images/logo3.jpg') }}" alt=" " /></a>
			</h2>
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
				consectetur, adipisci velit, sed quia non numquam eius modi tempora
				incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
		</div>
		<div class="col-md-9 footer-right">
			<div class="col-sm-6 newsleft">
				<h3>ĐĂNG KÝ ĐỂ NHẬN BÁO GIÁ !</h3>
			</div>
			<div class="col-sm-6 newsright">
				<form>
					<input type="text" value="Email" onfocus="this.value = '';"
						onblur="if (this.value == '') {this.value = 'Email';}" required="">
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
							<a href="{{ URL::route('product') }}">Sản phẩm</a>
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
							Address: 1234k Avenue, 4th block, 
							<span>Newyork City.</span>
						</li>
						<li>
							<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
							Email: 
							<a href="mailto:info@example.com">info@example.com</a>
						</li>
						<li>
							<i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
							Phone: +1234 567 567
						</li>
					</ul>
				</div>
				<div class="col-md-4 sign-gd flickr-post">
					<h4>Sản phẩm bán chạy</h4>
					<ul>
						<li><a href="single.html"><img src="images/b15.jpg" alt=" "
								class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b16.jpg" alt=" "
								class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b17.jpg" alt=" "
								class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b18.jpg" alt=" "
								class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b15.jpg" alt=" "
								class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b16.jpg" alt=" "
								class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b17.jpg" alt=" "
								class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b18.jpg" alt=" "
								class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="images/b15.jpg" alt=" "
								class="img-responsive" /></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
		<p class="copy-right">
			&copy 2016 Smart Shop. All rights reserved | Design by <a
				href="http://w3layouts.com/">W3layouts</a>
		</p>
	</div>
</div>
<!-- //footer -->