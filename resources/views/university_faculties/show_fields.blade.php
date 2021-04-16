<!-- University Id Field -->
<div class="form-group">
  {!! Form::label('university_id', 'University:') !!}
  <p><a href="{{ route('universities.show', $universityFaculties->university->id) }}">{{ $universityFaculties->university->name }}</a></p>
</div>

<!-- Name Field -->
<div class="form-group">
  {!! Form::label('name', 'Name:') !!}
  <p>{{ $universityFaculties->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
  {!! Form::label('description', 'Description:') !!}
  <p>{{ $universityFaculties->description }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $universityFaculties->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $universityFaculties->updated_at }}</p>
</div>