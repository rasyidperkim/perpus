@extends('admin.templates.default')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')

    <div class="card">
        <!-- .card-header -->
        <div class="card-header">
            <h3 class="card-title" style="margin-top:20px;">Data Peminjaman Buku</h3>
        </div>

        <!-- /.card-header -->
        <!-- .card-body -->
        <div class="card-body">


            <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="col-2">Id</th>
                        <th class="col-3">Nama</th>
                        <th class="col-5">Judul Buku</th>
                        <th class="col-2">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <form action="" method="POST" id="returnForm">
        @csrf
        @method("PUT")
        <input type="submit" value="Return" class="btn btn-info" style="display: none;" />
    </form>

@endsection

@push('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    @include('admin.templates.partials.alerts')
    <script>
        $(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.borrow.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'user'
                    },
                    {
                        data: 'book_title'
                    },
                    {
                        data: 'action'
                    },
                ]
            });
        });
    </script>
@endpush
