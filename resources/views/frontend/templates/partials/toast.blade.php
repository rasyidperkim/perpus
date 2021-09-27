@if (session('toast'))
    <script>
        var toastHTML = '{{ session('toast') }}'
        M.toast({
            html: toastHTML,
            classes: 'amber darken-4',
        });
    </script>

@endif
