<!-- Title Field -->
<div class="form-group">
  {!! Form::label('title', 'Title:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-8">
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255]) !!}
  </div>
</div>

<!-- Description Field -->
<div class="form-group">
  {!! Form::label('description', 'Description:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-8">
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
  </div>
</div>

<!-- Picture Field -->
<div class="form-group">
  {!! Form::label('picture', 'Picture:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-8">
    {!! Form::file('picture', null, ['class' => 'form-control']) !!}
  </div>
</div>

<!-- User Id Field -->
{!! Form::hidden('user_id', auth()->id(), ['class' => 'form-control']) !!}

<!-- Submit Field -->
<div class="form-group">
  <div class="col-sm-offset-2 col-sm-7">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('articles.index') }}" class="btn btn-default">Cancel</a>
  </div>
</div>
