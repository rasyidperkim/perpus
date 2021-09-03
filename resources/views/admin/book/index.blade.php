@extends('admin.templates.default')

@section('content')

    <div class="card">
        <!-- .card-header -->
        <div class="card-header">
            <h3 class="card-title" style="margin-top:20px;">Data Buku</h3>
            <a href="{{ route('admin.book.create') }}" class="btn btn-primary" style="margin: 10px;">Tambah Buku</a>
        </div>
        
        <!-- /.card-header -->
        <!-- .card-body -->
        <div class="card-body">
            
         
            <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                    <th class="col-1">Id</th>
                    <th class="col-2">Judul</th>
                    <th class="col-3">Deskripsi</th>
                    <th class="col-2">Penulis</th>
                    <th class="col-2">Sampul</th>
                    <th class="col-2">Aksi</th>
                    </tr>
                </thead>
             </table>
        </div>
        <!-- /.card-body -->
    </div>

    <form action="" method="POST" id="deleteForm">
        @csrf
        @method("DELETE")
        <input type="submit" value="Hapus" class="btn btn-danger" style="display: none;" />
    </form>
@endsection

@push('script')
    <script src="{{ asset('assets/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    @include('admin.templates.partials.alerts')
    <script>
        $(function () {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.book.data') }}",
                columns: [
                    {data:'DT_RowIndex', orderable:false, searchable:false},
                    {data:'title'},
                    {data:'description'},
                    {data:'author'},
                    {data:'cover'},
                    {data:'action'},
                ]
            });            
        });
    </script>
@endpush

