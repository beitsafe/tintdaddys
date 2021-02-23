@extends('layouts.app')

@section('content')

    <div class="card ">
        <div class="card-header bg-dark text-white text-center">
            <h2>Edit Product | {{$model->name}}</h2>
        </div>
        <div class="card-body">

            {!! Form::model($model, array('route' => ['admin.products.update',$model->id],'method' =>'PUT', 'class' => 'form-horizontal',  'enctype' => "multipart/form-data" )) !!}
            @include('admin.products.partials.form')
            {!! Form::close() !!}

            <div class="modal fade" id="crop_image" tabindex="-1" role="dialog" aria-labelledby="export_progress_modal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Crop Image</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
