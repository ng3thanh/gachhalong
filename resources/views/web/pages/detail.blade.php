@extends('web.layout') 
@section('title', 'Gạch Hạ Long')

@section('content')
<!-- product-nav -->

<div class="product-easy">
	<div class="container">

		<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script type="text/javascript">
    							$(document).ready(function () {
    								$('#horizontalTab').easyResponsiveTabs({
    									type: 'default', //Types: default, vertical, accordion           
    									width: 'auto', //auto or any width like 600px
    									fit: true   // 100% fit in a container
    								});
    							});
    							
    		</script>
		<div class="sap_tabs">
			<div id="horizontalTab"
				style="display: block; width: 100%; margin: 0px;">
				<ul class="resp-tabs-list">
					
				</ul>
				<div class="resp-tabs-container">
						
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //product-nav -->

<div class="coupons">
	<div class="container">
		<div class="coupons-grids text-center">
			<div class="col-md-3 coupons-gd">
				<h3>Buy your product in a simple way</h3>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<h4>LOGIN TO YOUR ACCOUNT</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
					consectetur.</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				<h4>SELECT YOUR ITEM</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
					consectetur.</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
				<h4>MAKE PAYMENT</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
					consectetur.</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

@endsection 

@section('script') @endsection
