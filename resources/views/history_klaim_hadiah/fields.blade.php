<!-- Hadiah Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hadiah_id', 'Hadiah Id:') !!}
    {!! Form::text('hadiah_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Mitra Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mitra_id', 'Mitra Id:') !!}
    {!! Form::text('mitra_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('historyKlaimHadiah.index') }}" class="btn btn-default">Cancel</a>
</div>
