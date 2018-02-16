@extends('web.layout')
@section('title', 'Gạch Hạ Long')
@section('css')
    <link href="{{ asset('css/news.css') }}" rel="stylesheet" type="text/css" media="all"/>
@endsection
@section('js')

@endsection

@section('content')
    <div class="single">
        <!-- Page Content -->
        <div class="container">
            <!-- Post Content Column -->
            <div class="col-sm-10 row col col-sm-offset-1 new-detail">
                <!-- Title -->
                <div class="title">
                    <h1 class="mt-4">{{ $intro->title }}</h1>
                </div>
                <div class="publisher">
                    Posted on {{ date('l jS \of F Y h:i:s A', strtotime($intro->created_at)) }} by <a href="#">Admin</a>
                </div>
                <div class="tag">
                    <h5>
                        <span class="label label-danger">Tin tức</span>
                        <span class="label label-primary">Giới thiệu</span>
                    </h5>
                </div>

                <hr>

                <!-- Preview Image -->
                <div class="image text-center">
                    <img class="img-fluid rounded" src="{{ asset('/upload/images/news/'.$intro->image) }}"
                         alt="{{ $intro->title }}" width="500px">
                </div>

                <hr>
                <div class="content">
                    {!! $intro->content !!}
                </div>
                <hr>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
@endsection 