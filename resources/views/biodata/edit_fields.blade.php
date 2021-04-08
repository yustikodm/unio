<!-- User ID Field -->
<div class="form-group col-sm-6">
  {!! Form::label('user_id', 'User ID:') !!}
  {!! Form::text('username', $biodata->user->username, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fullname', 'Full Name:') !!}
    {!! Form::text('fullname', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Picture Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('picture', 'Picture:') !!}
    {!! Form::file('picture', null, ['class' => 'form-control']) !!}
</div>

<!-- School Origin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('school_origin', 'School Origin:') !!}
    {!! Form::text('school_origin', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Graduation Year Field -->
<div class="form-group col-sm-6">
    {!! Form::label('graduation_year', 'Graduation Year:') !!}
    {!! Form::date('graduation_year', null, ['class' => 'form-control','id'=>'graduation_year']) !!}
</div>

<!-- Birth Place Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_place', 'Birth Place:') !!}
    {!! Form::text('birth_place', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Birth Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_date', 'Birth Date:') !!}
    {!! Form::date('birth_date', null, ['class' => 'form-control','id'=>'birth_date']) !!}
</div>

<!-- Identity Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identity_number', 'Identity Number:') !!}
    {!! Form::number('identity_number', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Religion ID Field -->
<div class="form-group col-sm-6">
  {!! Form::label('religion_id', 'Religion ID:') !!}
  {!! Form::select('religion_id', $religionItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('biodata.index') }}" class="btn btn-default">Cancel</a>
</div>
