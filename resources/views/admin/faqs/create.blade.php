@extends('layouts.app')

@section('content')
    <div class="card ">
        <div class="card-header bg-dark text-white text-center">
            <h2>Create Faq</h2>
        </div>
        <div class="card-body">
            {!! Form::model($model, array('route' => 'admin.faqs.store', 'class' => 'form-horizontal')) !!}
            @include('admin.faqs.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
