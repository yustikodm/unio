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

<!-- Major Id Field -->
<div class="form-group">
    {!! Form::label('major_id', 'Major:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('major_id', $majorItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('type', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50,'maxlength' => 50]) !!}
    </div>
</div>

<!-- Admission Fee Field -->
<!-- <div class="form-group">
    {!! Form::label('admission_fee', 'Admission Fee:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::number('admission_fee', null, ['class' => 'form-control']) !!}
    </div>
</div> -->

<!-- Semester Fee Field -->
<!-- <div class="form-group">
    {!! Form::label('semester_fee', 'Semester Fee:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::number('semester_fee', null, ['class' => 'form-control']) !!}
    </div>
</div> -->

<div class="form-group">
    {!! Form::label('fee', 'Fee:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::number('fee', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('period', 'Period:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::number('period', null, ['class' => 'form-control']) !!}
    </div>
</div>
\
<div class="form-group">
    {!! Form::label('period_unit', 'Period Unit:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('period_unit', null, ['class' => 'form-control']) !!}
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
        <a href="{{ route('university-fees.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
