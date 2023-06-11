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
                            <li class="breadcrumb-item"><a href="{{route('detailContent', [$content->city->province->slug, $content->city->slug,
                                $content])}}"
                                class="text-decoration-none">{{$content->title}}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('showPenginapan', [$content->city->province->slug, $content->city->slug,
                                $content])}}">Penginapan</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{$penginapan->name}}
                            </li>
                        </ol>
                    </nav>
                    <div class="float-right mt-3">
                        
                        <a href="{{ route('details', [
                            $content->city->province->slug,
                            $content->city->slug,
                            $content->slug,
                            $penginapan->slug,
                            $penginapan->transaction
                        ]) }}" class="btn btn-success" style="float:right; color:white; padding-left: 40px; padding-right: 40px;">Pesan</a>
                        
                    </div>
                    <h1>{{$penginapan->name}}</h1>
                    <h6 class="text-muted">{{ $penginapan->created_at->diffForHumans()}} By {{$penginapan->user->name}}</h6>
                    <span class="text-muted">{{$content->city->province->name}}, {{$content->city->name}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="picture mb-3">
                        <img src="{{$penginapan->getThumbnail()}}" alt="{{$penginapan->name}}" class="img-fluid img-responsive">
                    </div>
                    <div class="article mb-5">
                        <span class="text-muted">
                            {!! $penginapan->deskripsi !!}
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Info
                        </div>
                        <div class="card-body" style="background-color: #ffffff; color: black; padding-top: 0px">
                            <ul>
                                <br><br>
                                <h6 class="text-muted">Alamat</h6>
                                {{$penginapan->alamat}}<br><br><br>
                                <h6 class="text-muted">No. Telepon</h6>
                                {{$penginapan->hp}}<br><br>
                            </ul>
                        </div>
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