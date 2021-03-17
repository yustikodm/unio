<!-- Purchase Order Id Field -->
<div class="form-group">
    {!! Form::label('purchase_order_id', 'Kode Purchase Order:') !!}
    <p>{{ $terimaBarang->kode_po }}</p>
</div>

<!-- Kirim Barang Id Field -->
<div class="form-group">
    {!! Form::label('kirim_barang_id', 'Kode Kirim Barang:') !!}
    <p>{{ $terimaBarang->kode_kb }}</p>
</div>

<!-- Kode Field -->
<div class="form-group">
    {!! Form::label('kode', 'Kode:') !!}
    <p>{{ $terimaBarang->kode }}</p>
</div>

<!-- Pegawai Id Field -->
<div class="form-group">
    {!! Form::label('pegawai_id', 'Admin:') !!}
    <p>{{ $terimaBarang->pegawai }}</p>
</div>

<!-- Supplier Id Field -->
<div class="form-group">
    {!! Form::label('supplier_id', 'Nama Supplier:') !!}
    <p>{{ $terimaBarang->nama_supplier }}</p>
</div>

<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal Terima:') !!}
    <p>{{ $terimaBarang->tanggal }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Tanggal Dibuat:') !!}
    <p>{{ $terimaBarang->created_at }}</p>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $terimaBarang->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $terimaBarang->updated_at }}</p>
</div>

