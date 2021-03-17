<!-- Barang Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Barang Id:') !!}
    {!! Form::text('barang_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Stok Awal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stok_awal', 'Stok Awal:') !!}
    {!! Form::text('stok_awal', null, ['class' => 'form-control']) !!}
</div>

<!-- Masuk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('masuk', 'Masuk:') !!}
    {!! Form::text('masuk', null, ['class' => 'form-control']) !!}
</div>

<!-- Keluar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keluar', 'Keluar:') !!}
    {!! Form::text('keluar', null, ['class' => 'form-control']) !!}
</div>

<!-- Stok Akhir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stok_akhir', 'Stok Akhir:') !!}
    {!! Form::text('stok_akhir', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('rekapStok.index') }}" class="btn btn-default">Cancel</a>
</div>
