<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('name', 'Business Name') }}
        {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', old('email'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('person', 'Contact Person') }}
        {{ Form::text('person', old('person'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('phone', 'Phone') }}
        {{ Form::text('phone', old('phone'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('longitude', 'Longitude') }}
        {{ Form::text('longitude', old('longitude'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('latitude', 'Latitude') }}
        {{ Form::text('latitude', old('latitude'), ['class' => 'form-control']) }}
    </div>
</div>

{!! Form::submit( "Submit", ['class' => 'btn btn-success']) !!}
{!! Html::link('/admin/installers', 'Back', ['class' => 'btn btn-secondary']) !!}
