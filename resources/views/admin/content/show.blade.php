@extends('template.admin.default')
@section('title')
    <h1><i class="fa fa-list"></i> {{ $content->title}}</h1>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('Lihat Data Wisata', $content) }}
@endsection
@section('content')
<div class="col-md-12">
    <div class="tile">
        <div class="timeline-post">
            <div class="post-media">
                <div class="content">
                    <h5>{{$content->title}}</h5>
                    <p class="text-muted"><small>{{$content->created_at}} By {{$content->user->name}}</small></p>
                </div>
            </div>
            <div class="post-content">
                <hr>
                <img src="{{$content->getThumbnail()}}" class="img-thumbnail">
                <p>{!! $content->content !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection