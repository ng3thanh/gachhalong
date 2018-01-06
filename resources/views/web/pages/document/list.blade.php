@extends('web.layout') 
@section('title', 'Gạch Hạ Long')
@section('css')

@endsection
@section('js')

@endsection

@section('content')
<div class="single">
    <!-- Page Content -->
    <div class="container">
        <div class="col-sm-10 col-sm-offset-1">
            @foreach($documents as $document)
                <div class="col col-md-12 row">
                    <div class="col col-md-12 row">
                        <h4>
                            <small>
                                <span class="glyphicon glyphicon-time"></span>
                                Post by Admin, {{ date('l h:i:s', strtotime($document->created_at)) }}.
                            </small>
                        </h4>
                    </div>
                    <hr>
                    <div class="col col-md-12 row">
                        <div class="col col-md-3 row text-center">
                            <img width="100px" class="img-fluid rounded" src="{{ asset('/upload/images/news/'.$document->image) }}" alt="{{ $document->title }}">
                        </div>
                        <div class="col col-md-9 row">
                            <h2><a href="{{ URL::route('document_detail', [$document->slug, $document->id]) }}">{{ $document->title }}</a></h2><br>
                            <h5>
                                <span class="label label-danger">Tin tức</span>
                                <span class="label label-primary">Tài liệu</span></h5>
                            <br>
                            {!! $document->description !!}
                            <br><br>
                        </div>
                    </div>
                </div>
            @endforeach
            <hr>
        </div>
    </div>
    <!-- /.container -->
</div>
@endsection 