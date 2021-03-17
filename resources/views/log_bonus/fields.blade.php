<!-- Mitra Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mitra_id', 'Mitra Id:') !!}
    {!! Form::text('mitra_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('logBonus.index') }}" class="btn btn-default">Cancel</a>
</div>
