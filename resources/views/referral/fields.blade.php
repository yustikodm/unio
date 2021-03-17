<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Parent:') !!}
    {!! Form::select('parent_id', $userItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Child Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('child_id', 'Child:') !!}
    {!! Form::select('child_id', $userItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('referral.index') }}" class="btn btn-default">Cancel</a>
</div>
