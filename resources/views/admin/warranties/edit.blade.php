@extends('layouts.app')

@section('content')

    <div class="card ">
        <div class="card-header bg-dark text-white text-center">
            <h2>Edit Product | {{$model->name}}</h2>
        </div>
        <div class="card-body">

            {!! Form::model($model, array('route' => ['admin.warranties.update',$model->id],'method' =>'PUT', 'class' => 'form-horizontal', 'id'=>'warranty-form')) !!}
            @include('admin.warranties.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
@endsection
