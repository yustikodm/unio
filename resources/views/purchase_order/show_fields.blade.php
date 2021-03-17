<!-- Kode Field -->
<div class="form-group">
    {!! Form::label('kode', 'Kode:') !!}
    <p>{{ $purchaseOrder->kode }}</p>
</div>

<!-- Pegawai Id Field -->
<div class="form-group">
    {!! Form::label('pegawai_id', 'Admin:') !!}
    <p>{{ $purchaseOrder->pegawai }}</p>
</div>

<!-- Supplier Id Field -->
<div class="form-group">
    {!! Form::label('supplier_id', 'Nama Supplier:') !!}
    <p>{{ $purchaseOrder->nama_supplier }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $purchaseOrder->status }}</p>
</div>
<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal Diproses:') !!}
    <p>{{ $purchaseOrder->tanggal_diproses }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Tanggal Dibuat:') !!}
    <p>{{ $purchaseOrder->created_at }}</p>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $purchaseOrder->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $purchaseOrder->updated_at }}</p>
</div>

