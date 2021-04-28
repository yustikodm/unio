<!-- User ID Field -->
<div class="form-group">
    {!! Form::label('username', 'User ID:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::text('username', $biodata->user->username, ['class' => 'form-control', 'disabled']) !!}
        {!! Form::hidden('user_id', $biodata->user->id) !!}
    </div>
</div>

<!-- Full Name Field -->
<div class="form-group">
    {!! Form::label('fullname', 'Full Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', 'Gender:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        <div class="radio">
            <label>{!! Form::radio('gender', 'Male'); !!} Male</label>
            <label style="margin: 0 2em;">{!! Form::radio('gender', 'Female'); !!} Female</label>
            <label>{!! Form::radio('gender', 'Other'); !!} Other</label>
        </div>
    </div>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Picture Field -->
<div class="form-group">
    {!! Form::label('picture', 'Picture:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::file('picture', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- School Origin Field -->
<div class="form-group">
    {!! Form::label('school_origin', 'School Origin:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::text('school_origin', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Graduation Year Field -->
<div class="form-group">
    {!! Form::label('graduation_year', 'Graduation Year:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::date('graduation_year', null, ['class' => 'form-control','id'=>'graduation_year']) !!}
    </div>
</div>

<!-- Birth Place Field -->
<div class="form-group">
    {!! Form::label('birth_place', 'Birth Place:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::text('birth_place', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Birth Date Field -->
<div class="form-group">
    {!! Form::label('birth_date', 'Birth Date:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::date('birth_date', null, ['class' => 'form-control','id'=>'birth_date']) !!}
    </div>
</div>

<!-- Identity Number Field -->
<div class="form-group">
    {!! Form::label('identity_number', 'Identity Number:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::text('identity_number', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Religion ID Field -->
<div class="form-group">
    {!! Form::label('religion_id', 'Religion ID:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
        {!! Form::select('religion_id', $religionItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-7">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('biodata.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
