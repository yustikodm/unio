<!-- University Id Field -->
<div class="form-group">
    {!! Form::label('university_id', 'University:') !!}
    <p><a href="{{ route('universities.show', $universityScholarship->university->id) }}">{{ $universityScholarship->university->name }}</a></p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('year', 'Name:') !!}
    <p>{{ $universityScholarship->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $universityScholarship->description }}</p>
</div>

<!-- Organizer Field -->
<div class="form-group">
    {!! Form::label('organizer', 'Organizer:') !!}
    <p>{{ $universityScholarship->organizer }}</p>
</div>

<!-- Year Field -->
<div class="form-group">
    {!! Form::label('year', 'Year:') !!}
    <p>{{ $universityScholarship->year }}</p>
</div>

<!-- Picture Field -->
<div class="form-group">
    {!! Form::label('picture', 'Picture:') !!}
    <img style="width: 25%" src="{{ asset('storage/scholarships/'.$universityScholarship->picture) }}">
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $universityScholarship->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $universityScholarship->updated_at }}</p>
</div>