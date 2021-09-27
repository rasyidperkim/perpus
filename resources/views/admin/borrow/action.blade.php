<button href="{{ route('admin.borrow.return' , $model) }}" class="btn btn-info" id="return" style="margin:2px">Pengembalian</button>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('button#return').on('click', function(e){
        e.preventDefault();

        let href= $(this).attr('href');

        Swal.fire({
            title: 'Apakah Kamu Yakin Datanya Sudah Benar ?',
            text: "Pastikan bahwa data & buku yang dikembalikan sama ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Data Sudah Dicek!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('returnForm').action = href;
                document.getElementById('returnForm').submit();

                Swal.fire(
                'Dikembalikan !',
                'Buku Telah Dikembalikan',
                'success'
                )
            }
            })

        
    })
</script>