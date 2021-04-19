<!-- Code Field -->
<div class="form-group col-sm-6">
  {!! Form::label('code', 'Code:') !!}
  {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 3]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
  {!! Form::label('name', 'Name:') !!}
  {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Region Field -->
<div class="form-group col-sm-6">
  {!! Form::label('region', 'Region:') !!}
  {!! Form::text('region', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Currency Code Field -->
<div class="form-group col-sm-6">
  {!! Form::label('currency_code', 'Currency Code:') !!}
  {!! Form::text('currency_code', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Currency Name Field -->
<div class="form-group col-sm-6">
  {!! Form::label('currency_name', 'Currency Name:') !!}
  {!! Form::text('currency_name', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('countries.index') }}" class="btn btn-default">Cancel</a>
</div>
