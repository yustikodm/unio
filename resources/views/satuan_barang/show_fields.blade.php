<!-- Kode Field -->
<div class="form-group">
    {!! Form::label('kode', 'Kode:') !!}
    <p>{{ $satuanBarang->kode }}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $satuanBarang->nama }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $satuanBarang->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $satuanBarang->updated_at }}</p>
</div>

