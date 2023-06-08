@extends('template.admin.default')
@section('title')
    <h1><i class="fa fa-list"></i>Edit Status Publish</h1>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('Edit Status Penginapan', $penginapan) }}
@endsection
@section('content')
<div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">  Form Edit Status</h3>
      <div class="tile-body">
        <form action="{{ route('penginapan.updateStatus', $penginapan)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="control-label">Pilih Status</label>
                <select name="status" id="" class="form-control">
                    <option value="0">Belum Publish</option>
                    <option value="1">Publish</option>
                </select>
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('penginapan.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
        </form>
      </div>
</div>
@endsection