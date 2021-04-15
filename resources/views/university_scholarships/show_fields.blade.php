<!-- University Id Field -->
<div class="form-group">
    {!! Form::label('university_id', 'University Id:') !!}
    <p><a href="{{ route('universities.show', $universityScholarship->university->id) }}">{{ $universityScholarship->university->name }}</a></p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $universityScholarship->description }}</p>
</div>

<!-- Picture Field -->
<div class="form-group">
    {!! Form::label('picture', 'Picture:') !!}
    <p>{{ $universityScholarship->picture }}</p>
</div>

<!-- Year Field -->
<div class="form-group">
    {!! Form::label('year', 'Year:') !!}
    <p>{{ $universityScholarship->year }}</p>
</div>

