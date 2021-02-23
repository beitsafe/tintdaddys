<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
    </div>

</div>

{!! Form::submit( "Submit", ['class' => 'btn btn-dark']) !!}
{!! Html::link('/admin/users', 'Back', ['class' => 'btn btn-secondary']) !!}
