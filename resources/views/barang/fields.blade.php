<!-- Kode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Satuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('satuan_id', 'Satuan:') !!}
    {!! Form::select('satuan_id', $satuanBarangItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Kategori Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori_id', 'Kategori:') !!}
    {!! Form::select('kategori_id', $kategoriBarangItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Subkategori Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subkategori_id', 'Subkategori:') !!}
    {!! Form::select('subkategori_id', $subkategoriBarangItems, null, ['class' => 'select2 form-control']) !!} 
</div>

<!-- Subkategori Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipe', 'Tipe:') !!}
    {!! Form::select('tipe', $tipeBarang, null, ['class' => 'select2 form-control']) !!} 
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('barang.index') }}" class="btn btn-default">Cancel</a>
</div>
