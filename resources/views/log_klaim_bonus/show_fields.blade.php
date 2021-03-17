<!-- Mitra Id Field -->
<div class="form-group">
    {!! Form::label('mitra_id', 'Mitra Id:') !!}
    <p>{{ $logKlaimBonus->mitra_id }}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $logKlaimBonus->keterangan }}</p>
</div>

<!-- Jumlah Field -->
<div class="form-group">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $logKlaimBonus->jumlah }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $logKlaimBonus->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $logKlaimBonus->updated_at }}</p>
</div>

