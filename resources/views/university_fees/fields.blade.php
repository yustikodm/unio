<!-- University Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('university_id', 'University:') !!}
  {!! Form::number('university_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Faculty Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('faculty_id', 'Faculty:') !!}
  {!! Form::number('faculty_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Major Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('major_id', 'Major:') !!}
  {!! Form::number('major_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
  {!! Form::label('type', 'Type:') !!}
  {!! Form::text('type', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Admission Fee Field -->
<div class="form-group col-sm-6">
  {!! Form::label('admission_fee', 'Admission Fee:') !!}
  {!! Form::number('admission_fee', null, ['class' => 'form-control']) !!}
</div>

<!-- Semester Fee Field -->
<div class="form-group col-sm-6">
  {!! Form::label('semester_fee', 'Semester Fee:') !!}
  {!! Form::number('semester_fee', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
  {!! Form::label('description', 'Description:') !!}
  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('university-fees.index') }}" class="btn btn-default">Cancel</a>
</div>
