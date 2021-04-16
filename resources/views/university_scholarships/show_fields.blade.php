<!-- University Id Field -->
<div class="form-group">
    {!! Form::label('university_id', 'University:') !!}
    <p><a href="{{ route('universities.show', $universityScholarship->university->id) }}">{{ $universityScholarship->university->name }}</a></p>
</div>

<!-- Year Field -->
<div class="form-group">
    {!! Form::label('year', 'Year:') !!}
    <p>{{ $universityScholarship->year }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $universityScholarship->description }}</p>
</div>

<!-- Picture Field -->
<div class="form-group">
    {!! Form::label('picture', 'Picture:') !!}
    <p><img src="{{ $universityScholarship->logo_src }}"></p>
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