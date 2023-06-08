@extends('template.admin.default')
@section('title')
    <h1><i class="fa fa-list"></i>Edit Data User</h1>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('Edit Data User', $user) }}
@endsection
@section('content')
<div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">  Form Edit Data User</h3>
      <div class="tile-body">
        <form action="{{ route('user.update', $user)}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="control-label">Nama User</label>
                <input class="form-control @error ('name') is-invalid @enderror" name="name" type="text" placeholder="Masukkan Nama User" value="{{$user->name}}">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">Email</label>
                <input class="form-control @error ('email') is-invalid @enderror" name="email" type="text" placeholder="Masukkan Email User" value="{{$user->email}}">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">Password</label>
                <input class="form-control @error ('password') is-invalid @enderror" name="password" type="password" placeholder="Masukkan Password">
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">Ulangi Password</label>
                <input class="form-control @error ('password_confirm') is-invalid @enderror" name="password_confirm" type="password" placeholder="Ulangi Password">
                @error('password_confirm')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">Hak Akses</label>
                <select name="role" id="" class="form-control @error ('role') is-invalid @enderror">
                    <option selected value="0">-- Pilih Hak Akses --</option>
                    @foreach ($roles as $role)
                        <option value="{{$role->name}}"
                            @if ($role->name == $user_role->role_name)
                                selected
                            @endif
                            >{{$role->name}}</option>
                    @endforeach
                </select>
                @error('role')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">Foto</label>
                <input class="form-control @error ('image') is-invalid @enderror" name="image" type="file">
                @error('image')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="tile-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('user.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
        </form>
      </div>
</div>
@endsection