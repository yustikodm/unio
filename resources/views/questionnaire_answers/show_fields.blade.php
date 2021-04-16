<!-- Questionairre Id Field -->
<div class="form-group">
    {!! Form::label('questionairre_id', 'Questionairre Id:') !!}
    <p><a href="{{ route('questionnaires.show', $questionnaireAnswer->questionnaire->id) }}">{{ $questionnaireAnswer->questionnaire->question }}</a></p>
</div>

<!-- Answer Field -->
<div class="form-group">
    {!! Form::label('answer', 'Answer:') !!}
    <p>{{ $questionnaireAnswer->answer }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p><a href="{{ route('users.show', $questionnaireAnswer->user->id) }}">{{ $questionnaireAnswer->user->username }}</a></p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $questionnaireAnswer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $questionnaireAnswer->updated_at }}</p>
</div>

