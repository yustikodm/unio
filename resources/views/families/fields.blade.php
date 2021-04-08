<!-- Parent User Field -->
<div class="form-group col-sm-6">
  {!! Form::label('parent_user', 'Parent User:') !!}
  {!! Form::select('parent_user', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Child User Field -->
<div class="form-group col-sm-6">
  {!! Form::label('child_user', 'Child User:') !!}
  {!! Form::select('child_user', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Family as Field -->
<div class="form-group col-sm-6">
  {!! Form::label('family_as', 'Family User:') !!}
  {!! Form::text('family_as', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('families.index') }}" class="btn btn-default">Cancel</a>
</div>
