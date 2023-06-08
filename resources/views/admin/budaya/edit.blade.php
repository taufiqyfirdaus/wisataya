@extends('template.admin.default')
@section('title')
    <h1><i class="fa fa-list"></i>Edit Data Budaya</h1>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('Edit Data Budaya', $budaya) }}
@endsection
@section('content')
<div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">  Form Edit Data Budaya</h3>
      <div class="tile-body">
        <form action="{{ route('budaya.update', $budaya)}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="control-label">Pilih Kota</label>
                <select name="city" id="city" class="form-control @error ('city') is-invalid @enderror">
                    <option value="0">-- Pilih Kabupaten/Kota --</option>
                    @foreach ($cities as $city)
                        <option value="{{$city->id}}"
                            @if ($budaya->city_id == $city->id)
                                selected
                            @endif
                            >{{$city->name}}</option> 
                    @endforeach
                </select>
                @error('city')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">Nama Budaya</label>
                <input class="form-control @error ('title') is-invalid @enderror" name="title" type="text" placeholder="Masukkan Nama Budaya" value="{{$budaya->title}}">
                @error('title')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">Deskripsi</label>
                <textarea class="form-control @error ('content') is-invalid @enderror" name="content" id="content" placeholder="Masukkan Deskripsi Budaya">{{$budaya->content}}</textarea>
                @error('content')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">Thumbnail</label>
                <input class="form-control @error ('thumbnail') is-invalid @enderror" name="thumbnail" type="file">
                @error('thumbnail')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('budaya.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
        </form>
      </div>
</div>
@endsection

@push('scripts')
    <script src="{{asset('admin/js/plugins/select2.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script>
        $('#city').select2();
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush