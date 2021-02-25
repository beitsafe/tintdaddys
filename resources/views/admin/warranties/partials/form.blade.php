<div class="row text-center">
    <h2>Lifetime Limited Warranty</h2>
</div>

<div class="row">
    <h3>Installer Information</h3>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('installerCompanyName', 'Company Name') }}
        {{ Form::text('installerCompanyName', old('installerCompanyName'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('installerCompanyPhone', 'Company Phone') }}
        {{ Form::text('installerCompanyPhone', old('installerCompanyPhone'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('installerCompanyPerson', 'Contact Person') }}
        {{ Form::text('installerCompanyPerson', old('installerCompanyPerson'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('installerCompanyEmail', 'Company Email') }}
        {{ Form::text('installerCompanyEmail', old('installerCompanyEmail'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        {{ Form::label('installerCompanyAddress', 'Company Address') }}
        {{ Form::text('installerCompanyAddress', old('installerCompanyAddress'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        {{ Form::label('installerCompanyCity', 'City') }}
        {{ Form::text('installerCompanyCity', old('installerCompanyCity'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('installerCompanyState', 'State') }}
        {{ Form::text('installerCompanyState', old('installerCompanyState'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('installerCompanyPostcode', 'Postcode') }}
        {{ Form::text('installerCompanyPostcode', old('installerCompanyPostcode'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="row">
    <h3>Customer Information</h3>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('customerName', 'Customer Name') }}
        {{ Form::text('customerName', old('customerName'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('customerPhone', 'Customer Phone') }}
        {{ Form::text('customerPhone', old('customerPhone'), ['class' => 'form-control']) }}
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('installerCompanyEmail', 'Company Email') }}
        {{ Form::text('installerCompanyEmail', old('installerCompanyEmail'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        {{ Form::label('installerCompanyAddress', 'Company Address') }}
        {{ Form::text('installerCompanyAddress', old('installerCompanyAddress'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        {{ Form::label('installerCompanyCity', 'City') }}
        {{ Form::text('installerCompanyCity', old('installerCompanyCity'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('installerCompanyState', 'State') }}
        {{ Form::text('installerCompanyState', old('installerCompanyState'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('installerCompanyPostcode', 'Postcode') }}
        {{ Form::text('installerCompanyPostcode', old('installerCompanyPostcode'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="row">
    <h3>Vehicle Information</h3>
</div>

<div class="row">
    <h3>Product Information</h3>
</div>

<div class="col-lg-3 col-md-4 px-0">
    <button type="submit" class="btn btn--primary type--uppercase">Submit Warranty</button>
</div>


