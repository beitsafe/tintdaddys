@extends('layouts.app')

@section('content')
    <div class="card ">
        <div class="card-header bg-dark text-white text-center">
            <h2>Create Category</h2>
        </div>
        <div class="card-body">
            {!! Form::model($model, array('route' => 'admin.categories.store', 'class' => 'form-horizontal')) !!}
            @include('admin.categories.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
