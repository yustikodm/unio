<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', 'Country:') !!}
    {!! Form::select('country_id', $countryItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('states.index') }}" class="btn btn-default">Cancel</a>
</div>
