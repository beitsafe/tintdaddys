<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
    </div>

</div>

{!! Form::submit( "Submit", ['class' => 'btn btn-success']) !!}
{!! Html::link('/admin/shades', 'Back', ['class' => 'btn btn-secondary']) !!}
