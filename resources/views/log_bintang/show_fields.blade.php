<!-- Mitra Id Field -->
<div class="form-group">
    {!! Form::label('mitra_id', 'Mitra Id:') !!}
    <p>{{ $logBintang->mitra_id }}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $logBintang->keterangan }}</p>
</div>

<!-- Jumlah Field -->
<div class="form-group">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $logBintang->jumlah }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $logBintang->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $logBintang->updated_at }}</p>
</div>

