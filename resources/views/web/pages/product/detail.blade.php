@extends('web.layout') 
@section('title', $product->name)
@section('css')
<link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css" media="screen" />
@endsection
@section('js')
<script src="{{ asset('js/imagezoom.js') }}"></script>
<script src="{{ asset('js/jquery.flexslider.js') }}"></script>
@endsection

@section('content')
<!-- single -->
<div class="single">
	<div class="container">
		<div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<!-- FlexSlider -->
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
					<ul class="slides">
						@foreach($images as $image)
						<li data-thumb="{{ asset('upload/images/products/'.$image->name) }}">
							<div class="thumb-image"> 
								<img src="{{ asset('upload/images/products/'.$image->name) }}" alt="{{ $image->alt }}" data-imagezoom="true" class="img-responsive">
							</div>
						</li>
						@endforeach
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
			<h3>{{ $product->name }}</h3>
			<p>
				<span class="item_price">Giá cả: </span> 
				<span style="color: gray; font-size: 20px;">
					{{ (!empty($product->price)) ? $product->price : "Liên hệ" }}
				</span>
			</p>
			<div class="rating1">
				<span class="starRating">
					<input id="rating5" type="radio" name="rating" value="5">
					<label for="rating5">5</label>
					<input id="rating4" type="radio" name="rating" value="4">
					<label for="rating4">4</label>
					<input id="rating3" type="radio" name="rating" value="3" checked="">
					<label for="rating3">3</label>
					<input id="rating2" type="radio" name="rating" value="2">
					<label for="rating2">2</label>
					<input id="rating1" type="radio" name="rating" value="1">
					<label for="rating1">1</label>
				</span>
			</div>
			<div class="description">
				<h5>{!!  $product->information !!}</h5>
			</div>
		</div>
		<div class="clearfix"> </div>

		<div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Mô tả</a>
					</li>
					<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Thông số kỹ thuật</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
						<h5>Mô tả sản phẩm</h5>
						<p>{!! $product->description !!}</p>
					</div>
					<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
						<div class="bootstrap-tab-text-grids">
							<div class="bootstrap-tab-text-grid">
								<p>{!! $product->digital !!}</p>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //single -->

@endsection 

