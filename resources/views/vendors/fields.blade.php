<!-- Country Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('country_id', 'Country Id:') !!}
  {!! Form::select('country_id', $countryItems, null, ['class' => 'form-control']) !!}
</div>

<!-- State Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('state_id', 'State Id:') !!}
  {!! Form::select('state_id', $stateItems, null, ['class' => 'form-control']) !!}
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('district_id', 'District Id:') !!}
  {!! Form::select('district_id', $districtItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Vendor Category Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('vendor_category_id', 'Vendor Category Id:') !!}
  {!! Form::select('vendor_category_id', $categoryItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
  {!! Form::label('name', 'Name:') !!}
  {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
  {!! Form::label('address', 'Address:') !!}
  {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
  {!! Form::label('description', 'Description:') !!}
  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
  {!! Form::label('email', 'Email:') !!}
  {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Bank Account Number Field -->
<div class="form-group col-sm-6">
  {!! Form::label('bank_account_number', 'Bank Account Number:') !!}
  {!! Form::text('bank_account_number', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Website Field -->
<div class="form-group col-sm-6">
  {!! Form::label('website', 'Website:') !!}
  {!! Form::text('website', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
  {!! Form::label('phone', 'Phone:') !!}
  {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 20]) !!}
</div>

<!-- Logo Field -->
<div class="form-group col-sm-12 col-lg-12">
  {!! Form::label('logo', 'Logo:') !!}
  {!! Form::file('logo', null, ['class' => 'form-control']) !!}
</div>

<!-- Header Image Field -->
<div class="form-group col-sm-12 col-lg-12">
  {!! Form::label('header_img', 'Header Image:') !!}
  {!! Form::file('header_img', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('vendors.index') }}" class="btn btn-default">Cancel</a>
</div>
