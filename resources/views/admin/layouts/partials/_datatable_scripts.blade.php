@push('scripts')

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}

    <script type="text/javascript">
        $(document).ready(function(){

            $("body").on("click", ".btn-delete", function() {
                $this = $(this);

                swal({
                    title: 'Are you sure?',
                    text: "You may not be able to recover this?",
                    type: 'error',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Yes, delete it!',
                    // preConfirm: function () {
                    //     return fetch('/admin/' + $this.data('model') + '/' + $this.data('id'))
                    //         .then(function (response) {
                    //             if (!response.ok){
                    //                 throw new Error(response.statusText);
                    //             }
                    //             return response.json();
                    //     }).catch(function (error) {
                    //             swal.showValidationError(
                    //                 `Request failed: ${error}`
                    //             )
                    //         })
                    // }
                }).then(function (isConfirm) {
                    if(isConfirm.value) {
                        $.ajax({
                            method: "DELETE",
                            url: '/admin/' + $this.data('model') + '/' + $this.data('id'),
                            data: {'_token': '{{ csrf_token() }}'}
                        })
                            .done(function (msg) {
                                swal({
                                    title: 'Deleted!',
                                    text: 'Your record has been deleted.',
                                    type: 'success',
                                    confirmButtonClass: 'btn btn-success'
                                });

                                $('#datatable-buttons').DataTable().draw(false);
                            })
                            .fail(function () {
                                swal({
                                    title: 'Something Went Wrong!',
                                    text: "You're record could not be deleted.",
                                    type: 'warning',
                                    confirmButtonClass: 'btn btn-warning',
                                    confirmButtonText: 'Acknowledge'
                                })
                            });
                    }
                });

                return false;
            });
        });
    </script>


@endpush
