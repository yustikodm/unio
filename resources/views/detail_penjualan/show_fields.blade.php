<!-- Penjualan Id Field -->
<div class="form-group">
    {!! Form::label('penjualan_id', 'Penjualan Id:') !!}
    <p>{{ $detailPenjualan->penjualan_id }}</p>
</div>

<!-- Barang Id Field -->
<div class="form-group">
    {!! Form::label('barang_id', 'Barang Id:') !!}
    <p>{{ $detailPenjualan->barang_id }}</p>
</div>

<!-- Catatan Field -->
<div class="form-group">
    {!! Form::label('catatan', 'Catatan:') !!}
    <p>{{ $detailPenjualan->catatan }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $detailPenjualan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $detailPenjualan->updated_at }}</p>
</div>

