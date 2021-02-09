@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-auto mr-auto">
                                <h2>Products</h2>
                            </div>
                            <div class="col-auto ">
                                <a href="{{route('admin.products.create')}}"
                                   class="btn btn-outline-secondary"
                                   target="_blank"><i class="fas fa-plus-circle"></i> Create New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $dataTable->table(['class' => 'table table-striped table-bordered', 'id' => 'datatable-buttons']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @include('admin.layouts.partials._datatable_scripts')
@endpush
