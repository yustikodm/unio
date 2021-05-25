<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Cip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cip', 'Cip:') !!}
    {!! Form::text('cip', null, ['class' => 'form-control']) !!}
</div>

<!-- Hc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hc', 'Hc:') !!}
    {!! Form::text('hc', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('fOS.index') }}" class="btn btn-default">Cancel</a>
</div>
