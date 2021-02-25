@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <div class="row">
                            <div class="col-auto mr-auto text-white">
                                <h2>Orders</h2>
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
    @include('layouts.backPartials._datatable_scripts')
@endpush
