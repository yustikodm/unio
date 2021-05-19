<!-- Src Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('src', 'Src:') !!}
    {!! Form::textarea('src', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('questionnaireImage.index') }}" class="btn btn-default">Cancel</a>
</div>
