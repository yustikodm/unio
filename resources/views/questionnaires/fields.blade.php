<!-- Question Field -->
<div class="form-group">
    {!! Form::label('question', 'Question:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('question', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('type', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Answer Choice Field -->
<div class="form-group">
    {!! Form::label('answer_choice', 'Answer Choice:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('answer_choice', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('questionnaires.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
