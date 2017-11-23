@extends('admin.layout') @section('title', 'Danh sách sản phẩm')

@section('css') @endsection @section('content')
<?php
$timeNow = Carbon\Carbon::now()->toDateTimeString();
?>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="box-tools">
			<div class="input-group input-group-sm" style="width: 150px;">
				<input type="text" name="table_search"
					class="form-control pull-right" placeholder="Search">

				<div class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Danh sách sản phẩm</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th>ID</th>
							<th>Tên sản phẩm</th>
							<th>Giá</th>
							<th>Mô tả ngắn</th>
							<th>Ngày hiển thị</th>
							<th>Ngày kết thúc</th>
							<th>Trạng thái</th>
							<th>Hành động</th>
						</tr>
						@foreach($products as $product)
						<tr>
							<td>{{ $product->id }}</td>
							<td>{{ $product->name }}</td>
							<td>{{ $product->price ? $product->price : "Chưa cập nhật" }}</td>
							<td style=" white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display:block;
    width : 100px;">{{ $product->description }}</td>
							<td>{{ $product->publish_start }}</td>
							<td>{{ $product->publish_end }}</td>
							<td>
							@if(!empty($product->deleted_at)) 
								<span class="label label-danger">Đã xóa</span>
							@elseif($timeNow > $product->publish_end) 
								<span class="label label-warning">Hết hiển thị</span> 
							@elseif($product->publish_start > $timeNow) 
								<span class="label label-warning">Chưa hiển thị</span> 
							@else 
								<span class="label label-success">Đang hiển thị</span> 
							@endif
							</td>
							<td>
								<button type="button" class="btn btn-block btn-danger btn-xs">Sửa</button>
								<button type="button" class="btn btn-block btn-warning btn-xs">Xóa</button>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
</section>
<!-- /.content -->


@endsection @section('script') @endsection
