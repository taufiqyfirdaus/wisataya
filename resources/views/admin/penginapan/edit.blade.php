@extends('template.admin.default')
@section('title')
    <h1><i class="fa fa-list"></i>Edit Data Penginapan</h1>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('Edit Data Penginapan', $penginapan) }}
@endsection
@section('content')
<div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">  Form Edit Data Penginapan</h3>
      <div class="tile-body">
        <form action="{{ route('penginapan.update', $penginapan)}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="control-label">Pilih Wisata Terdekat</label>
                <select name="content" id="content" class="form-control @error ('content') is-invalid @enderror">
                    <option value="0">-- Pilih Wisata --</option>
                    @foreach ($contents as $content)
                        <option value="{{$content->id}}"
                            @if ($penginapan->content_id == $content->id)
                                selected
                            @endif
                            >{{$content->title}}</option> 
                    @endforeach
                </select>
                @error('content')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">Nama Penginapan</label>
                <input class="form-control @error ('name') is-invalid @enderror" name="name" type="text" placeholder="Masukkan Nama Penginapan" value="{{$penginapan->name}}">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <label class="control-label">Alamat</label>
                <input class="form-control @error ('alamat') is-invalid @enderror" name="alamat" type="text" placeholder="Masukkan Alamat Penginapan" value="{{$penginapan->alamat}}">
                @error('alamat')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">Deskripsi</label>
                <textarea class="form-control @error ('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi Penginapan">{{$penginapan->deskripsi}}</textarea>
                @error('deskripsi')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">No. Telepon</label>
                <input class="form-control @error ('hp') is-invalid @enderror" name="hp" type="text" placeholder="Masukkan No. Telepon Penginapan" value="{{$penginapan->hp}}">
                @error('hp')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">Harga per Malam</label>
                <input class="form-control @error ('harga') is-invalid @enderror" name="harga" type="text" placeholder="Masukkan Harga per Malam" value="{{$penginapan->harga}}">
                @error('harga')
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
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('penginapan.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
            .create( document.querySelector( '#deskripsi' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush