@extends('template.frontend.default')
@section('content')
    <main role="main" class="main">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12 mt-5 mb-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light" style="padding: 20px;">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}" 
                                class="text-decoration-none">{{config('app.name')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{$content->city->name}}
                            </li>
                        </ol>
                    </nav>
                    <div class="float-right mt-3">
                        <a href="{{ route('showPenginapan')}}" class="btn btn-info pr-4 pl-4" style="float:right; color:white;"> Penginapan</a>
                    </div>
                    <h1>{{$content->title}}</h1>
                    <h6 class="text-muted">{{ $content->created_at->diffForHumans()}} By {{$content->user->name}}</h6>
                    <span class="text-muted">{{$content->city->province->name}}, {{$content->city->name}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="picture mb-3">
                        <img src="{{$content->getThumbnail()}}" alt="{{$content->title}}" class="img-fluid img-responsive">
                    </div>
                    <div class="article mb-5">
                        <span class="text-muted">
                            {!! $content->content !!}
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Lainnya
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($contents as $item)
                                <li class="list-group-item">
                                    <a href="{{route('detailContent', [$item->city->province->slug, 
                                    $item->city->slug, $item])}}" class="text-decoration-none">
                                        {{$item->title}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                    <div class="card mb-5">
                        <div class="card-header">
                            Provinsi
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($provinces as $item)
                                <li class="list-group-item">
                                    <a href="{{route('getContentProvince', $item)}}" class="text-decoration-none">
                                        {{$item->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('styles')
    <style>
        .article{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 500;
            font-style: normal;
            font-size: 12pt;
        }
    </style>
@endpush