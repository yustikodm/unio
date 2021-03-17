<!-- Barang Id Field -->
@if(Request::is('stok/*/edit'))
<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Barang:') !!}
    {!! Form::select('barang_id', $barangItems, $stok->barang_id , ['class' => 'select2 form-control', 'disabled' => 'true']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Barang:') !!}
    {!! Form::select('barang_id', $barangItems, null, ['class' => 'select2 form-control']) !!}
</div>
@endif

<!-- Stok Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stok', 'Stok:') !!}
    {!! Form::text('stok', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('stok.index') }}" class="btn btn-default">Cancel</a>
</div>
