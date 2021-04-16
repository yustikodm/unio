<!-- Country Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('country_id', 'Country:') !!}
  {!! Form::select('country_id', $countryItems, null, ['class' => 'form-control']) !!}
</div>

<!-- State Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('state_id', 'State:') !!}
  {!! Form::select('state_id', $stateItems, null, ['class' => 'form-control']) !!}
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('district_id', 'District:') !!}
  {!! Form::select('district_id', $districtItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
  {!! Form::label('name', 'Name:') !!}
  {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
  {!! Form::label('description', 'Description:') !!}
  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
  {!! Form::label('type', 'Type:') !!}
  {!! Form::text('type', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Accreditation Field -->
<div class="form-group col-sm-6">
  {!! Form::label('accreditation', 'Accreditation:') !!}
  {!! Form::text('accreditation', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
  {!! Form::label('address', 'Address:') !!}
  {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Src Field -->
<div class="form-group col-sm-6">
  {!! Form::label('logo_src', 'University Logo:') !!}
  {!! Form::file('logo_src', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('universities.index') }}" class="btn btn-default">Cancel</a>
</div>
