<h4>Profile</h4>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label>First Name:</label>
            {{ Form::text('client[firstName]', old('client.firstName', @$client->firstName), ['class' => 'form-control' ]) }}

        </div>
        <div class="col-md-6">
            <label>Last Name:</label>
            {{ Form::text('client[lastName]', old('client.lastName', @$client->lastName), ['class' => 'form-control' ]) }}

        </div>
        <div class="col-md-12">
            <label>Business Name:</label>
            {{ Form::text('client[businessName]', old('client.businessName', @$client->businessName), ['class' => 'form-control billing-field', "readonly" ]) }}
        </div>
        <div class="col-md-12">
            <label>ABN:</label>
            {{ Form::text('client[abn]', old('client.abn', @$client->abn), ['class' => 'form-control' ]) }}
        </div>
        <div class="col-md-12">
            <label>Phone:</label>
            {{ Form::text('client[phone]', old('client.phone', @$client->phone), ['class' => 'form-control' ]) }}

        </div>
        <div class="col-md-12">
            <label>Address:</label>
            {{ Form::text('client[address]', old('client.address', @$client->address), ['class' => 'form-control' ]) }}
        </div>
        <div class="col-md-12">
            <label>City:</label>
            {{ Form::text('client[city]', old('client.city', @$client->city), ['class' => 'form-control' ]) }}

        </div>
        <div class="col-md-12">
            <label>State:</label>
            {{ Form::text('client[state]', old('client.state', @$client->state), ['class' => 'form-control' ]) }}

        </div>
        <div class="col-md-12">
            <label>Postcode:</label>
            {{ Form::text('client[postcode]', old('client.postcode', @$client->postcode), ['class' => 'form-control' ]) }}

        </div>
        <div class="col-lg-3 col-md-4">
            <button type="submit" class="btn btn--primary type--uppercase">Save Profile</button>
        </div>
    </div>
</form>
