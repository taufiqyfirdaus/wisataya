@extends('template.frontend.default')
@section('content')
<main role="main" class="main">
    <section class="jumbotron text-center bg-light " style="margin-bottom: 0px">
        <div class="container" style="margin-top: 80px;">
            {{-- <img src="/wisataya/public/images/Wisataya1.svg" width="300" style="margin-bottom: 3px"> --}}
            <h2 class="judul" style="color: #EFEBD8; font-size: 30pt">
                Menjelajahi Wisata dan Budaya: Temukan <br> 
                Cerita Tersembunyi di Setiap Sudutnya
            </h2>
        </div>
    </section>
    <section class="jumbotron text-center mb-5" style="height: 400px; margin-top: 0px; background-image: none; background-color: #124747; ">
        <div class="container" style="max-width: 200px; float: left; display: flex;">
            <img src="images/wst.png" style="margin-bottom: 3px; margin-left: 350px; margin-right: auto; display:block; margin-bottom: 30px; max-height: 300px;">
        </div>
        <div class="container" style="margin-top: px; float: right; max-width: 450px; margin-right: 300px;">
            <h1 class="judul1">Liburan tenang <br> dengan Wisataya</h1>
            <p class="lead" style="color: rgb(255, 255, 255)">
                Wisataya adalah website yang mengenalkan sebuah
                <br> kebudayaan, wisata, penginapan di tempat terdekat. <br><br>  
                Wisataya akan membantu anda untuk medapatkan <br>
                wisata atau budaya yang anda inginkan beserta dengan <br>
                tempat penginapan agar liburan anda tidak terganggu <br>
                dengan tempat untuk beristirahat.
            </p>
        </div>
    </section>
    <div class="container">
        <h1 class="judul">Indonesia</h1><hr>
        <p style="text-align: center; font-size: 14pt">Budaya dan wisata Indonesia menghadirkan kekayaan yang luar biasa. Dalam hal budaya, 
            Indonesia memiliki beragam etnis dengan bahasa, adat 
            istiadat, dan tradisi yang unik. Agama dan kepercayaan 
            yang beragam juga memengaruhi kehidupan sehari-hari dan 
            perayaan tradisional. Seni, tari tradisional, dan kerajinan 
            tangan merupakan bagian penting dari kebudayaan Indonesia.</p>
            <img src="images/indonesia-transformed.png" width="350" style="margin-bottom: 3px; margin-left: auto; margin-right: auto; display:block; margin-bottom: 30px">
            <img src="images/panah.svg" width="40" style="margin-bottom: 3px; margin-left: auto; margin-right: auto; display:block; margin-bottom: 50px">
    </div>
    {{-- wisata --}}
    <div class="container">
        <h1 class="judul">Pariwisata Indonesia</h1><hr>
        <div class="row">
            @foreach ($contents as $content)
                <div class="col-md-4">
                    <div class="shadow card mb-4">
                        <div class="d-flex flex-wrap">
                            <img src="{{$content->getThumbnail()}}" alt="{{$content->title}}" 
                            class="card-img-top">
                            <h4 class="text-image position-absolute" style="padding-right: 10px; padding-left: 10px;">{{$content->city->name}}</h4>
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
        <h1 class="judul">Kebudayaan Indonesia</h1><hr>
        <div class="row">
            @foreach ($budayas as $budaya)
                <div class="col-md-4">
                    <div class="shadow card mb-4">
                        <div class="d-flex flex-wrap">
                            <img src="{{$budaya->getThumbnail()}}" alt="{{$budaya->title}}" 
                            class="card-img-top">
                            <h4 class="text-image position-absolute" style="padding-right: 10px; padding-left: 10px;">{{$budaya->city->name}}</h4>
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
    <link href='https://fonts.googleapis.com/css?family=Kaushan Script' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@700&display=swap" rel="stylesheet">
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
        .judul {
            font-family: 'Kaushan Script';
            color: #1f1f1f;
            font-size: 35;
            text-align: center;
        }
        .judul1 {
            font-family: 'Libre Franklin', sans-serif;
            font-weight: 700;
            color: #ffffff;
            font-size: 35;
            text-align: center;
        }
    </style>
@endpush