<script>
@if (session('success'))
    $.notify({
        // options
        message: '{{ session('success') }}' 
    },{
        // settings
        type: 'success',
        placement: {
		from: "bottom",
		align: "right"},
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
            from: "bottom",
            align: "right"},
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
            from: "bottom",
            align: "right"},
        });
@endif
</script>