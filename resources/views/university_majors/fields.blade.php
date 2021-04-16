<!-- University Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('university_id', 'University:') !!}
  {!! Form::select('university_id', $universityItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Faculty Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('faculty_id', 'Faculty:') !!}
  {!! Form::select('faculty_id', $facultyItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
  {!! Form::label('name', 'Name:') !!}
  {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Level Field -->
<div class="form-group col-sm-6">
  {!! Form::label('level', 'Level:') !!}
  {!! Form::text('level', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Accreditation Field -->
<div class="form-group col-sm-6">
  {!! Form::label('accreditation', 'Accreditation:') !!}
  {!! Form::text('accreditation', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
  {!! Form::label('description', 'Description:') !!}
  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('university-majors.index') }}" class="btn btn-default">Cancel</a>
</div>