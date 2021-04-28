<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('code', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Region Field -->
<div class="form-group">
    {!! Form::label('region', 'Region:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('region', $region, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Currency Code Field -->
<div class="form-group">
    {!! Form::label('currency_code', 'Currency Code:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('currency_code', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Currency Name Field -->
<div class="form-group">
    {!! Form::label('currency_name', 'Currency Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('currency_name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('countries.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
