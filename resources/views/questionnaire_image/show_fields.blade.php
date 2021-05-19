<!-- Src Field -->
<div class="form-group">
    {!! Form::label('src', 'Src:') !!}
    <p>{{ $questionnaireImage->src }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $questionnaireImage->type }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $questionnaireImage->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $questionnaireImage->updated_at }}</p>
</div>

