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
    <div class="form-group col-md-6">
        {{ Form::label('client[businessName]', 'State') }}
        {{ Form::text('client[state]', old('client.state', @$client->state), ['class' => 'form-control' ]) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('client[postcode]', 'Post Code') }}
        {{ Form::text('client[postcode]', old('client.postcode', @$client->postcode), ['class' => 'form-control' ]) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        @if (@$user->hasRole('approved'))
            <form id="revoke-form" action="{{ route('admin.user.revoke') }}" method="POST" class="d-none">
                @csrf
            </form>

            <a class="btn btn-danger" href="{{ route('admin.user.revoke') }}"
               onclick="event.preventDefault();
           document.getElementById('revoke-form').submit();">Revoke User Permissions
            </a>
        @else
            <form id="approve-form" action="{{ route('admin.user.approve') }}" method="POST" class="d-none">
                @csrf
            </form>

            <a class="btn btn-secondary" href="{{ route('admin.user.approve') }}"
               onclick="event.preventDefault();
           document.getElementById('approve-form').submit();">Approve User Application
            </a>
        @endif


    </div>
</div>

{!! Form::submit( "Submit", ['class' => 'btn btn-dark']) !!}
{!! Html::link('/admin/users', 'Back', ['class' => 'btn btn-secondary']) !!}
