@extends('layouts.app')

@section('content')
    <div class="card ">
        <div class="card-header bg-dark text-white text-center">
            <h2>Create Size Shade</h2>
        </div>
        <div class="card-body">
            {!! Form::model($model, array('route' => 'admin.sizeshades.store', 'class' => 'form-horizontal')) !!}
            @include('admin.sizeshades.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
