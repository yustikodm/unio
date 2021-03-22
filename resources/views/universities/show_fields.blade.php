<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:') !!}
    <p>{{ $university->country->name }}</p>
</div>

<!-- State Id Field -->
<div class="form-group">
    {!! Form::label('state_id', 'State:') !!}
    <p>{{ $university->state->name }}</p>
</div>

<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', 'District:') !!}
    <p>{{ $university->district->name }}</p>
</div>

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
    <p>{{ $university->logo_src }}</p>
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

