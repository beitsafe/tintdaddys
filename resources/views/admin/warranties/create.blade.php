@extends('layouts.app')

@section('content')
    <div class="card ">
        <div class="card-header bg-dark text-white text-center">
            <h2>Create Warranty</h2>
        </div>
        <div class="card-body">
            {!! Form::open(array('route' => 'profile.warranties.store', 'class' => 'form-horizontal')) !!}
            @include('admin.warranties.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
