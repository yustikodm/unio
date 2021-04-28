<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('country_id', $countryItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('states.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
