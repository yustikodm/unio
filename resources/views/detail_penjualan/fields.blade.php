<!-- Penjualan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penjualan_id', 'Penjualan Id:') !!}
    {!! Form::text('penjualan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Barang Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Barang Id:') !!}
    {!! Form::text('barang_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Catatan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('catatan', 'Catatan:') !!}
    {!! Form::textarea('catatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('detailPenjualan.index') }}" class="btn btn-default">Cancel</a>
</div>
