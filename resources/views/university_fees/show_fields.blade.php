<!-- University Id Field -->
<div class="form-group">
    {!! Form::label('university_id', 'University:') !!}
    <p><a href="{{ route('universities.show', $universityFee->university->id) }}">{{ $universityFee->university->name }}</a></p>
</div>

<!-- Faculty Id Field -->
<div class="form-group">
    {!! Form::label('faculty_id', 'Faculty:') !!}
    <p><a href="{{ route('university-faculties.show', $universityFee->faculty->id) }}">{{ $universityFee->faculty->name }}</a></p>
</div>

<!-- Major Id Field -->
<div class="form-group">
    {!! Form::label('major_id', 'Major:') !!}
    <p><a href="{{ route('university-majors.show', $universityFee->major->id) }}">{{ $universityFee->major->name }}</a></p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $universityFee->type }}</p>
</div>

<!-- Admission Fee Field -->
<!-- <div class="form-group">
    {!! Form::label('admission_fee', 'Admission Fee:') !!}
    <p>{{ $universityFee->admission_fee }}</p>
</div> -->

<!-- Semester Fee Field -->
<!-- <div class="form-group">
    {!! Form::label('semester_fee', 'Semester Fee:') !!}
    <p>{{ $universityFee->semester_fee }}</p>
</div>
 -->

<div class="form-group">
    {!! Form::label('fee', 'Fee:') !!}
    <p>{{ $universityFee->fee }}</p>
</div>

<div class="form-group">
    {!! Form::label('period', 'Period:') !!}
    <p>{{ $universityFee->period }}</p>
</div>

<div class="form-group">
    {!! Form::label('period_unit', 'Period Unit:') !!}
    <p>{{ $universityFee->period_unit }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $universityFee->description }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $universityFee->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $universityFee->updated_at }}</p>
</div>