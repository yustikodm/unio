<!-- Barang Id Field -->
<div class="form-group">
    {!! Form::label('barang_id', 'Nama Barang:') !!}
    <p>{{ $kartuStokReturBarang->nama }}</p>
</div>

<!-- Retur Barang Id Field -->
<div class="form-group">
    {!! Form::label('retur_barang_id', 'Kode Retur Barang:') !!}
    <p>{{ $kartuStokReturBarang->kode }}</p>
</div>

<!-- Stok Awal Field -->
<div class="form-group">
    {!! Form::label('stok_awal', 'Stok Awal:') !!}
    <p>{{ $kartuStokReturBarang->stok_awal }}</p>
</div>

<!-- Retur Field -->
<div class="form-group">
    {!! Form::label('retur', 'Retur:') !!}
    <p>{{ $kartuStokReturBarang->retur }}</p>
</div>

<!-- Stok Akhir Field -->
<div class="form-group">
    {!! Form::label('stok_akhir', 'Stok Akhir:') !!}
    <p>{{ $kartuStokReturBarang->stok_akhir }}</p>
</div>

<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $kartuStokReturBarang->tanggal }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $kartuStokReturBarang->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $kartuStokReturBarang->updated_at }}</p>
</div>

