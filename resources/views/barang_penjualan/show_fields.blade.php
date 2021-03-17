<!-- Penjualan Id Field -->
<div class="form-group">
    {!! Form::label('penjualan_id', 'Penjualan Id:') !!}
    <p>{{ $barangPenjualan->penjualan_id }}</p>
</div>

<!-- Barang Id Field -->
<div class="form-group">
    {!! Form::label('barang_id', 'Barang Id:') !!}
    <p>{{ $barangPenjualan->barang_id }}</p>
</div>

<!-- Jumlah Field -->
<div class="form-group">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $barangPenjualan->jumlah }}</p>
</div>

<!-- Subtotal Field -->
<div class="form-group">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{{ $barangPenjualan->subtotal }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $barangPenjualan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $barangPenjualan->updated_at }}</p>
</div>

