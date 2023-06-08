@extends('template.admin.default')
@section('title')
    <h1><i class="fa fa-list"></i>  Data Provinsi</h1>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('Provinsi') }}
@endsection
@section('content')
@include('sweetalert::alert')
<div class="col-md-12">
    <div class="tile">
        <a href="{{ route('province.create')}}" class="btn btn-success btn-sm mb-3">Tambah Data</a>
      <div class="tile-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Provinsi</th>
                <th>Slug</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
              @foreach ($provinces as $province)
              @php
                  $no++;
              @endphp
                  <tr>
                    <td>{{$no}}</td>
                    <td>{{$province->name}}</td>
                    <td>{{$province->slug}}</td>
                    <td>
                    <a href="{{ route('city.index', $province)}}" class="btn btn-info btn-sm"><i class="fa fa-list"></i>Kota</a>
                    <a href="{{ route('province.edit', $province)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>  Edit</a>
                    <button id="delete" href="{{route('province.destroy', $province)}}" class="btn btn-danger btn-sm" data-title="{{$province->name}}">
                    <i class="fa fa-trash"></i>Hapus</button>
                    </td>
                    <form method="post" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <input type="submit" style="display:none">
                    </form>
                  </tr>
              @endforeach
            </tbody>
          </table>
            
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('button#delete').on('click', function(){
            var href = $(this).attr('href');
            var title = $(this).data('title')

            swal({
                title : "Apakah Kamu Yakin Akan Menghapus Data Provinsi "+title+" ?",
                text : "Data Yang SUdah di Hapus Tidak Bisa Dikembalikan",
                icon : "warning",
                buttons : true,
                dangerMode : true,
            })

            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById('deleteForm').action = href;
                    document.getElementById('deleteForm').submit();
                    swal("Data Berhasil Dihapus", {
                        icon : "success",
                    });
                }
            });
        });
    </script>
@endpush