@extends('web.layout') 
@section('title', 'Danh sách sản phẩm Gạch Hạ Long')
@section('robots')
	<meta name="robots" content="all" />
@endsection
@section('css')
	<link href="{{ asset('css/list-product.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('content')
<!-- mens -->
<div class="men-wear">
	<div class="container">
		<div class="col-md-4">
            <div class="menu-list-product">
                <h4>Danh mục</h4>
                <ul class="menu-list-type">
                    @foreach($parentMenu as $key => $value)
                    <li>
                        <label for="item-{{ $value->id }}"><span></span>{{ $value->name }}</label>
                        <ul class="menu-list-link">
                            @foreach($menuProduct[$value->id] as $k => $menu)
                                <li><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;<a href="{{ URL::route('product', [$menu->slug, $menu->id]) }}">{{ $menu->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
					@if($key < $parentMenu->count() - 1)
						<div class="hr-menu"></div>
					@endif
                    @endforeach
                </ul>
            </div>
            <div class="clearfix"></div>
		</div>

		<div class="col-md-8 products-right list-product-intro">
			<div class="sort-grid menu-name">
				{{--<div class="sorting">--}}
					{{--<h6>Sắp xếp</h6>--}}
					{{--<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">--}}
						{{--<option value="null">Mặc định</option>--}}
						{{--<option value="null">Tên (A - Z)</option>--}}
						{{--<option value="null">Tên (Z - A)</option>--}}
					{{--</select>--}}
					{{--<div class="clearfix"></div>--}}
				{{--</div>--}}
				{{--<div class="sorting">--}}
					{{--<h6>Hiển thị</h6>--}}
					{{--<select id="country2" onchange="change_country(this.value)" class="frm-field required sect">--}}
						{{--<option value="null">5</option>--}}
						{{--<option value="null">10</option>--}}
						{{--<option value="null">15</option>--}}
						{{--<option value="null">20</option>--}}
					{{--</select>--}}
					{{--<div class="clearfix"></div>--}}
				{{--</div>--}}
				{{--<div class="clearfix"></div>--}}
				<h4>{{ $menuNow->name }}</h4>
			</div>
			
			<div class="product-intro">
				<div class="col-sm-4 men-wear-left">
					<img class="img-responsive img-thumbnail" src="{{ asset('upload/images/menus/'. $menuNow->image) }}" alt="{{ $menuNow->name }}" />
				</div>
				<div class="col-sm-8 men-wear-right">
					<p>{!! $menuNow->description !!}</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		<div class="single-pro">
			<div class="sort-grid"></div>
			@foreach($products as $key => $product)
			<div class="col-md-3 product-men yes-marg">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img height="220px" width="220px" src="{{ asset('upload/images/products/'. $product->image_name) }}" alt="" class="pro-image-front">
						<img height="220px" width="220px" src="{{ asset('upload/images/products/'. $product->image_name) }}" alt="" class="pro-image-back">
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
		<div class="pagination-grid text-right">
			{{ $products->links() }}
		</div>
	</div>
</div>
<!-- //mens -->

@endsection
@section('js')

@endsection