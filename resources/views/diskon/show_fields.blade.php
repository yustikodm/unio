<!-- Barang Id Field -->
<div class="form-group">
    {!! Form::label('barang_id', 'Nama Barang:') !!}
    <p>{{ $diskon->barang }}</p>
</div>

<!-- Diskon Field -->
<div class="form-group">
    {!! Form::label('diskon', 'Diskon:') !!}
    <p>{{ $diskon->diskon }}</p>
</div>

<!-- Diskon Field -->
<div class="form-group">
    {!! Form::label('diskon', 'Diskon:') !!}
    <p>{{ $diskon->tipe }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $diskon->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $diskon->updated_at }}</p>
</div>

