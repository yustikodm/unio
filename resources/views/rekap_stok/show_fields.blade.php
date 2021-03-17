<!-- Barang Id Field -->
<div class="form-group">
    {!! Form::label('barang_id', 'Barang Id:') !!}
    <p>{{ $rekapStok->barang_id }}</p>
</div>

<!-- Stok Awal Field -->
<div class="form-group">
    {!! Form::label('stok_awal', 'Stok Awal:') !!}
    <p>{{ $rekapStok->stok_awal }}</p>
</div>

<!-- Masuk Field -->
<div class="form-group">
    {!! Form::label('masuk', 'Masuk:') !!}
    <p>{{ $rekapStok->masuk }}</p>
</div>

<!-- Keluar Field -->
<div class="form-group">
    {!! Form::label('keluar', 'Keluar:') !!}
    <p>{{ $rekapStok->keluar }}</p>
</div>

<!-- Stok Akhir Field -->
<div class="form-group">
    {!! Form::label('stok_akhir', 'Stok Akhir:') !!}
    <p>{{ $rekapStok->stok_akhir }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $rekapStok->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $rekapStok->updated_at }}</p>
</div>

