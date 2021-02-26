<div class="row justify-content-center">
    <h2 class="type--underline">Lifetime Limited Warranty</h2>
</div>

<div class="row mt-3">
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

<hr>

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
        {{ Form::label('customerEmail', 'Customer Email') }}
        {{ Form::text('customerEmail', old('customerEmail'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        {{ Form::label('customerAddress', 'Customer Address') }}
        {{ Form::text('customerAddress', old('customerAddress'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        {{ Form::label('customerCity', 'City') }}
        {{ Form::text('customerCity', old('customerCity'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('customerState', 'State') }}
        {{ Form::text('customerState', old('customerState'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('customerPostcode', 'Postcode') }}
        {{ Form::text('customerPostcode', old('customerPostcode'), ['class' => 'form-control']) }}
    </div>
</div>

<hr>

<div class="row">
    <h3>Vehicle Information</h3>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('vehicleInstallationDate', 'Installation Date') }}
        {{ Form::text('vehicleInstallationDate', old('vehicleInstallationDate'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('vehicleRegistration', 'Vehicle Registration') }}
        {{ Form::text('vehicleRegistration', old('vehicleRegistration'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('vehicleYear', 'Vehicle Year') }}
        {{ Form::text('vehicleYear', old('vehicleYear'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('vehicleMake', 'Vehicle Make') }}
        {{ Form::text('vehicleMake', old('vehicleMake'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('vehicleModel', 'Vehicle Model') }}
        {{ Form::text('vehicleModel', old('vehicleModel'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('vehicleVin', 'Vehicle VIN #') }}
        {{ Form::text('vehicleVin', old('vehicleVin'), ['class' => 'form-control']) }}
    </div>
</div>

<hr>

<div class="row">
    <h3>Product Information</h3>
</div>

<h4>Windscreen Strip</h4>

<div class="form-row">
    <div class="form-group col-md-4">
        {{ Form::label('windscreenFilmName', 'Film Name') }}
        {{ Form::text('windscreenFilmName', old('windscreenFilmName'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('windscreenVlt', 'VLT') }}
        {{ Form::text('windscreenVlt', old('windscreenVlt'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('windscreenRollNumber', 'Roll #') }}
        {{ Form::text('windscreenRollNumber', old('windscreenRollNumber'), ['class' => 'form-control']) }}
    </div>
</div>

<h4>Front Side</h4>

<div class="form-row">
    <div class="form-group col-md-4">
        {{ Form::label('frontSideFilmName', 'Film Name') }}
        {{ Form::text('frontSideFilmName', old('frontSideFilmName'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('frontSideVlt', 'VLT') }}
        {{ Form::text('frontSideVlt', old('frontSideVlt'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('frontSideRollNumber', 'Roll #') }}
        {{ Form::text('frontSideRollNumber', old('frontSideRollNumber'), ['class' => 'form-control']) }}
    </div>
</div>

<h4>Rear Side</h4>

<div class="form-row">
    <div class="form-group col-md-4">
        {{ Form::label('rearSideFilmName', 'Film Name') }}
        {{ Form::text('rearSideFilmName', old('rearSideFilmName'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('rearSideVlt', 'VLT') }}
        {{ Form::text('rearSideVlt', old('rearSideVlt'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('rearSideRollNumber', 'Roll #') }}
        {{ Form::text('rearSideRollNumber', old('rearSideRollNumber'), ['class' => 'form-control']) }}
    </div>
</div>

<h4>Front Side</h4>

<div class="form-row">
    <div class="form-group col-md-4">
        {{ Form::label('rearWindscreenFilmName', 'Film Name') }}
        {{ Form::text('rearWindscreenFilmName', old('rearWindscreenFilmName'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('rearWindscreenSideVlt', 'VLT') }}
        {{ Form::text('rearWindscreenSideVlt', old('rearWindscreenSideVlt'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('rearWindscreenSideRollNumber', 'Roll #') }}
        {{ Form::text('rearWindscreenSideRollNumber', old('rearWindscreenSideRollNumber'), ['class' => 'form-control']) }}
    </div>
</div>

<h4>Rear Side</h4>

<div class="form-row">
    <div class="form-group col-md-4">
        {{ Form::label('additionalFilmName', 'Film Name') }}
        {{ Form::text('additionalFilmName', old('additionalFilmName'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('additionalVlt', 'VLT') }}
        {{ Form::text('additionalVlt', old('additionalVlt'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('additionalRollNumber', 'Roll #') }}
        {{ Form::text('additionalRollNumber', old('additionalRollNumber'), ['class' => 'form-control']) }}
    </div>
</div>

<hr>

<div class="row">
    <h3>Signature</h3>
</div>

<div class="form-row" id="signature-pad">
    <div class="form-group col-8">
        <div class="signature-pad">
            {{ Form::hidden('signature') }}
            <canvas id="signature_canvas" style="width: 100%; height: 150px;"></canvas>
        </div>
    </div>
    <div class="form-group col">
        <div class="signature-pad--actions">
            <button type="button" class="btn btn--sm btn--secondary px-3 clear" data-action="clear">Clear</button>
            <button type="button" class="btn btn--sm btn--secondary px-3" data-action="undo">Undo</button>
        </div>
    </div>
</div>


<div class="col-lg-3 col-md-4 px-0">
    <button type="submit" class="btn btn--primary type--uppercase">Submit Warranty</button>
</div>


