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
                                {{$budaya->title}}
                            </li>
                        </ol>
                    </nav>
                    <h1>{{$budaya->title}}</h1>
                    <h6 class="text-muted">{{ $budaya->created_at->diffForHumans()}} By {{$budaya->user->name}}</h6>
                    <span class="text-muted">{{$budaya->city->province->name}}, {{$budaya->city->name}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="picture mb-3">
                        <img src="{{$budaya->getThumbnail()}}" alt="{{$budaya->title}}" class="img-fluid img-responsive">
                    </div>
                    <div class="article mb-5">
                        <span class="text-muted">
                            {!! $budaya->content !!}
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Lainnya
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($budayas as $item)
                                <li class="list-group-item">
                                    <a href="{{route('detailBudaya', [$item->city->province->slug, 
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
                                    <a href="{{route('getBudayaProvince', $item)}}" class="text-decoration-none">
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