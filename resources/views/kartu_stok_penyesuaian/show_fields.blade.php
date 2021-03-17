<!-- Barang Id Field -->
<div class="form-group">
    {!! Form::label('barang_id', 'Nama Barang:') !!}
    <p>{{ $kartuStokPenyesuaian->nama }}</p>
</div>

<!-- Penyesuaian Id Field -->
<div class="form-group">
    {!! Form::label('penyesuaian_id', 'Kode Penyesuaian:') !!}
    <p>{{ $kartuStokPenyesuaian->kode }}</p>
</div>

<!-- Stok Awal Field -->
<div class="form-group">
    {!! Form::label('stok_awal', 'Stok Awal:') !!}
    <p>{{ $kartuStokPenyesuaian->stok_awal }}</p>
</div>

<!-- Masuk Field -->
<div class="form-group">
    {!! Form::label('masuk', 'Masuk:') !!}
    <p>{{ $kartuStokPenyesuaian->masuk }}</p>
</div>

<!-- Keluar Field -->
<div class="form-group">
    {!! Form::label('keluar', 'Keluar:') !!}
    <p>{{ $kartuStokPenyesuaian->keluar }}</p>
</div>

<!-- Stok Akhir Field -->
<div class="form-group">
    {!! Form::label('stok_akhir', 'Stok Akhir:') !!}
    <p>{{ $kartuStokPenyesuaian->stok_akhir }}</p>
</div>

<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $kartuStokPenyesuaian->tanggal }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $kartuStokPenyesuaian->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $kartuStokPenyesuaian->updated_at }}</p>
</div>

