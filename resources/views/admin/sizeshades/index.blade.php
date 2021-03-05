@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <div class="row">
                            <div class="col-auto mr-auto text-white">
                                <h2>Size Shade</h2>
                            </div>
                            <div class="col-auto ">
                                <a href="{{route('admin.sizeshades.create')}}"
                                   class="btn btn-outline-secondary">
                                    <i class="fas fa-plus-circle"></i> Create New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('route' => ['admin.sizeshades.bulksave'],'method' =>'POST', 'id' => 'sizeshades-form')) !!}
                        {!! $dataTable->table(['class' => 'table table-striped table-bordered', 'id' => 'datatable-buttons']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @include('layouts.backPartials._datatable_scripts')
    <script>
        $(document).ready(function () {
            $('#datatable-buttons thead tr').clone(true).appendTo('#datatable-buttons thead');
            $('#datatable-buttons thead tr:eq(1) th').each(function (i) {
                var title = $(this).text();
                if (title == 'Action') {
                    $(this).html('');
                    return;
                }

                $(this).html('<input type="text" placeholder=" Search ' + title + '" />');

                $('input', this).on('keyup change', function () {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
            var table = window.LaravelDataTables["datatable-buttons"];
        });
    </script>
@endpush
