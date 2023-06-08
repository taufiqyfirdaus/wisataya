@extends('template.admin.default')
@section('title')
    <h1><i class="fa fa-list"></i> {{ $penginapan->name}}</h1>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('Lihat Data Penginapan', $penginapan) }}
@endsection
@section('content')
<div class="col-md-12">
    <div class="tile">
        <div class="timeline-post">
            <div class="post-media">
                <div class="content">
                    <h5>{{$penginapan->name}}</h5>
                    <p style="font-size: 9pt;">{{$penginapan->alamat}}</p>
                    <p class="text-muted"><small>{{$penginapan->created_at}} By {{$penginapan->user->name}}</small></p>
                </div>
            </div>
            <div class="post-content">
                <hr>
                <img src="{{$penginapan->getThumbnail()}}" class="img-thumbnail">
                <p>{!! $penginapan->deskripsi !!}</p>
                <p><strong>Telepon : {{$penginapan->hp}}</strong></p>
            </div>
        </div>
    </div>
</div>
@endsection