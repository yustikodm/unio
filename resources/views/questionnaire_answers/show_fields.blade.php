<!-- Questionairre Id Field -->
<div class="form-group">
    {!! Form::label('questionairre_id', 'Questionairre Id:') !!}
    <p>{{ $questionnaireAnswer->questionairre_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $questionnaireAnswer->user_id }}</p>
</div>

<!-- Answer Field -->
<div class="form-group">
    {!! Form::label('answer', 'Answer:') !!}
    <p>{{ $questionnaireAnswer->answer }}</p>
</div>

