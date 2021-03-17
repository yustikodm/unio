<!-- Kode Field -->
<div class="form-group">
    {!! Form::label('kode', 'Kode:') !!}
    <p>{{ $barang->kode }}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $barang->nama }}</p>
</div>

<!-- Satuan Field -->
<div class="form-group">
    {!! Form::label('satuan', 'Satuan:') !!}
    <p>{{ $barang->satuan }}</p>
</div>

<!-- Kategori Field -->
<div class="form-group">
    {!! Form::label('kategori', 'Kategori:') !!}
    <p>{{ $barang->kategori }}</p>
</div>

<!-- Subkategori Field -->
<div class="form-group">
    {!! Form::label('subkategori', 'Subkategori:') !!}
    <p>{{ $barang->subkategori }}</p>
</div>

<div class="form-group">
    {!! Form::label('subkategori', 'Tipe:') !!}
    <p>{{ $barang->tipe }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $barang->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $barang->updated_at }}</p>
</div>

