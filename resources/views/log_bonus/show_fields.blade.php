<!-- Mitra Id Field -->
<div class="form-group">
    {!! Form::label('mitra_id', 'Mitra Id:') !!}
    <p>{{ $logBonus->mitra_id }}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $logBonus->keterangan }}</p>
</div>

<!-- Jumlah Field -->
<div class="form-group">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $logBonus->jumlah }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $logBonus->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $logBonus->updated_at }}</p>
</div>

