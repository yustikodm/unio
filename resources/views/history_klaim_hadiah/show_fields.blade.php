<!-- Hadiah Id Field -->
<div class="form-group">
    {!! Form::label('hadiah_id', 'Hadiah Id:') !!}
    <p>{{ $historyKlaimHadiah->hadiah_id }}</p>
</div>

<!-- Mitra Id Field -->
<div class="form-group">
    {!! Form::label('mitra_id', 'Mitra Id:') !!}
    <p>{{ $historyKlaimHadiah->mitra_id }}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $historyKlaimHadiah->keterangan }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $historyKlaimHadiah->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $historyKlaimHadiah->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $historyKlaimHadiah->updated_at }}</p>
</div>

