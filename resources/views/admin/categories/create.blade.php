@extends('layouts.app')

@section('content')
    {!! Form::model($model, array('route' => 'admin.categories.store', 'class' => 'form-horizontal')) !!}
    @include('admin.categories.partials.form')
    {!! Form::close() !!}
@endsection
