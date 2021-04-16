<!-- University Id Field -->
<div class="form-group">
    {!! Form::label('university_id', 'University:') !!}
    <p><a href="{{ route('universities.show', $universityRequirement->university->id) }}">{{ $universityRequirement->university->name }}</a></p>
</div>

<!-- Major Id Field -->
<div class="form-group">
    {!! Form::label('major_id', 'Major:') !!}
    <p><a href="{{ route('university-majors.show', $universityRequirement->major->id) }}">{{ $universityRequirement->major->name }}</a></p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $universityRequirement->name }}</p>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $universityRequirement->value }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $universityRequirement->description }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $universityRequirement->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $universityRequirement->updated_at }}</p>
</div>