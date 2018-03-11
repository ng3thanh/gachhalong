@extends('admin.layout') 

@section('title', 'Dashboard')

@section('content')

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>{{ $menu }}</h3>
					<p>Menu</p>
				</div>
				<div class="icon">
					<i class="ion ion-alert-circled"></i>
				</div>
				<a href="{{ URL::route('menu.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>{{ $product }}</h3>
					<p>Products</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="{{ URL::route('product.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>{{ $member }}</h3>
					<p>Users</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="{{ URL::route('user.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>{{ $news }}</h3>
					<p>News</p>
				</div>
				<div class="icon">
					<i class="ion ion-pie-graph"></i>
				</div>
				<a href="{{ URL::route('news.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->

@endsection 

@section('script')
{{--<script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>--}}
@endsection
