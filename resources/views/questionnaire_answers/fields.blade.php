<!-- questionnaire Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('questionnaire_id', 'Questionnaire:') !!}
  {!! Form::select('questionnaire_id',$questionnaireItems, null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('user_id', 'User:') !!}
  {!! Form::select('user_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Answer Field -->
<div class="form-group col-sm-6">
  {!! Form::label('answer', 'Answer:') !!}
  {!! Form::text('answer', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('questionnaire-answers.index') }}" class="btn btn-default">Cancel</a>
</div>
