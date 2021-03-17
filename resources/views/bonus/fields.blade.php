<!-- Mitra Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mitra_id', 'Mitra Id:') !!}
    {!! Form::text('mitra_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Bonus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bonus', 'Bonus:') !!}
    {!! Form::text('bonus', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bonus.index') }}" class="btn btn-default">Cancel</a>
</div>
