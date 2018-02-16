@extends('web.layout') 
@section('title', 'Gạch Hạ Long')
@section('css')
    <link href="{{ asset('css/news.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('content')
<div class="single">
    <!-- Page Content -->
    <div class="container">
        <div class="col-sm-10 col-sm-offset-1 document">
            @foreach($documents->chunk(2) as $documentData)
                @foreach($documentData as $document)
                    <div class="col col-md-6">
                        <div class="col col-md-12 row title">
                            <h2>
                                <a href="{{ URL::route('document_detail', [$document->slug, $document->id]) }}">{{ $document->title }}</a>
                            </h2>
                        </div>
                        <div class="col col-md-12 row publisher">
                            <h4>
                                <small>
                                    <span class="glyphicon glyphicon-time"></span>
                                    Đăng bởi Admin, {{ date('l h:i', strtotime($document->created_at)) }}.
                                </small>
                            </h4>
                        </div>
                        <div class="col col-md-12 row tag">
                            <span class="label label-danger">Tin tức</span>
                            <span class="label label-primary">Tài liệu</span>
                        </div>
                        <div class="clearfix"></div>
                        <hr id="hr-tag">
                        <div class="col-md-12">
                            <section class="col-md-4 text-center image">
                                <img width="100%" class="img-fluid rounded" src="{{ asset('/upload/images/news/'.$document->image) }}" alt="{{ $document->title }}">
                            </section>
                            <section class="col-md-8 doc-description">
                                {!! $document->description !!}
                            </section>
                        </div>
                    </div>
                @endforeach
                <hr class="col-md-12" id="hr-tag-end">
            @endforeach
        </div>
        <div class="col-sm-10 col-sm-offset-1 text-center">
            {{ $documents->links() }}
        </div>
    </div>
    <!-- /.container -->
</div>
@endsection

@section('js')

@endsection