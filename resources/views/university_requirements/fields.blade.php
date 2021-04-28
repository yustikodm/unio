<!-- University Id Field -->
<div class="form-group">
    {!! Form::label('university_id', 'University:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('university_id', $universityItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Major Id Field -->
<div class="form-group">
    {!! Form::label('major_id', 'Major:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('major_id', $majorItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', 'Value:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::number('value', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('university-requirements.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
