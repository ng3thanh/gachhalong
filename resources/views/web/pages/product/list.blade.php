@extends('web.layout') 
@section('title', 'Danh sách sản phẩm Gạch Hạ Long') 
@section('css') @endsection 
@section('js') @endsection

@section('content')
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Men's Wear</h3>
	</div>
</div>
<!-- //banner -->
<!-- mens -->
<div class="men-wear">
	<div class="container">
		<div class="col-md-4 products-left">
			<div class="css-treeview">
				<h4>Categories</h4>
				<ul class="tree-list-pad">
					@foreach($menuProduct as $groupMenu)
					<li>
    					<input type="checkbox" checked="checked" id="item-0" />
    					<label for="item-0"><span></span>{{ ($menu->id == $menu->parent_id) ? $menu->name : "" }}</label>
						<ul>
							<li>
								<input type="checkbox" id="item-0-0" />
								<label for="item-0-0">Ethinic Wear</label>
								<ul>
									<li><a href="mens.html">Shirts</a></li>
									<li><a href="mens.html">Caps</a></li>
									<li><a href="mens.html">Shoes</a></li>
									<li><a href="mens.html">Pants</a></li>
									<li><a href="mens.html">SunGlasses</a></li>
									<li><a href="mens.html">Trousers</a></li>
								</ul>
							</li>
							<li>
								<input type="checkbox" id="item-0-1" />
								<label for="item-0-1">Party Wear</label>
								<ul>
									<li><a href="mens.html">Shirts</a></li>
									<li><a href="mens.html">Caps</a></li>
									<li><a href="mens.html">Shoes</a></li>
									<li><a href="mens.html">Pants</a></li>
									<li><a href="mens.html">SunGlasses</a></li>
									<li><a href="mens.html">Trousers</a></li>
								</ul>
							</li>
							<li>
								<input type="checkbox" id="item-0-2" />
								<label for="item-0-2">Casual Wear</label>
								<ul>
									<li><a href="mens.html">Shirts</a></li>
									<li><a href="mens.html">Caps</a></li>
									<li><a href="mens.html">Shoes</a></li>
									<li><a href="mens.html">Pants</a></li>
									<li><a href="mens.html">SunGlasses</a></li>
									<li><a href="mens.html">Trousers</a></li>
								</ul>
							</li>
						</ul>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			<h5>Product Compare(0)</h5>
			<div class="sort-grid">
				<div class="sorting">
					<h6>Sort By</h6>
					<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">Default</option>
						<option value="null">Name(A - Z)</option>
						<option value="null">Name(Z - A)</option>
						<option value="null">Price(High - Low)</option>
						<option value="null">Price(Low - High)</option>
						<option value="null">Model(A - Z)</option>
						<option value="null">Model(Z - A)</option>
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="sorting">
					<h6>Showing</h6>
					<select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">7</option>
						<option value="null">14</option>
						<option value="null">28</option>
						<option value="null">35</option>
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			
			<div class="men-wear-bottom">
				<div class="col-sm-4 men-wear-left">
					<img class="img-responsive" src="images/men3.jpg" alt=" " />
				</div>
				<div class="col-sm-8 men-wear-right">
					<h4>Exclusive Men's Collections</h4>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
						accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
						quae ab illo inventore veritatis et quasi architecto beatae vitae
						dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
						aspernatur aut odit aut fugit.</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		<div class="single-pro">

			<div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="images/a8.png" alt="" class="pro-image-front"> <img
							src="images/a8.png" alt="" class="pro-image-back">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="single.html" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>
					</div>
					<div class="item-info-product ">
						<h4>
							<a href="single.html">Blazers</a>
						</h4>
						<div class="info-product-price">
							<span class="item_price">$45.99</span>
							<del>$69.71</del>
						</div>
						<a href="#" class="item_add single-item hvr-outline-out button2">Add
							to cart</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="images/mw1.png" alt="" class="pro-image-front"> <img
							src="images/mw1.png" alt="" class="pro-image-back">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="single.html" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>
					</div>
					<div class="item-info-product ">
						<h4>
							<a href="single.html">Sandals</a>
						</h4>
						<div class="info-product-price">
							<span class="item_price">$45.99</span>
							<del>$69.71</del>
						</div>
						<a href="#" class="item_add single-item hvr-outline-out button2">Add
							to cart</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="images/ep3.png" alt="" class="pro-image-front"> <img
							src="images/ep3.png" alt="" class="pro-image-back">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="single.html" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>
					</div>
					<div class="item-info-product ">
						<h4>
							<a href="single.html">Watches</a>
						</h4>
						<div class="info-product-price">
							<span class="item_price">$45.99</span>
							<del>$69.71</del>
						</div>
						<a href="#" class="item_add single-item hvr-outline-out button2">Add
							to cart</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="images/mw3.png" alt="" class="pro-image-front"> <img
							src="images/mw3.png" alt="" class="pro-image-back">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="single.html" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>
					</div>
					<div class="item-info-product ">
						<h4>
							<a href="single.html">Shoes</a>
						</h4>
						<div class="info-product-price">
							<span class="item_price">$45.99</span>
							<del>$69.71</del>
						</div>
						<a href="#" class="item_add single-item hvr-outline-out button2">Add
							to cart</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 product-men yes-marg">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="images/g3.png" alt="" class="pro-image-front"> <img
							src="images/g3.png" alt="" class="pro-image-back">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="single.html" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>

					</div>
					<div class="item-info-product ">
						<h4>
							<a href="single.html">Shirts</a>
						</h4>
						<div class="info-product-price">
							<span class="item_price">$45.99</span>
							<del>$69.71</del>
						</div>
						<a href="#" class="item_add single-item hvr-outline-out button2">Add
							to cart</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 product-men yes-marg">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="images/ep4.png" alt="" class="pro-image-front"> <img
							src="images/ep4.png" alt="" class="pro-image-back">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="single.html" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>

					</div>
					<div class="item-info-product ">
						<h4>
							<a href="single.html">Watches</a>
						</h4>
						<div class="info-product-price">
							<span class="item_price">$119.99</span>
							<del>$150.71</del>
						</div>
						<a href="#" class="item_add single-item hvr-outline-out button2">Add
							to cart</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 product-men yes-marg">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="images/mw2.png" alt="" class="pro-image-front"> <img
							src="images/mw2.png" alt="" class="pro-image-back">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="single.html" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>

					</div>
					<div class="item-info-product ">
						<h4>
							<a href="single.html">T shirts</a>
						</h4>
						<div class="info-product-price">
							<span class="item_price">$45.99</span>
							<del>$69.71</del>
						</div>
						<a href="#" class="item_add single-item hvr-outline-out button2">Add
							to cart</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 product-men yes-marg">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="images/g2.png" alt="" class="pro-image-front"> <img
							src="images/g2.png" alt="" class="pro-image-back">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="single.html" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>

					</div>
					<div class="item-info-product ">
						<h4>
							<a href="single.html"> Shirts</a>
						</h4>
						<div class="info-product-price">
							<span class="item_price">$45.99</span>
							<del>$69.71</del>
						</div>
						<a href="#" class="item_add single-item hvr-outline-out button2">Add
							to cart</a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="pagination-grid text-right">
			<ul class="pagination paging">
				<li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
				<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
			</ul>
		</div>
	</div>
</div>
<!-- //mens -->

@endsection
