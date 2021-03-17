<!-- Mitra Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mitra_id', 'Mitra:') !!}
    {!! Form::select('mitra_id', $mitraItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Bintang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bintang', 'Bintang:') !!}
    {!! Form::text('bintang', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bintang.index') }}" class="btn btn-default">Cancel</a>
</div>
