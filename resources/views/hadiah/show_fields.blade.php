<!-- Barang Id Field -->
<div class="form-group">
    {!! Form::label('barang_id', 'Nama Barang:') !!}
    <p>{{ $hadiah->barang }}</p>
</div>

<!-- Poin Field -->
<div class="form-group">
    {!! Form::label('poin', 'Poin:') !!}
    <p>{{ $hadiah->poin }}</p>
</div>

<!-- Stok Field -->
<div class="form-group">
    {!! Form::label('stok', 'Stok:') !!}
    <p>{{ $hadiah->stok }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $hadiah->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $hadiah->updated_at }}</p>
</div>

