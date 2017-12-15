@extends('admin.layout') 

@section('title', 'Danh sách menu')

@section('css') 
@endsection 

@section('content')
<?php $number = 1; ?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box" style="padding:20px">
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr class="header-table">
							<th>ID</th>
							<th>Menu</th>
							<th>Ảnh menu</th>
							<th>Mô tả ngắn</th>
							<th>Hành động</th>
						</tr>
						@foreach($menus as $k => $v)
							<tr class="body-table">
								<td colspan="5" style="text-align: left; background-color: #f4f4f4">{{ $allMenu[$k-1]->name }}</td>
							<tr>
    						@foreach($v as $menu)
    						<tr class="body-table">
    							<td>{{ $number++ }}</td>
    							<td class="text-left">
    								<a href="{{ URL::route('product_detail', ['slug' => $menu->slug, 'id' => $menu->id]) }}" target="_blank">
    									<span class="short-text" style="width: 200px;">{{ $menu->name }}</span>
    								</a>
    							</td>
    							<td><img src="{{ asset('upload/images/menus/'.$menu->image) }}" alt="{{ $menu->name }}" width="50px" height="50px"></td>
    							<td>
    								<span class="short-text" style="width: 300px;">{!! $menu->description !!}</span>
    							</td>
    							<td>
    								<a href="{{ URL::route('menu.edit', $menu->id) }}" class="btn btn-block btn-warning btn-xs">Sửa</a>
    								<a href="{{ URL::route('menu.destroy', $menu->id) }}" class="btn btn-block btn-danger btn-xs">Xóa</a>
    							</td>
    						</tr>
    						@endforeach
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
