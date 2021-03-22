<!-- University Id Field -->
<div class="form-group">
    {!! Form::label('university_id', 'University:') !!}
    <p>{{ $universityRequirement->university->name }}</p>
</div>

<!-- Major Id Field -->
<div class="form-group">
    {!! Form::label('major_id', 'Major:') !!}
    <p>{{ $universityRequirement->major->name }}</p>
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

