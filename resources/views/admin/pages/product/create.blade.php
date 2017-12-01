@extends('admin.layout') @section('title', 'Thêm mới sản phẩm')

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
@endsection @section('content')
<section class="content">

	<!-- SELECT2 EXAMPLE -->
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Thêm mới sản phẩm</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool"
					data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove">
					<i class="fa fa-remove"></i>
				</button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="row">
				<div class="box-body">
					<form role="form" id="create-new-product" class="form-horizontal"
						action="{{ URL::route('product.store') }}" method="POST"
						enctype="multipart/form-data">
						{{ csrf_field() }}
						<!-- text input -->
						<div>
							<div class="col-xs-12">
								<div class="form-group">
									<label class="col-sm-3 control-label"> Tên sản phẩm</label>
									<div class="col-sm-9">
										<input type="text" name="name" class="form-control" placeholder="Tên sản phẩm ..." value="{{ old('name') }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Danh mục</label>
									<div class="col-sm-9">
										<select class="form-control select2" name="menu" style="width: 100%;">
											@foreach($menus as $key => $menu)
											<?php $check = $key - 1; ?>
											<optgroup label="{{ $allMenu[$check]->name }}">
												@foreach($menu as $k => $v)
												<option
													value="{{ !empty(old('menu')) ? old('menu') : $v->id }}">{{
													$v->name }}</option>
												@endforeach
											</optgroup> @endforeach
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label"> Giá</label>
									<div class="col-sm-9">
										<input type="text" name="price" class="form-control" placeholder="Giá ..." value="{{ old('price') }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label"> Mô tả</label>
									<div class="col-sm-9 box-body pad">
										<textarea id="ckediter" name="description" rows="10" cols="80"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label"> Thông tin</label>
									<div class="col-sm-9 box-body pad">
										<textarea id="ckediter1" name="information" rows="10" cols="80"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label"> Thông số kỹ thuật </label>
									<div class="col-sm-9 box-body pad">
										<textarea id="ckediter2" name="digital" rows="10" cols="80"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label"> Ảnh chính </label>
									<div class="col-sm-9">
										<input type="file" name="main-img">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label"> Ảnh phụ </label>
									<div class="col-sm-9">
										<input type="file" name="more-img[]" multiple>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label"> Thời gian đăng</label>
									<div class="col-sm-9">
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</div>
											<input type="text" class="form-control pull-right" id="reservationtime" name="publish_time">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label"> Trạng thái</label>
									<div class="col-sm-9">
										<div class="col-sm-3">
											<div class="input-group">
												<span class="input-group-addon"> 
													<input type="checkbox" checked="checked" name="status" value="1">
												</span> 
												<input type="text" style="background-color: #00a65a" class="form-control" disabled value="Đang hiện">
											</div>
											<!-- /input-group -->
										</div>
										<div class="col-sm-3">
											<div class="input-group">
												<span class="input-group-addon"> 
													<input type="checkbox" name="status" value="2">
												</span> 
												<input type="text" class="form-control" style="background-color: #00c0ef" disabled value="Chưa hiện">
											</div>
											<!-- /input-group -->
										</div>
										<div class="col-sm-3">
											<div class="input-group">
												<span class="input-group-addon"> 
													<input type="checkbox" name="status" value="3">
												</span> 
												<input type="text" class="form-control" style="background-color: #f39c12" disabled value="Không hiện">
											</div>
											<!-- /input-group -->
										</div>
										<div class="col-sm-3">
											<div class="input-group">
												<span class="input-group-addon"> 
													<input type="checkbox" name="status" value="4">
												</span> 
												<input type="text" class="form-control" style="background-color: #dd4b39" disabled value="Đã xóa">
											</div>
											<!-- /input-group -->
										</div>
									</div>
								</div>
								<!-- /.form-group -->
							</div>
						</div>
						<!-- /.row -->
					</form>

					<div class="box-footer col-xs-12"
						style="margin-top: 20px; padding-top: 20px">
						<div class="col-xs-8 col-xs-offset-2">
							<div class="col-xs-3">
								<button class="btn btn-block btn-default"
									form="create-new-product" type="submit">Thêm mới</button>
							</div>
							<div class="col-xs-offset-1 col-xs-3">
								<button class="btn btn-block btn-default">Làm lại</button>
							</div>
							<div class="col-xs-offset-1 col-xs-3">
								<a href="{{ URL::route('product.index') }}"
									class="btn btn-block btn-default">Quay về</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.box -->
		</div>
	</div>
</section>
@endsection @section('script')
<script src="{{ asset('admin/js/select2.full.min.js') }}"></script>

<!-- date-range-picker -->
<script src="{{ asset('admin/js/daterangepicker.js') }}"></script>

<!-- CK Editor -->
<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
  	$(function () {
  	  	// CKEditer
  	  	CKEDITOR.replace('ckediter');
  	  	CKEDITOR.replace('ckediter1');
  	  	CKEDITOR.replace('ckediter2');
        //Initialize Select2 Elements
        $('.select2').select2();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' });
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

	var time = getUrlParameter('publish_time');

	if (typeof time !== "undefined") {
	    $('#reservationtime').val(time.replace(/\+/g, ' '));
	}

	$('input[name="status"]').on('change', function() {
		$('input[name="status"]').not(this).prop('checked', false);
	});
</script>
@endsection
