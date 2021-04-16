<!-- University Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('university_id', 'University:') !!}
  {!! Form::select('university_id', $universityItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Major Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('major_id', 'Major:') !!}
  {!! Form::select('major_id', $majorItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
  {!! Form::label('name', 'Name:') !!}
  {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
  {!! Form::label('value', 'Value:') !!}
  {!! Form::number('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
  {!! Form::label('description', 'Description:') !!}
  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('university-requirements.index') }}" class="btn btn-default">Cancel</a>
</div>
