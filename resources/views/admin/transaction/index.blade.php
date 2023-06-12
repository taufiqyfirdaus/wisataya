@extends('template.admin.default')
@section('title')
    <h1><i class="fa fa-list"></i>  Data Transaksi</h1>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('Transaksi') }}
@endsection
@section('content')
@include('sweetalert::alert')
<div class="col-md-12">
    <div class="tile">
        {{-- <a href="{{ route('penginapan.create')}}" class="btn btn-success btn-sm mb-3">Tambah Data</a> --}}
      <div class="tile-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
                <tr>
                  <th>No</th>
                  <th>User</th>
                  <th>Penginapan</th>
                  <th>Check in</th>
                  <th>Check out</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
              @foreach ($transactions as $transaction)
              @php
                  $no++;
              @endphp
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->penginapan->name }}</td>
                    <td>{{ $transaction->checkin }}</td>
                    <td>{{ $transaction->checkout }}</td>
                    <td>{{ $transaction->harga }}</td>
                    <td>
                    <button id="delete" href="{{ route('transaction.destroy', $transaction)}}" class="btn btn-danger btn-sm" data-title="">
                    <i class="fa fa-trash"></i></button>
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
                title : "Apakah Kamu Yakin Akan Menghapus Data Transaksi "+title+" ?",
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