<script>
    /**
     *
     * You can write your JS code here, DO NOT touch the default style file
     * because it will make it harder for you to update.
     * 
     */

    "use strict";

    $(".confirm-delete").click(function(e) {
        e.preventDefault();
        var form = $(this).closest("form");

        swal({
                title: 'Are you sure?',
                text: 'Once deleted, you won\'t be able to recover this data',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit()
                }
            });
    });
</script>