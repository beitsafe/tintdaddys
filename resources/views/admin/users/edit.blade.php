@extends('layouts.app')

@section('content')
    <div class="card ">
        <div class="card-header bg-dark text-white text-center">
            <h2>Edit User {{$user->client->name}}</h2>
        </div>
        <div class="card-body">
            {!! Form::model($model, array('route' => ['admin.users.update',$model->id],'method' =>'PUT', 'class' => 'form-horizontal')) !!}
            @include('admin.users.partials.form')
            {!! Form::close() !!}
        </div>

    </div>

@endsection

@push('scripts')

@endpush
