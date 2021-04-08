<!-- Name Field -->
<div class="form-group col-sm-6">
  {!! Form::label('name', 'Name:') !!}
  {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
  {!! Form::label('description', 'Description:') !!}
  {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('vendor-categories.index') }}" class="btn btn-default">Cancel</a>
</div>
