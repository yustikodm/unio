<!-- Tipe Field -->
<div class="form-group">
    {!! Form::label('tipe', 'Tipe:') !!}
    <p>{{ $mutasiKas->tipe }}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $mutasiKas->keterangan }}</p>
</div>

<!-- Jumlah Field -->
<div class="form-group">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $mutasiKas->jumlah }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $mutasiKas->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $mutasiKas->updated_at }}</p>
</div>

