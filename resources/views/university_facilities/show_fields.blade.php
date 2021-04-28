<!-- University Id Field -->
<div class="form-group">
    {!! Form::label('university_id', 'University') !!}
    <p><a href="{{ route('universities.show', $universityFacility->university->id) }}">{{ $universityFacility->university->name }}</a></p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $universityFacility->name }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $universityFacility->amount }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $universityFacility->description }}</p>
</div>

<!-- Picture Field -->
<div class="form-group">
    {!! Form::label('picture', 'Picture:') !!}
    <img style="width: 25%" src="{{ asset('storage/facilities/'.$universityFacility->picture) }}">
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $universityFacility->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $universityFacility->updated_at }}</p>
</div>