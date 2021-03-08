<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('size', 'Size') }}
        {{ Form::text('size', old('size'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('shade', 'Shade') }}
        {{ Form::text('shade', old('shade'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('quantity', 'Quantity') }}
        {{ Form::text('quantity', old('quantity'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('price', 'Price') }}
        {{ Form::text('price', old('price'), ['class' => 'form-control']) }}
    </div>
</div>

{!! Form::submit( "Submit", ['class' => 'btn btn-success']) !!}
{!! Html::link('/admin/sizeshades', 'Back', ['class' => 'btn btn-secondary']) !!}
