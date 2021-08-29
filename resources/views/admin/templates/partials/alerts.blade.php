<script>
@if (session('success'))
    $.notify({
        // options
        icon: "{{ asset('assets/dist/img/success-book.png') }}",
        message: '{{ session('success') }}',
 
    },{
        // settings
        icon_type: 'image',
        type: 'success',
        placement: {
		from: "top",
		align: "right"},
        z_index: 9999,
    });
@endif

@if (session('info'))
    $.notify({
            // options
            message: '{{ session('info') }}' 
        },{
            // settings
            type: 'info',
            placement: {
            from: "top",
            align: "right"},
            z_index: 9998,
        });
@endif

@if (session('danger'))
    $.notify({
            // options
            message: '{{ session('danger') }}' 
        },{
            // settings
            type: 'danger',
            placement: {
            from: "top",
            align: "right"},
            z_index: 9997,
        });
@endif
</script>