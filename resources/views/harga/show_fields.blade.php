<!-- Barang Id Field -->
<div class="form-group">
    {!! Form::label('barang_id', 'Nama Barang:') !!}
    <p>{{ $harga->barang }}</p>
</div>

<!-- Harga Field -->
<div class="form-group">
    {!! Form::label('harga', 'Harga:') !!}
    <p>Rp. {{ number_format($harga->harga) }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $harga->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $harga->updated_at }}</p>
</div>

