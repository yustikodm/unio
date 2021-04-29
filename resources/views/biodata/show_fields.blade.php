<!-- User ID Field -->
<div class="form-group">
    {!! Form::label('username', 'User ID:') !!}
    <p><a href="{{ route('users.show', $biodata->user->id) }}">{{ $biodata->user->username }}</a></p>
</div>

<!-- Full Name Field -->
<div class="form-group">
    {!! Form::label('full_name', 'Full Name:') !!}
    <p>{{ $biodata->full_name }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $biodata->address }}</p>
</div>

<!-- School Origin Field -->
<div class="form-group">
    {!! Form::label('school_origin', 'School Origin:') !!}
    <p>{{ $biodata->school_origin }}</p>
</div>

<!-- Graduation Year Field -->
<div class="form-group">
    {!! Form::label('graduation_year', 'Graduation Year:') !!}
    <p>{{ $biodata->graduation_year }}</p>
</div>

<!-- Birth Date Field -->
<div class="form-group">
    {!! Form::label('birth_date', 'Birth Date:') !!}
    <p>{{ $biodata->birth_date }}</p>
</div>

<!-- Birth Place Field -->
<div class="form-group">
    {!! Form::label('birth_place', 'Birth Place:') !!}
    <p>{{ $biodata->birth_place }}</p>
</div>

<!-- Identity Number Field -->
<div class="form-group">
    {!! Form::label('identity_number', 'Identity Number:') !!}
    <p>{{ $biodata->identity_number }}</p>
</div>

<!-- Religion Field -->
<div class="form-group">
    {!! Form::label('religion', 'Religion:') !!}
    <p>{{ $biodata->religion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $biodata->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $biodata->updated_at }}</p>
</div>