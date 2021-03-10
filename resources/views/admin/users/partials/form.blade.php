<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('name', 'User Name') }}
        {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', old('email'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('firstName', 'First Name') }}
        {{ Form::text('client[firstName]', old('client.firstName', @$client->firstName), ['class' => 'form-control' ]) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('lastName', 'Last Name') }}
        {{ Form::text('client[lastName]', old('client.lastName', @$client->lastName), ['class' => 'form-control' ]) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('client[businessName]', 'Business Name') }}
        {{ Form::text('client[businessName]', old('client.businessName', @$client->businessName), ['class' => 'form-control' ]) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('client[abn]', 'ABN') }}
        {{ Form::text('client[abn]', old('client.abn', @$client->abn), ['class' => 'form-control' ]) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('client[phone]', 'Phone') }}
        {{ Form::text('client[phone]', old('client.phone', @$client->phone), ['class' => 'form-control' ]) }}
    </div>

</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('client[address]', 'Address') }}
        {{ Form::text('client[address]', old('client.address', @$client->address), ['class' => 'form-control' ]) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('client[abn]', 'City') }}
        {{ Form::text('client[city]', old('client.city', @$client->city), ['class' => 'form-control' ]) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        {{ Form::label('client[businessName]', 'State') }}
        {{ Form::text('client[suburb]', old('client.suburb', @$client->suburb), ['class' => 'form-control' ]) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('client[postcode]', 'Post Code') }}
        {{ Form::text('client[postcode]', old('client.postcode', @$client->postcode), ['class' => 'form-control' ]) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('client[country]', 'Country') }}
        {{ Form::select('client[country]', \App\Models\Client::COUNTRIES, old('client.country', @$client->country), ['class' => 'form-control' ]) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-12 mb-0">
        {!! Html::link('/admin/users', 'Back', ['class' => 'btn btn-secondary']) !!}
        {!! Form::submit( "Submit", ['class' => 'btn btn-primary']) !!}

        @if ($user->exists())
            @php($hasApproved = $user->hasRole(\App\Models\User::ROLE_APPROVED))
            <a class="float-right btn {{ $hasApproved ? 'btn-danger' : 'btn-secondary' }}" href="{{ route('admin.user.toggleapprove', $user) }}">{{ $hasApproved ? 'Revoke' : 'Approve' }} User Permissions</a>
        @endif
    </div>
</div>
