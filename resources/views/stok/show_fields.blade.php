<!-- Barang Id Field -->
<div class="form-group">
    {!! Form::label('barang_id', 'Nama Barang:') !!}
    <p>{{ $stok->barang }}</p>
</div>

<!-- Stok Field -->
<div class="form-group">
    {!! Form::label('stok', 'Stok:') !!}
    <p>{{ $stok->stok }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $stok->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $stok->updated_at }}</p>
</div>

