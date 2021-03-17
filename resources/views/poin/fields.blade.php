<!-- Mitra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mitra_id', 'Mitra:') !!}
    {!! Form::select('mitra_id', $MitraItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Poin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('poin', 'Poin:') !!}
    {!! Form::text('poin', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('poin.index') }}" class="btn btn-default">Cancel</a>
</div>
