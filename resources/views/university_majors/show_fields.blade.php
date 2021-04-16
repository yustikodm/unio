<!-- University Id Field -->
<div class="form-group">
    {!! Form::label('university_id', 'University:') !!}
    <p><a href="{{ route('universities.show', $universityMajor->university->id) }}">{{ $universityMajor->university->name }}</a></p>
</div>

@if (!empty($universityMajor->faculty->id))
<!-- Faculty Id Field -->
<div class="form-group">
    {!! Form::label('faculty_id', 'Faculty:') !!}
    <p><a href="{{ route('university-faculties.show', $universityMajor->faculty->id) }}">{{ $universityMajor->faculty->name }}</a></p>
</div>
@endif

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $universityMajor->name }}</p>
</div>

<!-- Level Field -->
<div class="form-group">
    {!! Form::label('description', 'Level:') !!}
    <p>{{ $universityMajor->level }}</p>
</div>

<!-- Accreditation Field -->
<div class="form-group">
    {!! Form::label('accreditation', 'Accreditation:') !!}
    <p>{{ $universityMajor->accreditation }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $universityMajor->description }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $universityMajor->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $universityMajor->updated_at }}</p>
</div>