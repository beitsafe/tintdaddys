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
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', old('address'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('city', 'City') }}
        {{ Form::text('city', old('city'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('state', 'State') }}
        {{ Form::select('size', [
            'QLD' => 'QLD',
            'NSW' => 'NSW',
            'VIC' => 'VIC',
            'TAS' => 'TAS',
            'ACT' => 'ACT',
            'NT' => 'NT',
            'SA' => 'SA',
            'WA' => 'WA',
            ], old('state'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('postcode', 'Postcode') }}
        {{ Form::text('postcode', old('postcode'), ['class' => 'form-control']) }}
    </div>
</div>

{!! Form::submit( "Submit", ['class' => 'btn btn-success']) !!}
{!! Html::link('/admin/installers', 'Back', ['class' => 'btn btn-secondary']) !!}
