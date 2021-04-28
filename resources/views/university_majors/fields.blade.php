<!-- University Id Field -->
<div class="form-group">
    {!! Form::label('university_id', 'University:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('university_id', $universityItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Faculty Id Field -->
<div class="form-group">
    {!! Form::label('faculty_id', 'Faculty:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('faculty_id', $facultyItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Level Field -->
<div class="form-group">
    {!! Form::label('level', 'Level:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('level', null, ['class' => 'form-control','maxlength' => 255]) !!}
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

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('university-majors.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
