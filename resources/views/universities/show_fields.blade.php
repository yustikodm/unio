<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:') !!}
    <p><a href="{{ route('countries.show', $university->country->id) }}">{{ $university->country->name }}</a></p>
</div>

@if (!empty($university->state->name))
<!-- State Id Field -->
<div class="form-group">
    {!! Form::label('state_id', 'State:') !!}
    <p><a href="{{ route('states.show', $university->state->id) }}">{{ $university->state->name }}</a></p>
</div>
@endif

@if (!empty($university->district->name))
<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', 'District:') !!}
    <p><a href="{{ route('districts.show', $university->district->id) }}">{{ $university->district->name }}</a></p>
</div>
@endif

<!-- Logo Src Field -->
<div class="form-group">
    {!! Form::label('logo_src', 'Logo Src:') !!}
    <img style="width: 25%" src="{{ asset('storage/universities/'.$university->logo_src) }}">
</div>

<!-- Header Src Field -->
<div class="form-group">
    {!! Form::label('header_src', 'Header Src:') !!}
    <img style="width: 25%" src="{{ asset('storage/universities/'.$university->header_src) }}">
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $university->name }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $university->type }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $university->email }}</p>
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('Website', 'Website:') !!}
    <p>{{ $university->website }}</p>
</div>

<!-- Accreditation Field -->
<div class="form-group">
    {!! Form::label('accreditation', 'Accreditation:') !!}
    <p>{{ $university->accreditation }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $university->address }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $university->description }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $university->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $university->updated_at }}</p>
</div>