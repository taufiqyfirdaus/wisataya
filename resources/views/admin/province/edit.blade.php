@extends('template.admin.default')
@section('title')
    <h1><i class="fa fa-list"></i>Edit Data Provinsi</h1>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('Edit Data Provinsi', $province) }}
@endsection
@section('content')
<div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">  Form Edit Data Provinsi</h3>
      <div class="tile-body">
        <form action="{{ route('province.update', $province)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="control-label">Nama Provinsi</label>
                <input class="form-control @error ('province') is-invalid @enderror" name="province" type="text" placeholder="Masukkan Provinsi" value="{{$province->name}}">
                @error('province')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('province.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
        </form>
      </div>
</div>
@endsection