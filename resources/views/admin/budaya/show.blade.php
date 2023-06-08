@extends('template.admin.default')
@section('title')
    <h1><i class="fa fa-list"></i> {{ $budaya->title}}</h1>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('Lihat Data Budaya', $budaya) }}
@endsection
@section('content')
<div class="col-md-12">
    <div class="tile">
        <div class="timeline-post">
            <div class="post-media">
                <div class="content">
                    <h5>{{$budaya->title}}</h5>
                    <p class="text-muted"><small>{{$budaya->created_at}} By {{$budaya->user->name}}</small></p>
                </div>
            </div>
            <div class="post-content">
                <hr>
                <img src="{{$budaya->getThumbnail()}}" class="img-thumbnail">
                <p>{!! $budaya->content !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection