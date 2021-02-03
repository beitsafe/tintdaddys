@extends('layouts.app')

@section('content')
    {!! Form::model($model, array('route' => ['admin.faqs.update',$model->id],'method' =>'PUT', 'class' => 'form-horizontal')) !!}
    @include('admin.faqs.partials.form')
    {!! Form::close() !!}
@endsection
