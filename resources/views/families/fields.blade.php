<!-- Parent User Field -->
<div class="form-group">
    {!! Form::label('parent_user', 'Parent User:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('parent_user', $userItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Child User Field -->
<div class="form-group">
    {!! Form::label('child_user', 'Child User:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('child_user', $userItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Family as Field -->
<div class="form-group">
    {!! Form::label('family_as', 'Family User:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('family_as', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('families.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
