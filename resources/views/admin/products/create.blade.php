@extends('layouts.app')

@section('content')
    {!! Form::open(array('route' => 'admin.products.store', 'class' => 'form-horizontal')) !!}
    @include('admin.products.partials.form')
    {!! Form::close() !!}
@endsection
