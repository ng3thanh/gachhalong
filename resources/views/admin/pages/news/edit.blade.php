@extends('admin.layout') 

@section('title', 'Cập nhật tin tức')

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
@endsection @section('content')
<section class="content">

	<!-- SELECT2 EXAMPLE -->
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Chỉnh sửa tin tức</h3>

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
					<form role="form" id="update-new-news" class="form-horizontal"
						action="{{ URL::route('news.update', $new->id) }}" method="POST"
						enctype="multipart/form-data">
						{{ csrf_field() }}
						{{ method_field('PATCH') }}
						<!-- text input -->
						<div>
							<div class="col-xs-12">
								<div class="form-group">
									<label class="col-sm-3 control-label"> Tiêu đề</label>
									<div class="col-sm-9">
										<input type="text" name="news_title" class="form-control" placeholder="Tiêu đề ..." value="{{ $new->title }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Danh mục</label>
									<div class="col-sm-9">
										<select class="form-control" name="news_menu" style="width: 100%;">
											@foreach($type as $key => $value)
												<option value="{{ $key }}" @if($new->type == $key) selected @endif > {{ $value }}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label"> Mô tả</label>
									<div class="col-sm-9 box-body pad">
										<textarea id="ckediter" name="news_description" rows="10" cols="80">{{ $new->description }}</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label"> Nội dung</label>
									<div class="col-sm-9 box-body pad">
										<textarea id="ckediter1" name="news_content" rows="10" cols="80">{{ $new->content }}</textarea>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-3 control-label"> Ảnh tin tức </label>
									<div class="col-sm-9">
										<img alt="{{ $new->title }}" width="100px" height="100px" src="{{ asset('upload/images/news/'. $new->image) }}">
										<input type="text" value="{{ $new->image }}" hidden="hidden" name="new_main_img_name">
										<br><hr>
										<input type="file" name="new_main_img">
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
											<input type="text" id="hidden-date" hidden="hidden" value="{{ date('m/d/Y', strtotime($new->publish_start)) }} - {{ date('m/d/Y', strtotime($new->publish_end)) }}">
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
									form="update-new-news" type="submit">Chỉnh sửa</button>
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
        $('#reservationtime').val($('#hidden-date').val());
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' });
  	});
</script>
@endsection
