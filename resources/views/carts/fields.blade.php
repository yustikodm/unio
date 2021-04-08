<!-- User Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('user_id', 'User Id:') !!}
  {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Service Id Field -->
<div class="form-group col-sm-6">
  {!! Form::label('service_id', 'Service Id:') !!}
  {!! Form::number('service_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
  {!! Form::label('name', 'Name:') !!}
  {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
  {!! Form::label('qty', 'Qty:') !!}
  {!! Form::number('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
  {!! Form::label('price', 'Price:') !!}
  {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Price Field -->
<div class="form-group col-sm-6">
  {!! Form::label('total_price', 'Total Price:') !!}
  {!! Form::number('total_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('carts.index') }}" class="btn btn-default">Cancel</a>
</div>
