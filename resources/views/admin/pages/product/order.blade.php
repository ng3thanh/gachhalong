@extends('admin.layout') @section('title', 'Sắp xếp sản phẩm')

@section('css')
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box" style="padding:20px">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr class="header-table">
                                <th width="10%">ID</th>
                                <th width="50%">Tên sản phẩm</th>
                                <th width="15%">Hình ảnh</th>
                                <th width="10%">Sắp xếp cũ</th>
                                <th width="15%">Trạng thái</th>
                            </tr>
                            @foreach($products as $key => $listProduct)
                                <tr class="body-table" style="background-color: #f4f4f4; font-weight: 600"><td colspan="5">{{ $menu[$key] }}</td></tr>
                                @foreach($listProduct as $product)
                                    <tr class="body-table">

                                        <td>{{ $number++ }}</td>
                                        <td class="text-left">
                                            <a href="{{ URL::route('product_detail', ['slug' => $product->slug, 'id' => $product->id]) }}" target="_blank">
                                                <span class="short-text" style="width: 200px;">{{ $product->name }}</span>
                                            </a>
                                        </td>
                                        <td><img alt="{{ $product->alt }}" width="50px" height="50px" src="{{ asset('upload/images/products/'. $product->image_name) }}"></td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" id="order-{{ $product->id }}" class="form-control" value="{{ $product->order }}">
                                                <span class="input-group-btn">
                                                    <button data-id="{{ $product->id }}" type="button" class="btn btn-info btn-flat order-change">@</button>
                                                </span>
                                            </div>
                                        <td>
                                            @if($product->status == 4)
                                                <span class="label label-danger">Đã xóa</span>
                                            @elseif($product->status == 3)
                                                <span class="label label-warning">Hết hiển thị</span>
                                            @elseif($product->status == 2)
                                                <span class="label label-info">Chưa hiển thị</span>
                                            @else
                                                <span class="label label-success">Đang hiển thị</span>
                                            @endif
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
        <div id="page-data" data-url="{{ URL::route('product.change.order') }}" data-token="{{ csrf_token() }}"></div>
    </section>
    <!-- /.content -->


@endsection

@section('script')
    <script>
        var pageData = $("#page-data");
        $('.order-change').click(function() {
            var url = pageData.data("url");
            var productId = $(this).data('id');
            var dataChange = $('#order-' + productId).val();
            var formData = {
                "_token": pageData.data("token"),
                'id' : productId,
                'data': dataChange
            }
            $.ajax({
                type        : 'POST',
                url         : url,
                data        : formData,
                dataType    : 'json',
                encode      : true,
            })
            // using the done promise callback
            .done(function(data) {

            });

            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
        });
    </script>
@endsection
