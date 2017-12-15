@extends('admin.layout') 

@section('title', 'Thêm mới tin tức')

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
@endsection @section('content')
<section class="content">

	<!-- SELECT2 EXAMPLE -->
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Thêm mới tin tức</h3>

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
						action="{{ URL::route('news.store') }}" method="POST"
						enctype="multipart/form-data">
						{{ csrf_field() }}
						<!-- text input -->
						<div>
							<div class="col-xs-12">
								<div class="form-group">
									<label class="col-sm-3 control-label"> Tiêu đề</label>
									<div class="col-sm-9">
										<input type="text" name="news_title" class="form-control" placeholder="Tiêu đề ..." value="{{ old('name') }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Danh mục</label>
									<div class="col-sm-9">
										<select class="form-control" name="news_menu" style="width: 100%;">
											@foreach($type as $key => $value)
												<option value="{{ $key }}"> {{ $value }}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label"> Mô tả</label>
									<div class="col-sm-9 box-body pad">
										<textarea id="ckediter" name="news_description" rows="10" cols="80"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label"> Nội dung</label>
									<div class="col-sm-9 box-body pad">
										<textarea id="ckediter1" name="news_content" rows="10" cols="80"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label"> Ảnh tin tức </label>
									<div class="col-sm-9">
										<input type="file" name="news_main_img">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label"> Thời gian đăng</label>
									<div class="col-sm-9">
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</div>
											<input type="text" class="form-control pull-right" id="reservationtime" name="news_publish_time">
										</div>
									</div>
								</div>
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
								<a href="{{ URL::route('news.index') }}"
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
        //Initialize Select2 Elements
        $('.select2').select2();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' });
  	});
</script>
@endsection
