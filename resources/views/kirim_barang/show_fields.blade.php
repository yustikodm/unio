<!-- Purchase Order Id Field -->
<div class="form-group">
    {!! Form::label('purchase_order_id', 'Kode Purchase Order:') !!}
    <p>{{ $kirimBarang->kode_po }}</p>
</div>

<!-- Kode Field -->
<div class="form-group">
    {!! Form::label('kode', 'Kode:') !!}
    <p>{{ $kirimBarang->kode }}</p>
</div>

<!-- Pegawai Id Field -->
<div class="form-group">
    {!! Form::label('pegawai_id', 'Admin:') !!}
    <p>{{ $kirimBarang->pegawai }}</p>
</div>

<!-- Supplier Id Field -->
<div class="form-group">
    {!! Form::label('supplier_id', 'Nama Supplier:') !!}
    <p>{{ $kirimBarang->nama_supplier }}</p>
</div>

<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal Kirim:') !!}
    <p>{{ $kirimBarang->tanggal_kirim }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('Tanggal Dibuat', 'Tanggal Dibuat:') !!}
    <p>{{ $kirimBarang->created_at }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $kirimBarang->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $kirimBarang->updated_at }}</p>
</div>

