<script type="text/javascript">
    var $table = $('#datatable-buttons');

    $(document).ready(function () {
        var params = {
            processing: true,
            serverSide: true,
            lengthMenu: [[25, 100, -1], [25, 100, "All"]],
            pageLength: 25,
            ajax: "{!! request()->fullUrl() !!}",
            dom: 'lBfrtip',
            oLanguage: {
                "sLengthMenu": "Show _MENU_",
            }
        };

        var addt_params = $table.data('params');

        if (typeof addt_params != 'undefined') {
            $.extend(params, addt_params);
        }
console.log(params);
        var $dataTable = $table.DataTable(params);

        $('body').on('click', '.btn-delete', function () {
            $this = $(this);
            swal("Are you sure?", {
                type: 'warning',
                buttons: {
                    cancel: "Cancel",
                    catch: {
                        text: "Yes, delete it",
                        value: "delete",
                    },
                },
            }).then((value) => {
                switch (value) {
                    case "delete":
                        $.ajax({
                            method: 'DELETE',
                            url: $this.data('url'),
                            success: function () {
                                swal("Deleted!", "Your record has been deleted.", "success");
                                $dataTable.row($this.parents('tr')).remove().draw();
                            },
                            error: function (jqXhr) {
                                swalError(jqXhr);
                            }
                        });
                        break;
                }
            });
        });
    });
</script>
