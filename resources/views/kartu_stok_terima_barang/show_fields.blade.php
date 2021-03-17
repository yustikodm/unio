<!-- Barang Id Field -->
<div class="form-group">
    {!! Form::label('barang_id', 'Nama Barang:') !!}
    <p>{{ $kartuStokTerimaBarang->nama }}</p>
</div>

<!-- Terima Barang Id Field -->
<div class="form-group">
    {!! Form::label('terima_barang_id', 'Kode Terima Barang:') !!}
    <p>{{ $kartuStokTerimaBarang->kode }}</p>
</div>

<!-- Stok Awal Field -->
<div class="form-group">
    {!! Form::label('stok_awal', 'Stok Awal:') !!}
    <p>{{ $kartuStokTerimaBarang->stok_awal }}</p>
</div>

<!-- Masuk Field -->
<div class="form-group">
    {!! Form::label('masuk', 'Masuk:') !!}
    <p>{{ $kartuStokTerimaBarang->masuk }}</p>
</div>

<!-- Keluar Field -->
<div class="form-group">
    {!! Form::label('keluar', 'Keluar:') !!}
    <p>{{ $kartuStokTerimaBarang->keluar }}</p>
</div>

<!-- Stok Akhir Field -->
<div class="form-group">
    {!! Form::label('stok_akhir', 'Stok Akhir:') !!}
    <p>{{ $kartuStokTerimaBarang->stok_akhir }}</p>
</div>

<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $kartuStokTerimaBarang->tanggal }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $kartuStokTerimaBarang->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $kartuStokTerimaBarang->updated_at }}</p>
</div>

