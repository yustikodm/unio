<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::select('country_id', $countryItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- State Id Field -->
<div class="form-group">
    {!! Form::label('state_id', 'State:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::select('state_id', $stateItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', 'District:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::select('district_id', $districtItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::text('price', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Picture Field -->
<div class="form-group">
    {!! Form::label('picture', 'Picture:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::file('picture', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('place-to-live.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
