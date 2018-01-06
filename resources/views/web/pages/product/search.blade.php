@extends('web.layout') 
@section('title', 'Danh sách sản phẩm Gạch Hạ Long') 
@section('css')

@endsection
@section('js')

@endsection

@section('content')
<!-- banner -->
<div class="page-head">
	<div class="container">

	</div>
</div>
<!-- //banner -->
<!-- mens -->
<div class="men-wear">
	<div class="container">
		<div class="single-pro">
			@if($products->count() > 0)
				@foreach($products as $key => $product)
				<div class="col-md-3 product-men yes-marg">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="{{ asset('upload/images/products/'. $product->image_name) }}" alt="" class="pro-image-front">
							<img src="{{ asset('upload/images/products/'. $product->image_name) }}" alt="" class="pro-image-back">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="{{ URL::route('product_detail', [$product->slug, $product->id]) }}" class="link-product-add-cart">Quick View</a>
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
			@else
				<div class="col-md-12" style="text-align: center">Không có sản phẩm nào được tìm thấy</div>
			@endif
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //mens -->

@endsection
