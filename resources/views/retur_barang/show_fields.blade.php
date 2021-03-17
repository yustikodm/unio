<!-- Kode Field -->
<div class="form-group">
    {!! Form::label('kode', 'Kode:') !!}
    <p>{{ $returBarang->kode }}</p>
</div>

<!-- Pegawai Id Field -->
<div class="form-group">
    {!! Form::label('pegawai_id', 'Admin:') !!}
    <p>{{ $returBarang->nama_pegawai }}</p>
</div>

<!-- Supplier Id Field -->
<div class="form-group">
    {!! Form::label('supplier_id', 'Nama Supplier:') !!}
    <p>{{ $returBarang->nama_supplier }}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $returBarang->keterangan }}</p>
</div>

<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal Retur:') !!}
    <p>{{ $returBarang->tanggal }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Tanggal dibuat:') !!}
    <p>{{ $returBarang->created_at }}</p>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $returBarang->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $returBarang->updated_at }}</p>
</div>

