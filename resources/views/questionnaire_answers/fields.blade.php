<!-- questionnaire Id Field -->
<div class="form-group">
    {!! Form::label('questionairre_id', 'Questionnaire:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('questionairre_id', $questionnaireItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('user_id', $userItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Answer Field -->
<div class="form-group">
    {!! Form::label('answer', 'Answer:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('answer', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('questionnaire-answers.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
