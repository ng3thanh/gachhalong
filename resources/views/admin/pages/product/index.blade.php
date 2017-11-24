@extends('admin.layout') @section('title', 'Danh sách sản phẩm')

@section('css') 
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
@endsection 

@section('content')
<?php
$timeNow = Carbon\Carbon::now()->toDateTimeString();
?>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<!-- general form elements disabled -->
			<div class="box box-warning">
				<div class="box-header with-border">
					<h3 class="box-title">Tìm kiếm</h3>
				</div>
				
				<div class="box-body">
					<form role="form" class="form-horizontal" action="{{ URL::route('product.index') }}" method="get">
						<!-- text input -->
						<div>
							<div class="col-xs-6">
        						<div class="form-group">
        							<label class="col-sm-2 control-label"> Tên sản phẩm</label> 
        							<div class="col-sm-10">
        								<input type="text" name="name" class="form-control" placeholder="Tên sản phẩm ...">
        							</div>
        						</div>
        						<div class="form-group">
        							<label class="col-sm-2 control-label"> Trạng thái</label> 
        							<div class="col-sm-10">
        								<div class="col-sm-3">
                                          	<div class="input-group">
                                                <span class="input-group-addon">
                                                  <input type="checkbox" name="status[]">
                                                </span>
                                            	<input type="text" class="form-control" disabled value="Đang hiện">
                                          	</div>
                                            <!-- /input-group -->
                                        </div>
                                        <div class="col-sm-3">
                                          	<div class="input-group">
                                                <span class="input-group-addon">
                                                  <input type="checkbox" name="status[]">
                                                </span>
                                            	<input type="text" class="form-control" disabled value="Chưa hiện">
                                          	</div>
                                            <!-- /input-group -->
                                        </div>
                                        <div class="col-sm-3">
                                          	<div class="input-group">
                                                <span class="input-group-addon">
                                                  <input type="checkbox" name="status[]">
                                                </span>
                                            	<input type="text" class="form-control" disabled value="Không hiện">
                                          	</div>
                                            <!-- /input-group -->
                                        </div>
                                        <div class="col-sm-3">
                                          	<div class="input-group">
                                                <span class="input-group-addon">
                                                  <input type="checkbox" name="status[]">
                                                </span>
                                            	<input type="text" class="form-control" disabled value="Đã xóa">
                                          	</div>
                                            <!-- /input-group -->
                                        </div>
        							</div>
        						</div>
    						</div>
    						<div class="col-xs-6">
        						<div class="form-group">
        							<label class="col-sm-2 control-label"> Thời gian đăng</label> 
        							<div class="col-sm-10">
        								<div class="input-group">
                                          	<div class="input-group-addon">
                                            	<i class="fa fa-clock-o"></i>
                                          	</div>
                                          	<input type="text" class="form-control pull-right" id="reservationtime" name="publish_time">
                                        </div>
        							</div>
        						</div>
        						<div class="form-group">
        							<label class="col-sm-2 control-label"> Giá</label> 
        							<div class="col-sm-10">
        								<div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                            <input type="text" class="form-control" placeholder="Từ" name="start_price">
                                            
                                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                            <input type="text" class="form-control"  placeholder="Đến" name="end_price">
                                      	</div>
        							</div>
        						</div>
    						</div>
						</div>
						<hr>
						<div class="col-xs-4 col-xs-offset-4">
							<div class="col-xs-5">
								<button class="btn btn-block btn-info btn-sm" type="submit">
									<i class="fa fa-search"></i> &nbsp;&nbsp;Tìm kiếm
								</button>
							</div>
							<div class="col-xs-offset-2 col-xs-5">
								<a href="{{ URL::route('product.create') }}" class="btn btn-block btn-success btn-sm col-xs-offset-1 col-xs-1">
									<i class="fa fa-plus"></i> &nbsp;&nbsp;Tạo mới
								</a>
							</div>
						</div>
					</form>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<!-- /.box -->
	</div>
	<hr>
	<div class="row">
		<div class="col-xs-12">
			<div class="box" style="padding:20px">
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr class="header-table">
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
						<tr class="body-table">
							<td>{{ $product->id }}</td>
							<td class="text-left">
								<span class="short-text" style="width: 200px;">{{$product->name }}</span>
							</td>
							<td>{{ $product->price ? $product->price : "Chưa cập nhật" }}</td>
							<td>
								<span class="short-text" style="width: 300px;">{{ $product->description }}</span>
							</td>
							<td>{{ $product->publish_start }}</td>
							<td>{{ $product->publish_end }}</td>
							<td>
    							@if(!empty($product->deleted_at)) 
    								<span class="label label-danger">Đã xóa</span> 
    							@elseif($timeNow > $product->publish_end) 
    								<span class="label label-warning">Không hiển thị</span> 
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


@endsection 

@section('script') 
<script src="{{ asset('admin/js/select2.full.min.js') }}"></script>

<!-- date-range-picker -->
<script src="{{ asset('admin/js/daterangepicker.js') }}"></script>
<script>
  	$(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' })
  	});
  
	var getUrlParameter = function getUrlParameter(sParam) {
    	var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
    
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
    
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
	};

	var time = getUrlParameter('publish_time').replace(/\+/g, ' ');
	if (time) {
		$('#reservationtime').val(time);
	}
// 	console.log();
</script>
@endsection
