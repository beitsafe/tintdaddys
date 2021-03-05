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

{!! Form::submit( "Submit", ['class' => 'btn btn-success']) !!}
{!! Html::link('/admin/sizeshades', 'Back', ['class' => 'btn btn-secondary']) !!}
