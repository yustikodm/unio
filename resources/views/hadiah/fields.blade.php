<!-- Barang Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Barang:') !!}
    {!! Form::select('barang_id', $barangItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Poin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('poin', 'Poin:') !!}
    {!! Form::number('poin', null, ['class' => 'form-control']) !!}
</div>

<!-- Stok Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stok', 'Stok:') !!}
    {!! Form::number('stok', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('tanggal_kadaluarsa', 'Tanggal Kadaluarsa:') !!}
    {!! Form::date('tanggal_kadaluarsa', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Aktif' => 'Aktif', 'Tidak Aktif' => 'Tidak Aktif'] ,null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('hadiah.index') }}" class="btn btn-default">Cancel</a>
</div>
