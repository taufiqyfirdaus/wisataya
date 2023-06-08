@extends('template.frontend.default')
@section('content')
<main role="main" class="main">
    <section class="jumbotron text-center mb-5 bg-light ">
        <div class="container" style="margin-top: 80px;">
            <img src="/wisataya/public/images/Wisataya1.svg" width="300" style="margin-bottom: 3px">
            <p class="lead" style="color: rgb(255, 255, 255)">
                Penginapan di dekat {{$content->title}}.
            </p>
        </div>
    </section>
    {{-- budaya --}}
    <div class="container">
        <div class="row">
            @foreach ($penginapans as $penginapan)
                <div class="col-md-4">
                    <div class="shadow card mb-4">
                        <div class="d-flex flex-wrap">
                            <img src="{{$penginapan->getThumbnail()}}" alt="{{$penginapan->name}}" 
                            class="card-img-top">
                            <h4 class="text-image position-absolute">{{$penginapan->content->title}}</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$penginapan->name}}</h5>
                            <p class="card-text">{!! Str::words($penginapan->deskripsi, 10) !!}</p>
                            <a href="{{route('detailPenginapan', [$penginapan->content->slug, $penginapan])}}" class="btn btn-primary">Explore</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="float-right">
                    <a href="{{ route('otherBudaya')}}" class="btn btn-info" style="float:right; color:white;"> >>> Other Content</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('styles')
    <style>
        img{
            max-height: 200px;
        }
        .text-image{
            font-size: 16px;
            margin-left: 5px;
            margin-top: 175px;
            color: #fff;
            background-color: black;
        }
        .jumbotron{
            margin-top: 61px;
            padding-top: 50px;
            padding-bottom: 50px;
        }
    </style>
@endpush