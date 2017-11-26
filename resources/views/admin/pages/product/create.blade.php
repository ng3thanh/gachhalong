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
					<form role="form" class="form-horizontal" action="{{ URL::route('product.create') }}" method="put">
						<!-- text input -->
						<div>
							<div class="col-xs-8">
								<div class="form-group">
									<label class="col-sm-3 control-label"> Tên sản phẩm</label>
									<div class="col-sm-9">
										<input type="text" name="name" class="form-control"
											placeholder="Tên sản phẩm ..." value="{{ old('name') }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Danh mục</label>
									<div class="col-sm-9">
										<select class="form-control select2" name="menu" style="width: 100%;">
											@foreach($menus as $key => $menu)
											<?php $check = $key - 1; ?>
											<optgroup label="{{ $allMenu[$key]->name }}">
												@foreach($menu as $k => $v)
													<option value="{{ !empty(old('menu')) ? old('menu') : $v->id }}">{{ $v->name }}</option>
												@endforeach
											</optgroup>
											@endforeach
										</select>
									</div>
								</div>
								<!-- /.form-group -->
								<div class="form-group">
									<label>Disabled</label> <select class="form-control select2"
										disabled="disabled" style="width: 100%;">
										<option selected="selected">Alabama</option>
										<option>Alaska</option>
										<option>California</option>
										<option>Delaware</option>
										<option>Tennessee</option>
										<option>Texas</option>
										<option>Washington</option>
									</select>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
							<div class="col-md-4">
								<div class="form-group">
									<label>Multiple</label> <select class="form-control select2"
										multiple="multiple" data-placeholder="Select a State"
										style="width: 100%;">
										<option>Alabama</option>
										<option>Alaska</option>
										<option>California</option>
										<option>Delaware</option>
										<option>Tennessee</option>
										<option>Texas</option>
										<option>Washington</option>
									</select>
								</div>
								<!-- /.form-group -->
								<div class="form-group">
									<label>Disabled Result</label> <select
										class="form-control select2" style="width: 100%;">
										<option selected="selected">Alabama</option>
										<option>Alaska</option>
										<option disabled="disabled">California (disabled)</option>
										<option>Delaware</option>
										<option>Tennessee</option>
										<option>Texas</option>
										<option>Washington</option>
									</select>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</form>
				</div>

				<!-- /.box-body -->

				<div class="box-footer">
					Visit <a href="https://select2.github.io/">Select2 documentation</a>
					for more examples and information about the plugin.
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
<script>
  	$(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
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

	var time = getUrlParameter('publish_time');

	if (typeof time !== "undefined") {
	    $('#reservationtime').val(time.replace(/\+/g, ' '));
	}

</script>
@endsection
