<div class="col-md-4">
    <div class="form-group">
        {!! Form::label('kode', 'Kode:') !!}
        <p>{{ $penerimaanRetur->kode }}</p>
    </div>
    <!-- Retur Barang Id Field -->
    <div class="form-group">
        {!! Form::label('retur_barang_id', 'Kode Retur Barang:') !!}
        <p>{{ $penerimaanRetur->kode_retur }}</p>
    </div>

    <!-- Pegawai Id Field -->
    <div class="form-group">
        {!! Form::label('pegawai_id', 'Admin:') !!}
        <p>{{ $penerimaanRetur->nama_pegawai }}</p>
    </div>
</div>
<div class="col-md-4">
    <!-- Supplier Id Field -->
    <div class="form-group">
        {!! Form::label('supplier_id', 'Nama Supplier:') !!}
        <p>{{ $penerimaanRetur->nama_supplier }}</p>
    </div>

    <!-- Keterangan Field -->
    <div class="form-group">
        {!! Form::label('keterangan', 'Keterangan:') !!}
        <p>{{ $penerimaanRetur->keterangan }}</p>
    </div>

    <!-- Tanggal Field -->
    <div class="form-group">
        {!! Form::label('tanggal', 'Tanggal:') !!}
        <p>{{ $penerimaanRetur->tanggal }}</p>
    </div>
</div>
<div class="col-md-4">
    <!-- Status Field -->
    <div class="form-group">
        {!! Form::label('status', 'Status:') !!}
        <p>{{ $penerimaanRetur->status }}</p>
    </div>
    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $penerimaanRetur->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $penerimaanRetur->updated_at }}</p>
    </div>
</div>
