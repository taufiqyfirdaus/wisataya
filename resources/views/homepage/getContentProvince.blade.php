@extends('template.frontend.default')
@section('content')
<main role="main" class="main">
    <section class="jumbotron text-center mb-4 bg-light">
        <div class="container">
            <h1>{{ config('app.name')}}</h1>
            <p class="lead text-muted">
                Destinasi Wisata di Provinsi {{$province->name}}.
            </p>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-1 mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light" style="padding: 20px;">
                        <li class="breadcrumb-item"><a href="{{route('homepage')}}" 
                            class="text-decoration-none">{{config('app.name')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{$province->name}}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
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
        {{$contents->render('pagination::bootstrap-5')}}
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