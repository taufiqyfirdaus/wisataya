@extends('template.frontend.default')
@section('content')
<main role="main" class="main">
    <section class="jumbotron text-center mb-5 bg-light ">
        <div class="container" style="margin-top: 80px;">
            <img src="/wisataya/public/images/Wisataya1.svg" width="300" style="margin-bottom: 3px">
            <p class="lead" style="color: rgb(255, 255, 255)">
                Negara Kesatuan Republik Indonesia merupakan salah satu surga wisata
                 dunia. Beragam Destinasi Wisata dan Budaya ada di Negara ini.
            </p>
        </div>
    </section>
    {{-- wisata --}}
    <div class="container">
        <h1><strong>Pariwisata Indonesia</strong></h1><hr>
        <div class="row">
            @foreach ($contents as $content)
                <div class="col-md-4">
                    <div class="shadow card mb-4">
                        <div class="d-flex flex-wrap">
                            <img src="{{$content->getThumbnail()}}" alt="{{$content->title}}" 
                            class="card-img-top">
                            <h4 class="text-image position-absolute">{{$content->city->name}}</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$content->title}}</h5>
                            <p class="card-text">{!! Str::words($content->content, 10) !!}</p>
                            <a href="{{route('detailContent', [$content->city->province->slug, $content->city->slug,
                            $content])}}" class="btn btn-primary">Explore</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="float-right">
                    <a href="{{ route('otherContent')}}" class="btn btn-info" style="float:right; color:white;"> >>> Other Content</a>
                </div>
            </div>
        </div>
    </div>
    {{-- budaya --}}
    <div class="container">
        <h1><strong>Kebudayaan Indonesia</strong></h1><hr>
        <div class="row">
            @foreach ($budayas as $budaya)
                <div class="col-md-4">
                    <div class="shadow card mb-4">
                        <div class="d-flex flex-wrap">
                            <img src="{{$budaya->getThumbnail()}}" alt="{{$budaya->title}}" 
                            class="card-img-top">
                            <h4 class="text-image position-absolute">{{$budaya->city->name}}</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$budaya->title}}</h5>
                            <p class="card-text">{!! Str::words($budaya->content, 10) !!}</p>
                            <a href="{{route('detailBudaya', [$budaya->city->province->slug, $budaya->city->slug,
                            $budaya])}}" class="btn btn-primary">Explore</a>
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