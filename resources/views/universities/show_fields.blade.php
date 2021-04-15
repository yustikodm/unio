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

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $university->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $university->description }}</p>
</div>

<!-- Logo Src Field -->
<div class="form-group">
    {!! Form::label('logo_src', 'Logo Src:') !!}
    <p><img src="{{ $university->logo_src }}"></p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $university->type }}</p>
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

