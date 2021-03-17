<!-- Barang Id Field -->
<div class="form-group">
    {!! Form::label('barang_id', 'Nama Barang:') !!}
    <p>{{ $kartuStokPenjualan->nama }}</p>
</div>

<!-- Penjualan Id Field -->
<div class="form-group">
    {!! Form::label('penjualan_id', 'Kode Penjualan:') !!}
    <p>{{ $kartuStokPenjualan->kode }}</p>
</div>

<!-- Stok Awal Field -->
<div class="form-group">
    {!! Form::label('stok_awal', 'Stok Awal:') !!}
    <p>{{ $kartuStokPenjualan->stok_awal }}</p>
</div>

<!-- Masuk Field -->
<div class="form-group">
    {!! Form::label('masuk', 'Masuk:') !!}
    <p>{{ $kartuStokPenjualan->masuk }}</p>
</div>

<!-- Keluar Field -->
<div class="form-group">
    {!! Form::label('keluar', 'Keluar:') !!}
    <p>{{ $kartuStokPenjualan->keluar }}</p>
</div>

<!-- Stok Akhir Field -->
<div class="form-group">
    {!! Form::label('stok_akhir', 'Stok Akhir:') !!}
    <p>{{ $kartuStokPenjualan->stok_akhir }}</p>
</div>

<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $kartuStokPenjualan->tanggal }}</p>
</div>

<!-- Created At Field -->
<!-- <div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $kartuStokPenjualan->created_at }}</p>
</div>

Updated At Field
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $kartuStokPenjualan->updated_at }}</p>
</div> -->

