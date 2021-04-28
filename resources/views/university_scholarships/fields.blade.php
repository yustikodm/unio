<!-- University Id Field -->
<div class="form-group">
    {!! Form::label('university_id', 'University:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('university_id', $universityItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Year Field -->
<div class="form-group">
    {!! Form::label('year', 'Year:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::number('year', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Picture Field -->
<div class="form-group">
    {!! Form::label('picture', 'Picture:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::file('picture', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        {!! Form::submit('Save', ['class' => 'btn btn-primary'], ['class' => 'control-label col-sm-2']) !!}
        <a href="{{ route('university-scholarships.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
