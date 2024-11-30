<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('body').on('click', '.delete-item', function(e) {
        e.preventDefault();

        // Global variable
        let form = $(this).closest('form');

        Swal.fire({
            title: "{{ __('Are you sure?') }}",
            text: "{{ __('You will not be able to revert this!') }}",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#be123c",
            cancelButtonColor: "#bbbbbb",
            confirmButtonText: "{{ __('Yes, delete it!') }}",
            cancelButtonText: "{{ __('Cancel') }}"

        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    })
</script>
