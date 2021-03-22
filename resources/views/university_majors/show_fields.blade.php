<!-- University Id Field -->
<div class="form-group">
    {!! Form::label('university_id', 'University:') !!}
    <p>{{ $universityMajor->university->name }}</p>
</div>

<!-- Faculty Id Field -->
<div class="form-group">
    {!! Form::label('faculty_id', 'Faculty:') !!}
    <p>{{ $universityMajor->faculty->name }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $universityMajor->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $universityMajor->description }}</p>
</div>

<!-- Accreditation Field -->
<div class="form-group">
    {!! Form::label('accreditation', 'Accreditation:') !!}
    <p>{{ $universityMajor->accreditation }}</p>
</div>

