<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('country_id', $countryItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- State Id Field -->
<div class="form-group">
    {!! Form::label('state_id', 'State:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('state_id', $stateItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', 'District:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('district_id', $districtItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Vendor Category Id Field -->
<div class="form-group">
    {!! Form::label('vendor_category_id', 'Vendor Category:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('vendor_category_id', $categoryItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50]) !!}
    </div>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('address', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('website', 'Website:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('website', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 20]) !!}
    </div>
</div>

<!-- Bank Account Number Field -->
<div class="form-group">
    {!! Form::label('bank_account_number', 'Bank Account:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('bank_account_number', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Logo Field -->
<div class="form-group">
    {!! Form::label('logo_src', 'Logo:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::file('logo_src', ['accept' => 'image/*']) !!}
    </div>
</div>

<!-- Header Image Field -->
<div class="form-group">
    {!! Form::label('header_src', 'Header Image:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::file('header_src', ['accept' => 'image/*', 'id' => 'header_src', 'class' => 'custom-file-input']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('vendors.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
