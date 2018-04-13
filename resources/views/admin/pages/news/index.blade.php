@extends('admin.layout') @section('title', 'Danh sách bài giới thiệu')

@section('css') 
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
@endsection 

@section('content')
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
					<form role="form" class="form-horizontal" action="{{ URL::route('news.index') }}" method="get">
						<!-- text input -->
						<div>
							<div class="col-xs-4">
        						<div class="form-group">
        							<label class="col-sm-3 control-label"> Tên bài viết</label> 
        							<div class="col-sm-9">
        								<input type="text" name="news_title" class="form-control" placeholder="Tiêu đề ..." value="{{ Request::get('name') ? Request::get('name') : null }}">
        							</div>
        						</div>
    						</div>
    						<div class="col-xs-4">
    							<div class="form-group">
        							<label class="col-sm-3 control-label"> Thể loại</label> 
        							<div class="col-sm-9">
        								<select class="form-control" name="news_menu" style="width: 100%;">
        									<option value="">Tất cả</option>
											@foreach($type as $key => $value)
												<option value="{{ $key }}"> {{ $value }}</option>
											@endforeach
										</select>
        							</div>
        						</div>
    						</div>
    						<div class="col-xs-4">
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
						<hr>
						<div class="col-xs-4 col-xs-offset-4">
							<div class="col-xs-5">
								<button class="btn btn-block btn-info btn-sm" type="submit">
									<i class="fa fa-search"></i> &nbsp;&nbsp;Tìm kiếm
								</button>
							</div>
							<div class="col-xs-offset-2 col-xs-5">
								<a href="{{ URL::route('news.create') }}" class="btn btn-block btn-success btn-sm col-xs-offset-1 col-xs-1">
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
							<th>Tiêu đề</th>
							<th>Thể loại</th>
							<th>Mô tả ngắn</th>
							<th>Ảnh</th>
							<th>Ngày hiển thị</th>
							<th>Ngày kết thúc</th>
							<th>Hành động</th>
						</tr>
						@foreach($news as $new)
						<tr class="body-table">
							
							<td>{{ $number++ }}</td>
							<td class="text-left">
								<a href="{{ URL::route('introduce') }}" target="_blank">
									<span class="short-text" style="width: 200px;">{{ $new->title }}</span>
								</a>
							</td>
							<td>{{ strtoupper($new->type) }}</td>
							<td>
								<span class="short-text" style="width: 300px;">{!! $new->description !!}</span>
							</td>
							<td>
								<img src="{{ asset('upload/images/news/'.$new->image) }}" alt="{{ $new->title }}" width="50px" height="50px">
							</td>
							<td>{{ date('d/m/Y', strtotime($new->created_at)) }}</td>
							<td>{{ date('d/m/Y', strtotime($new->updated_at)) }}</td>
							
							<td>
								<a href="{{ URL::route('news.edit', $new->id) }}" class="btn btn-block btn-warning btn-xs">Sửa</a>
								<a href="{{ URL::route('news.destroy', $new->id) }}" class="btn btn-block btn-danger btn-xs">Xóa</a>
							</td>
						</tr>
						@endforeach
					</table>
					<div class="text-center">
						{{ 
							$news->appends(
                            	array("name" => Request::get('name'),
                                      "status" => Request::get('status'),
                                      "publish_time" => Request::get('publish_time'),
                                      "price" => Request::get('price')
                                 )
                            )->links() 
                        }}
					</div>
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
