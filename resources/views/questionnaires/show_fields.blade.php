<!-- Question Field -->
<div class="form-group">
    {!! Form::label('question', 'Question:') !!}
    <p>{{ $questionnaire->question }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $questionnaire->type }}</p>
</div>

<!-- Answer Choice Field -->
<div class="form-group">
    {!! Form::label('answer_choice', 'Answer Choice:') !!}
    <p>{{ $questionnaire->answer_choice }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $questionnaire->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $questionnaire->updated_at }}</p>
</div>

