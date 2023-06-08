@extends('template.admin.default')
@section('title')
    <h1><i class="fa fa-list"></i>  Tambah Data Kabupaten/Kota di Provinsi {{$province->name}}</h1>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('Tambah Data', $province) }}
@endsection
@section('content')
<div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Form Tambah Data Kabupaten/Kota</h3>
      <div class="tile-body">
        <form action="{{ route('city.store', $province)}}" method="post" class="needs-validation" novalidate>
            @csrf
            <div class="form-group">
                <label class="control-label">Nama Kabupaten/Kota</label>
                <input type="hidden" name="province" value="{{$province->id}}">
                <input class="form-control @error ('city') is-invalid @enderror" name="city" type="text" placeholder="Masukkan Kabupaten/Kota">
                @error('city')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('city.index', $province)}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
        </form>
      </div>
</div>
@endsection