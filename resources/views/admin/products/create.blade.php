@extends('layouts.app')

@section('content')
    <div class="card ">
        <div class="card-header bg-dark text-white text-center">
            <h2>Create Product</h2>
        </div>
        <div class="card-body">
    {!! Form::open(array('route' => 'admin.products.store', 'class' => 'form-horizontal')) !!}
    @include('admin.products.partials.form')
    {!! Form::close() !!}
@endsection
