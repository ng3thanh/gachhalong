@extends('admin.layout') 
@section('title', 'Chỉnh sửa menu')

@section('css')@endsection 

@section('content')
<section class="content">

	<!-- SELECT2 EXAMPLE -->
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Chỉnh sửa menu</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
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
					<form role="form" id="create-new-menu" class="form-horizontal" action="{{ URL::route('menu.update', $data->id) }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<!-- text input -->
						<div>
							<div class="col-xs-12">
								<div class="form-group">
									<label class="col-sm-3 control-label"> Tên menu</label>
									<div class="col-sm-9">
										<input type="text" name="menu_name" class="form-control" placeholder="Tên menu ..." value="{{ $data->name }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Thuộc về</label>
									<div class="col-sm-9">
										<select class="form-control select2" name="menu_menu" style="width: 100%;">
											<option value="0"> Menu mới</option> 
											@foreach($menus as $key => $menu)
												<option value="{{ $menu->id }}" @if($menu->id == $data->parent_id) selected @endif>{{ $menu->name }}</option> 
											@endforeach
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label"> Mô tả</label>
									<div class="col-sm-9 box-body pad">
										<textarea id="ckediter" name="menu_description" rows="10" cols="80">{{ $data->description }}</textarea>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-3 control-label"> Ảnh chính </label>
									
									<div class="col-sm-9">
										<img alt="{{ $data->name }}" width="100px" height="100px" src="{{ asset('upload/images/menus/'. $data->image) }}">
										<input type="text" value="{{ $data->image }}" hidden="hidden" name="menu_main_img_name">
										<br><hr>
										<input type="file" name="menu_main_img">
									</div>
								</div>
							</div>
						</div>
						<!-- /.row -->
					</form>

					<div class="box-footer col-xs-12" style="margin-top: 20px; padding-top: 20px">
						<div class="col-xs-8 col-xs-offset-2">
							<div class="col-xs-3">
								<button class="btn btn-block btn-default" form="create-new-menu" type="submit">Chỉnh sửa</button>
							</div>
							<div class="col-xs-offset-1 col-xs-3">
								<button class="btn btn-block btn-default">Làm lại</button>
							</div>
							<div class="col-xs-offset-1 col-xs-3">
								<a href="{{ URL::route('menu.index') }}" class="btn btn-block btn-default">Quay về</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.box -->
		</div>
	</div>
</section>
@endsection 

@section('script')
<!-- CK Editor -->
<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
  	$(function () {
  	  	// CKEditer
  	  	CKEDITOR.replace('ckediter');
  	});
</script>
@endsection
