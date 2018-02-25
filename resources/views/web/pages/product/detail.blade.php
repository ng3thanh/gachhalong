@extends('web.layout') 
@section('title', $product->name)
@section('robots')
	<meta name="robots" content="all" />
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css" media="screen" />
<link rel="stylesheet" href="{{ asset('css/product.css') }}" type="text/css" media="screen" />
@endsection
@section('content')
<!-- single -->
<div class="single">
	<div class="container">
		<div class="span-product">
			<span>Chi tiết sản phẩm</span>
		</div>
		<div class="col-md-4 col-sm-12 single-right-left animated wow slideInUp animated product-image" data-wow-delay=".5s">
			<div class="grid images_3_of_2">
				<div class="flexslider">
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
		<div class="col-md-8 col-sm-12 single-right-left simpleCart_shelfItem animated wow slideInRight animated product-detail" data-wow-delay=".5s">
			<div class="product-name">
				<h3>{{ $product->name }}</h3>
				<hr>
			</div>

			<div class="product-price">
				<span class="span-price">Giá cả: </span>
				<span class="item-price">
					{{ (!empty($product->price)) ? $product->price : "Liên hệ" }}
				</span>
			</div>
			<div class="rating">
				<span class="starRating">
					<input id="rating5" type="radio" name="rating" value="5" checked="">
					<label for="rating5">5</label>
					<input id="rating4" type="radio" name="rating" value="4">
					<label for="rating4">4</label>
					<input id="rating3" type="radio" name="rating" value="3">
					<label for="rating3">3</label>
					<input id="rating2" type="radio" name="rating" value="2">
					<label for="rating2">2</label>
					<input id="rating1" type="radio" name="rating" value="1">
					<label for="rating1">1</label>
				</span>
			</div>
			<hr>
			<div class="description">
				<p>{!! $product->description !!}</p>
			</div>
			<div class="clearfix"> </div>

			<div class="animated wow slideInUp animated product-show" data-wow-delay=".5s">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Mô tả</a>
						</li>
						<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Thông số kỹ thuật</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
							<p>{!!  $product->information !!}</p>
						</div>
						<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
							<p>{!! $product->digital !!}</p>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
	<div class="container">
		<hr><hr>
		<div class="col-sm-12 other-product">
			<div class="span-other-product">
				<span>Một số mẫu cùng loại</span>
			</div>
			<div class="single-pro">

				@foreach($others as $key => $product)
					<div class="col-md-3 product-men yes-marg">
						<div class="men-pro-item simpleCart_shelfItem">
							<div class="men-thumb-item">
								<img src="{{ asset('upload/images/products/'. $product->image_name) }}" alt="" class="pro-image-front">
								<img src="{{ asset('upload/images/products/'. $product->image_name) }}" alt="" class="pro-image-back">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="{{ URL::route('product_detail', [$product->slug, $product->id]) }}" class="link-product-add-cart">CHI TIẾT</a>
									</div>
								</div>
								<span class="product-new-top">New</span>
							</div>
							<div class="item-info-product ">
								<h4>
									<a href="{{ URL::route('product_detail', [$product->slug, $product->id]) }}">{{ $product->name }}</a>
								</h4>
							</div>
						</div>
					</div>
				@endforeach
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<!-- //single -->

@endsection

@section('js')
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
	<script src="{{ asset('js/imagezoom.js') }}"></script>
	<script src="{{ asset('js/jquery.flexslider.js') }}"></script>
@endsection

