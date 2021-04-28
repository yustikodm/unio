<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('country_id', $countryItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- State Id Field -->
<div class="form-group">
    {!! Form::label('state_id', 'State:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('state_id', $stateItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', 'District:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('district_id', $districtItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('type', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Accreditation Field -->
<div class="form-group">
    {!! Form::label('accreditation', 'Accreditation:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('accreditation', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Logo Src Field -->
<div class="form-group">
    {!! Form::label('logo_src', 'University Logo:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::file('logo_src', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('universities.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
