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

<!-- Price Field -->
<div class="form-group col-sm-6">
  {!! Form::label('price', 'Price:') !!}
  {!! Form::text('price', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
  {!! Form::label('phone', 'Phone:') !!}
  {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
  {!! Form::label('address', 'Address:') !!}
  {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Picture Field -->
<div class="form-group col-sm-12 col-lg-12">
  {!! Form::label('picture', 'Picture:') !!}
  {!! Form::file('picture', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('place-to-live.index') }}" class="btn btn-default">Cancel</a>
</div>
